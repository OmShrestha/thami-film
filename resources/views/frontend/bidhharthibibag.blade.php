
@extends("components.frontend.layouts.master")

@section('pagename')
    Payment
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">विद्यार्थी विभाग</h2>
    <table class="table table-bordered table-striped table-hover text-center">
        <thead class="thead-dark">
            <tr>
                <th>क्र.सं.</th>
                <th>पद</th>
                <th>नाम थर</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>1</td><td>प्रमुख</td><td>सञ्जु के.सी. (दक्षिण कोरिया)</td></tr>
            <tr><td>2</td><td>उपप्रमुख</td><td>अरुण गौतम (अष्ट्रेलिया)</td></tr>
            <tr><td>3</td><td>सचिव</td><td>रोबट सम्बाहाङ्फे (पोर्चुगल)</td></tr>
            <tr><td>4</td><td>सदस्य</td><td>शदिप्ता प्याकुरेल (अमेरिका)</td></tr>
            <tr><td>5</td><td>सदस्य</td><td>कुमार के.सी. (युएई)</td></tr>
            <tr><td>6</td><td>सदस्य</td><td>कृष्ण प्रसाद भुसाल (जापान)</td></tr>
        </tbody>
    </table>
</div>
@endsection


