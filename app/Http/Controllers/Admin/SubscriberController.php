<?php

namespace App\Http\Controllers\Admin;

use App\Models\BasicExtended;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Models\Subscriber;
use App\Models\BasicSetting;
use App\Models\Mail\ContactMail;
use Session;
use Mail;

class SubscriberController extends Controller
{
    public function index(Request $request) {
        $term = $request->term;

      $data['subscs'] = Subscriber::when($term, function ($query, $term) {
                            return $query->where('email', 'LIKE', '%' . $term . '%');
                        })->orderBy('id', 'DESC')->paginate(5);
      return view('admin.subscribers.index', $data);
    }

    public function mailsubscriber() {
      return view('admin.subscribers.mail');
    }

    public function subscsendmail(Request $request) {
        if(Subscriber::count() == 0) {
            $request->session()->flash('warning', "No subscriber found!");
            return back();
        }

      $request->validate([
        'subject' => 'required',
        'message' => 'required'
      ]);

      $sub = $request->subject;
      $msg = $request->message;

      $subscs = Subscriber::all();
      $settings = BasicSetting::first();
      $from = $settings->contact_mail;

      $be = BasicExtended::first();


        $mail = new PHPMailer(true);

        if ($bs->is_smtp == 1) {
            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = $bs->smtp_host;                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = $bs->smtp_username;                     // SMTP username
                $mail->Password   = $bs->smtp_password;                               // SMTP password
                $mail->SMTPSecure = $bs->encryption;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = $bs->smtp_port;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom($bs->from_mail, $bs->from_name);

                foreach ($subscs as $key => $subsc) {
                    $mail->addAddress($subsc->email);     // Add a recipient
                }
            } catch (Exception $e) {
                // die($e->getMessage());
            }
        } else {
            try {

                //Recipients
                $mail->setFrom($bs->from_mail, $bs->from_name);
                foreach ($subscs as $key => $subsc) {
                    $mail->addAddress($subsc->email);     // Add a recipient
                }
            } catch (Exception $e) {
                // die($e->getMessage());
            }
        }

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $sub;
        $mail->Body    = $msg;

        $mail->send();

      Session::flash('success', 'Mail sent successfully!');
      return back();
    }

    public function delete(Request $request)
    {

        $subscriber = Subscriber::findOrFail($request->subscriber_id);
        $subscriber->delete();

        Session::flash('success', 'Subscriber deleted successfully!');
        return back();
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $subscriber = Subscriber::findOrFail($id);
            $subscriber->delete();
        }

        Session::flash('success', 'Subscribers deleted successfully!');
        return "success";
    }
}
