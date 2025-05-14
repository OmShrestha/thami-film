<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Members;
use App\Models\Donate;
use App\Models\Payment;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use App\Mail\PaymentMail;
use App\Mail\DonorPayment;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Session;

class MemberController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function member(Request $request)
    {
        $input = $request->all();
    
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'amount' => 'required|numeric|min:1',
            'stripeToken' => 'required|string',
        ]);
    
        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
            $member = Members::where('email', $request->email)
                ->orWhere('phone', $request->phone)
                ->first();
    
            $stripeToken = $request->stripeToken;
            if ($member) {
                $customerId = $member->customer_id;
            } else {
                $customer = \Stripe\Customer::create([
                    'email' => $request->email,
                    'name' => $request->name,
                    'description' => 'Member Payment',
                ]);
    
                \Stripe\Customer::createSource($customer->id, ['source' => $stripeToken]);
    
                $customerId = $customer->id;
    
                $member = Members::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'city' => $request->city ?? '',
                    'state' => $request->state ?? '',
                    'customer_id' => $customerId,
                ]);
            }
    
            $amountInCents = (int)($request->amount * 100);
            $charge = \Stripe\Charge::create([
                'description' => $request->name,
                'amount' => $amountInCents,
                'currency' => 'USD',
                'customer' => $customerId,
            ]);
    
            Payment::create([
                'member_id' => $member->id,
                'amount' => $request->amount,
                'type' => $member->wasRecentlyCreated ? 'New' : 'Renew',
                'token' => $stripeToken,
                'email' => $request->email,
                'name' => $request->name,
            ]);
    
            $durationDays = $request->amount == 5 ? 30 : 365;
            $currentDateTime = Carbon::now();
            $newDateTime = $currentDateTime->addDays($durationDays);
    
            $mailData = [
                'name' => $request->name,
                'start_date' => $currentDateTime->format('d M Y'),
                'end_date' => $newDateTime->format('d M Y'),
            ];
    
            Mail::to($request->email)->queue(new PaymentMail($mailData));

            $status = 'Thank you for being Yearly membership.';
            return view('frontend.status',compact('status'));

        } catch (\Stripe\Exception\CardException $e) {
            return response()->json(['message' => 'Payment failed: ' . $e->getMessage(), 'state' => 'error'], 400);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred: ' . $e->getMessage(), 'state' => 'error'], 500);
        }
    }
    

    /**
     * Handle an incoming api registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function donate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string|max:1000',
            'amount' => 'required|numeric|min:1',
            'stripeToken' => 'required|string',
        ]);
    
        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
            // Create Stripe Customer
            $customer = \Stripe\Customer::create([
                'email' => $validated['email'],
                'name' => $validated['name'],
                'description' => 'Donor Payment',
            ]);
    
            // Record the donation in the database
            $donation = Donate::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'message' => $validated['message'] ?? null,
                'amount' => $validated['amount'],
                'customer_id' => $customer->id,
                'stripe_token' => $validated['stripeToken'],
            ]);
    
            // Charge the customer
            $charge = \Stripe\Charge::create([
                'description' => "Donation Amount: {$validated['amount']}",
                'source' => $validated['stripeToken'],
                'amount' => (int)($validated['amount'] * 100),
                'currency' => env('STRIPE_CURRENCY', 'USD'),
            ]);
    
            // Send confirmation email
            $mailData = ['name' => $validated['name']];
        //    Mail::to($validated['email'])->queue(new DonorPayment($mailData));
           $status = 'Thank you for Donation.';
           return view('frontend.status',compact('status'));
    
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json([
                'message' => 'Payment processing failed. Please try again.',
                'state' => 'error',
                'details' => $e->getMessage(), // Optional: Remove in production
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An unexpected error occurred. Please try again later.',
                'state' => 'error',
                'details' => $e->getMessage(), // Optional: Remove in production
            ], 500);
        }
    }

    public function donor_status()
    {
        $status = 'Thank you for Donation.';
        return view('frontend.status',compact('status'));
    }
    
}
