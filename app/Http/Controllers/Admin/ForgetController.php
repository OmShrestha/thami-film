<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Mail;
use Session;

class ForgetController extends Controller
{
    public function mailForm() {
        return view('admin.forget');
    }

    public function sendmail(Request $request) {
        // check whether the mail exists in database
        $request->validate([
            'email' => [
                'required',
                function ($attribute, $value, $fail) {
                    $count = Admin::where('email', $value)->count();
                    if ($count == 0) {
                        $fail("The email address does not exist!");
                    }
                }
            ]
        ]);

        // change the password with newly created random password
        $pass = uniqid();
        $admin = Admin::where('email', $request->email)->first();
        $admin->password = bcrypt($pass);
        $admin->save();

        $from = $bs->from_mail;
        $to = $request->email;
        $subject = "Restore Password & Username";
        $username = $admin->username;

        // Send Mail
        $mail = new PHPMailer(true);

        if ($bs->is_smtp == 1) {
            try {
                $mail->isSMTP();
                $mail->Host       = $bs->smtp_host;
                $mail->SMTPAuth   = true;
                $mail->Username   = $bs->smtp_username;
                $mail->Password   = $bs->smtp_password;
                $mail->SMTPSecure = $bs->encryption;
                $mail->Port       = $bs->smtp_port;

                //Recipients
                $mail->setFrom($from, $bs->from_name);
                $mail->addAddress($to);

                // Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = "<h4>Hello $username,</h4><div><p><strong>Your current username:</strong> $username</p><p><strong>Your new password:</strong>$pass</p></div>";

                $mail->send();
            } catch (Exception $e) {

            }
        } else {
            try {

                //Recipients
                $mail->setFrom($from, $bs->from_name);
                $mail->addAddress($to);

                // Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = "<h4>Hello $username,</h4><div><p><strong>Your current username:</strong> $username</p><p><strong>Your new password:</strong>$pass</p></div>";

                $mail->send();
            } catch (Exception $e) {

            }
        }

        Session::flash('success', 'New password & current username sent successfully via mail');
        return back();
    }
}
