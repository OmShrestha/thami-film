@props([
    'bs'
])

<div {{ $attributes->class(['container']) }}>
    <div class="top-content section-padding">
        <div class="row gx-0">
            <div class="col-lg-4">
                <div class="info-side">
                    <div class="text fsz-24 color-333 lh-3 fw-600">
                        We are a team of passionate digital marketers, designers, and developers who are dedicated to helping our
                        clients
                    </div>
                    <div class="foot-social mt-50">
                        <a href="#"> <i class="fab fa-x-twitter"></i> </a>
                        <a href="#"> <i class="fab fa-facebook-f"></i> </a>
                        <a href="#"> <i class="fab fa-instagram"></i> </a>
                        <a href="#"> <i class="fab fa-linkedin-in"></i> </a>
                        <a href="#"> <i class="fab fa-youtube"></i> </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-2">
                <div class="branch-card">
                    <h5 class="mb-20 mt-5 mt-lg-0 fw-600"> Thapathali, Kathmandu </h5>
                    <ul class="footer-links">
                        <li><a href="#"> Opposite Kantipur Road 44600 Lane </a></li>
                        <li><a href="#"> contact@ntcs.com </a></li>
                        <li><a href="#"> +977 {{ $bs->support_phone }} </a></li>
                    </ul>
                </div>
                <div class="branch-card">
                    <h5 class="mb-20 mt-5 fw-600"> Helps </h5>
                    <ul class="footer-links">
                        <li><a href="#"> Term & Conditions </a></li>
                        <li><a href="#"> Partner Policy </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="branch-card">
                    <h5 class="mb-20 mt-5 mt-lg-0 fw-600"> Tinkune, Kathmandu </h5>
                    <ul class="footer-links">
                        <li><a href="#"> Subidhanagar Lane 44600 </a></li>
                        <li><a href="#"> contact@ntcs.com </a></li>
                        <li><a href="#"> +977 {{ $bs->support_phone }} </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
