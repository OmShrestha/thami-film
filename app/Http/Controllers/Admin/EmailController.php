<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Session;

class EmailController extends Controller
{
    public function mailFromAdmin()
    {
        return view('admin.basic.email.mail_from_admin');
    }

    public function updateMailFromAdmin(Request $request)
    {
        $messages = [
            'from_mail.required_if'     => 'The smtp host field is required when smtp status is active.',
            'from_name.required_if'     => 'The from name field is required when smtp status is active.',
            'smtp_host.required_if'     => 'The smtp host field is required when smtp status is active.',
            'smtp_port.required_if'     => 'The smtp port field is required when smtp status is active.',
            'encryption.required_if'    => 'The encryption field is required when smtp status is active.',
            'smtp_username.required_if' => 'The smtp username field is required when smtp status is active.',
            'smtp_password.required_if' => 'The smtp password field is required when smtp status is active.'
        ];

        $request->validate([
            'from_mail'     => 'required_if:is_smtp,1',
            'from_name'     => 'required_if:is_smtp,1',
            'is_smtp'       => 'required',
            'smtp_host'     => 'required_if:is_smtp,1',
            'smtp_port'     => 'required_if:is_smtp,1',
            'encryption'    => 'required_if:is_smtp,1',
            'smtp_username' => 'required_if:is_smtp,1',
            'smtp_password' => 'required_if:is_smtp,1',
        ], $messages);

        updateSettingsValue('from_mail', $request->from_mail);
        updateSettingsValue('from_name', $request->from_name);
        updateSettingsValue('is_smtp', $request->is_smtp);
        updateSettingsValue('smtp_host', $request->smtp_host);
        updateSettingsValue('smtp_port', $request->smtp_port);
        updateSettingsValue('encryption', $request->encryption);
        updateSettingsValue('smtp_username', $request->smtp_username);
        updateSettingsValue('smtp_password', $request->smtp_password);

        Session::flash('success', 'SMTP configuration updated successfully!');
        return back();
    }

    public function mailToAdmin()
    {
        return view('admin.basic.email.mail_to_admin');
    }

    public function updateMailToAdmin(Request $request)
    {
        $messages = [
            'to_mail.required' => 'Mail Address is required.'
        ];

        $request->validate([
            'to_mail' => 'required',
        ], $messages);

        updateSettingsValue('to_mail', $request->to_mail);

        Session::flash('success', 'Mail address updated successfully!');
        return back();
    }

    public function templates()
    {
        $data['templates'] = EmailTemplate::orderBy('id', 'ASC')->get();
        return view('admin.basic.email.templates.index', $data);
    }

    public function editTemplate($id)
    {
        $data['template'] = EmailTemplate::find($id);
        return view('admin.basic.email.templates.edit', $data);
    }

    public function templateUpdate(Request $request, $id)
    {
        $template                = EmailTemplate::find($id);
        $template->email_subject = $request->email_subject;
        $template->email_body    = $request->email_body;
        $template->save();

        Session::flash('success', 'Email Template updated successfully!');
        return "success";
    }
}
