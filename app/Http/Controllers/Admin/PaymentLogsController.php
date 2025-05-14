<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchase;
use App\Models\PaymentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PaymentLogsController extends Controller
{
    public function __construct(protected PaymentLog $log)
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data['purchase'] = CoursePurchase::find($request->purchase_id);

        $data['logs'] = $this->log->with('user', 'purchase')
            ->where('course_purchase_id', $request->purchase_id)
            ->latest()->paginate(20);

        if (is_null($data['purchase'])) {
            return back()->with('error', 'No purchase found for this ID');
        }


        return view('admin.course.payment-logs.index', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'amount'             => 'required',
            'payment_gateway'    => 'required',
            'course_purchase_id' => 'required',
            'user_id'            => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $request['status'] = true;

        PaymentLog::create($request->all());

        Session::flash('success', 'Payment Log added successfully');

        return 'success';
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'amount'             => 'required',
            'payment_gateway'    => 'required',
            'course_purchase_id' => 'required',
            'user_id'            => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $log = $this->log->find($request->payment_log_id);
        $log->update($request->all());

        Session::flash('success', 'Payment Log updated successfully');

        return 'success';
    }

    public function destroy(string $id)
    {
        $this->log->destroy($id);

        return back()->with('success', 'Payment log has been deleted');
    }

    public function updateStatus(Request $request)
    {
        $log         = $this->log->find($request->log_id);
        $log->status = $request->status;
        $log->save();

        return back()->with('success', 'Payment log status has been updated');
    }
}
