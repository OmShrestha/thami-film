Hello {{ $contact->name }},

<p>{!! replaceBaseUrl($contact->message) !!}</p>

<p style="margin-botton: 0px;">Best Regards,</p>
<p>{{$bs->website_title}}</p>

