<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\OfflineGateway;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;

class GatewayController extends Controller
{
    public function index()
    {
        $data['paypal'] = PaymentGateway::find(15);
        $data['stripe'] = PaymentGateway::find(14);

        return view('admin.gateways.index', $data);
    }

    public function paypalUpdate(Request $request)
    {
        $paypal         = PaymentGateway::find(15);
        $paypal->status = $request->status;

        $information                  = [];
        $information['client_id']     = $request->client_id;
        $information['client_secret'] = $request->client_secret;
        $information['sandbox_check'] = $request->sandbox_check;
        $information['text']          = "Pay via your PayPal account.";

        $paypal->information = json_encode($information);

        $paypal->save();

        $request->session()->flash('success', "Paypal information updated successfully!");

        return back();
    }

    public function stripeUpdate(Request $request)
    {
        $stripe         = PaymentGateway::find(14);
        $stripe->status = $request->status;

        $information           = [];
        $information['key']    = $request->key;
        $information['secret'] = $request->secret;
        $information['text']   = "Pay via your Credit account.";

        $stripe->information = json_encode($information);

        $stripe->save();

        $request->session()->flash('success', "Stripe information updated successfully!");

        return back();
    }

    public function offline(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();

        $lang_id           = $lang->id;
        $data['ogateways'] = OfflineGateway::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);
        $data['lang_id']   = $lang_id;

        return view('admin.gateways.offline.index', $data);
    }

    public function store(Request $request)
    {
        $messages = [
            'language_id.required' => 'The language field is required',
        ];

        $rules = [
            'language_id'       => 'required',
            'name'              => 'required|max:100',
            'short_description' => 'nullable',
            'serial_number'     => 'required|integer',
            'is_receipt'        => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $in                 = $request->all();
        $in['instructions'] = str_replace(url('/') . '/assets/front/img/', "{base_url}/assets/front/img/", $request->instructions);

        OfflineGateway::create($in);

        Session::flash('success', 'Gateway added successfully!');
        return "success";
    }

    public function update(Request $request)
    {

        $rules = [
            'name'              => 'required|max:100',
            'short_description' => 'nullable',
            'serial_number'     => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $in                 = $request->except('_token', 'ogateway_id');
        $in['instructions'] = str_replace(url('/') . '/assets/front/img/', "{base_url}/assets/front/img/", $request->instructions);

        OfflineGateway::where('id', $request->ogateway_id)->update($in);

        Session::flash('success', 'Gateway updated successfully!');
        return "success";
    }

    public function status(Request $request)
    {
        $og = OfflineGateway::find($request->ogateway_id);
        if (!empty($request->type) && $request->type == 'course') {
            $og->course_checkout_status = $request->course_checkout_status;
        }
        $og->save();

        Session::flash('success', 'Gateway status changed successfully!');
        return back();
    }

    public function delete(Request $request)
    {
        OfflineGateway::findOrFail($request->ogateway_id)->delete();

        Session::flash('success', 'Gateway deleted successfully!');
        return back();
    }

}
