@extends("components.frontend.layouts.master")

@section('pagename')
    Donate Now
@endsection

@section('styles')
    <style>
       .hide{ 
    display: none;
}
    </style>
@endsection

@section('content')
<div class="w-full bg-blue-50">
    <div class="container py-5">
      <div class="row ">
        <div class="col-lg-8">
          <h2 class="fw-semibold">Make a Donation</h2>
          <form method="post" id="kt_sign_up_form" action="{{ route('frontend.donate.user') }}" data-cc-on-file="false" class="require-validation" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
          @csrf
            <div class="form-group">
              <label for="name">Name:</label>
              <input
              required
                type="text"
                class="form-control"
                id="name"
                name="name"
                placeholder="Full Name"
              />
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input
              required
                type="email"
                name="email"
                class="form-control"
                id="email"
                placeholder="Email address"
              />
            </div>
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input
              required
                type="tel"
                class="form-control"
                id="phone"
                name="phone"
                placeholder="Phone Number"
              />
            </div>
            <div class="form-group">
              <label for="amount">Amount:</label>
              <input
              required
                type="number"
                name="amount"
                class="form-control"
                id="amount"
                placeholder="Amount (USD)"
              />
            </div>
            <div class="form-group">
              <label for="purpose">Purpose for Donation:</label>
              <input
              required
                type="text"
                class="form-control"
                id="purpose"
                name="message"
                placeholder="Purpose for Donation"
              />
            </div>
            <div class="form-group">
              <label for="card-number">Card Number:</label>
              <input
              autocomplete='off'
              required
                type="text"
                class="form-control card-number"
                id="card-number"
                placeholder="Card Number"
              />
            </div>
            <div class="form-group">
              <label for="cvc">CVC:</label>
              <input
              required
              autocomplete='off'
                type="text"
                class="form-control card-cvc"
                id="cvc"
                placeholder="ex. 311"
              />
            </div>
            <div class="form-group">
              <label for="expiry">Expiry Date:</label>
              <div class="row">
                <div class="col">
                  <input
                  required
                  autocomplete='off'
                    type="text"
                    class="form-control card-expiry-month"
                    id="expiry-month"
                    placeholder="MM"
                  />
                </div>
                <div class="col">
                  <input
                  required
                  autocomplete='off'
                    type="text"
                    class="form-control card-expiry-year"
                    id="expiry-year"
                    placeholder="YYYY"
                  />
                </div>
              </div>
            </div>
            <div class='form-row row'>
                <div class='col-md-12 error form-group hide'>
                  <div class='alert-danger alert'>Please correct the errors and try again.</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary fw-bold"
              >Pay Now</button>
          </form>
          <!-- Modal -->
          <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="donateModalLongTitle">Donation Status</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Your donation has been sent successfully.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary w-full" data-dismiss="modal">Close</button>
                  <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <!-- This can be removed -->
          <ul class="list-unstyled">
            <li>
              <div class="main-news-container">
                <img
                  class="d-block news-img"
                  src="https://static.vecteezy.com/system/resources/previews/023/863/570/original/hand-donating-money-coin-in-donation-box-for-sharing-concept-vector.jpg"
                  alt="Donation Image"
                />
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('scripts')
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script>

$(function() {
  var $form = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
    $inputs = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid = true;
    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
    });
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }
});
	</script>
  @endsection