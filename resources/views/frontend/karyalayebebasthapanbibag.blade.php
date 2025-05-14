
@extends("components.frontend.layouts.master")

@section('pagename')
    Payment
@endsection

@section('content')
<div class="container mt-5">
     <h2 class="text-center mb-4">कार्यालय व्यवस्थापन विभाग</h2>
    <table class="table table-bordered table-striped table-hover text-center">
        <thead class="thead-dark">
            <tr>
                <th>क्र.सं.</th>
                <th>पद</th>
                <th>नाम थर</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>1</td><td>सदस्य</td><td>डा. बिमला भण्डारी (रसिया)</td></tr>
            <tr><td>2</td><td>सदस्य</td><td>चन्द्र शर्मा (बेल्जियम)</td></tr>
        </tbody>
    </table>
</div>
@endsection


