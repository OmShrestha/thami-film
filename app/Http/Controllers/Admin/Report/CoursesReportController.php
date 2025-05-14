<?php

namespace App\Http\Controllers\Admin\Report;

use App\Exports\EnrolmentExport;
use App\Http\Controllers\Controller;
use App\Models\CoursePurchase;
use App\Models\OfflineGateway;
use App\Models\PaymentGateway;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class CoursesReportController extends Controller
{
    public function displayEnrolmentReport(Request $request)
    {
        $fromDate      = $request->from_date;
        $toDate        = $request->to_date;
        $paymentStatus = $request->payment_status;
        $paymentMethod = $request->payment_method;

        if (!empty($fromDate) && !empty($toDate)) {
            $enrolls = CoursePurchase::select(['order_number', 'user_id', 'course_id', 'discount_type', 'discount_percentage', 'discount',
                'payment_status', 'payment_due', 'created_at'])
                ->when($fromDate, fn($query, $fromDate) => $query->whereDate('created_at', '>=', Carbon::parse($fromDate)))
                ->when($toDate, fn($query, $toDate) => $query->whereDate('created_at', '<=', Carbon::parse($toDate)))
                ->when($paymentMethod, fn($query, $paymentMethod) => $query->where('payment_method', $paymentMethod))
                ->when($paymentStatus, fn($query, $paymentStatus) => $query->where('payment_status', $paymentStatus))
                ->latest();

            Session::put('course_enroll_report', $enrolls->get());
            $data['enrolls'] = $enrolls->paginate(10);

        } else {
            Session::put('course_enroll_report', []);
            $data['enrolls'] = [];
        }

        $data['onPms']  = PaymentGateway::where('status', 1)->get();
        $data['offPms'] = OfflineGateway::where('course_checkout_status', 1)->get();

        return view('admin.course.course.report', $data);
    }

    public function exportEnrolmentReport()
    {
        $enrolls = Session::get('course_enroll_report');
        if (empty($enrolls) || count($enrolls) == 0) {
            Session::flash('warning', 'There are no enrollments to export');
            return back();
        }
        return Excel::download(new EnrolmentExport($enrolls), 'course-enrollments.csv');
    }
}
