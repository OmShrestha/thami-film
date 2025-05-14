<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        //TODO - Add validation rules from ContactRequest

        $rules = [];
        $messages = [];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        Contact::create($request->all());

        //TODO - Send email to the admin with the contact details

        return response()->json(['success' => 'Your message has been sent successfully.']);
    }

    /**
     * Subscribe to the newsletter
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function subscribe(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:subscribers'
        ];

        $messages = [
            'email.required' => 'Email is required for subscription.',
            'email.email'    => 'Please enter a valid email.',
            'email.unique'   => 'You are already subscribed to our newsletter.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $subs        = new Subscriber;
        $subs->email = $request->email;
        $subs->save();

        //TODO: Send email to the subscriber

        return response()->json(['success' => 'You have successfully subscribed to our newsletter.']);
    }
}
