<div {{ $attributes->class(['col-lg-7 col-md-6']) }}>
    <div class="text-17 fw-500 text-dark-1 uppercase mb-25">
        {{ $bs->newsletter_text }}
    </div>
    <form action="{{ route('subscribe') }}" method="POST" id="footerSubscribeForm" class="form-single-field -base mt-15">
        @csrf
        <input required class="py-20 px-30 bg-light-3 rounded-200 text-dark-1" type="text" name="email" placeholder="Your Email">
        <button class="button -purple-1 rounded-full text-white" type="submit">
            <i class="icon-arrow-right text-24"></i>
        </button>
        <div class="mt-10">
            <small><p class="text-green-1 mb-0 success-email"></p></small>
            <small><p class="text-red-1 mb-0 err-email"></p></small>
        </div>
    </form>
</div>
