
@extends("components.frontend.layouts.master")

@section('pagename')
    Payment
@endsection

@section('content')
<div class="container my-5">
      <!-- <small class="text-danger fw-semibold">Central Secretariat</small> -->
      <h3 class="text-center fw-semibold mb-4">केन्द्रीय सचिवालय</h3>

      <div class="d-flex flex-column align-items-center">
        <!-- First row: Single member in the center -->
        <div class="row row-member justify-content-center mb-4">
          <div class="col-auto text-center">
            <div class="card col-card">
              <img
                src="./assets/Photos/Sanjay Thapa Photo.jpg"
                class="img-fluid member"
                alt="Chairman"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">सन्जय थापा</h4>
              <p class="m-0 fw-semibold">अध्यक्ष</p>
              <p class="m-0 text-md-center py-1">अमेरिका (USA)</p>
            </div>
          </div>
        </div>
        <div class="row row-member justify-content-center mb-4">
          <div class="col-auto text-center">
            <div class="card col-card">
              <img
                src="https://via.placeholder.com/120x160"
                class="img-fluid member"
                alt="Chairman"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">रमेश पाण्डे</h4>
              <p class="m-0 fw-semibold">उपाध्यक्ष</p>
              <p class="m-0 text-md-center py-1">अष्ट्रेलिया (AUS)</p>
            </div>
          </div>
        </div>

        <!-- Second row: Four members -->
        <div class="row row-member">
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Hem Sherpa.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">हेम शेर्पा</h4>
              <p class="m-0 fw-semibold">सचिव</p>
              <p class="m-0 py-1">स्पेन</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Chanak Pokhrel.jpg"
                class="img-fluid member"
                alt="General Secretary"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">चानक पोख्रेल</h4>
              <p class="m-0 fw-semibold">उपसचिव</p>
              <p class="m-0 py-1">कतार</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Karna Shahi.jpg"
                class="img-fluid member"
                alt="Treasurer"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">कर्ण शाही</h4>
              <p class="m-0 fw-semibold">उपसचिव</p>
              <p class="m-0 py-1">यु.के.</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Prabhu Thapa.jpg"
                class="img-fluid member"
                alt="Secretary"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">प्रभु थापा</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">अमेरिका</p>
            </div>
          </div>
        </div>

        <!-- Third row: Additional members -->
        <!-- Second row: Four members -->
        <div class="row row-member justify-content-center">
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Bhakta Gurung- Hongkong.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">भक्त गुरुङ</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">हङकङ</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Dr. Binod Shrestha.jpg"
                class="img-fluid member"
                alt="General Secretary"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">डा. विनोद श्रेष्ठ</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">अष्ट्रेलिया</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Bhakta Wagle.jpg"
                class="img-fluid member"
                alt="Treasurer"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">
                भक्त बहादुर वाग्ले क्षेत्री
              </h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">फ्रान्स</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/kamal Mani Guragain.jpg"
                class="img-fluid member"
                alt="Secretary"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">कमलमणि गुरागाईं</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">कतार</p>
            </div>
          </div>
        </div>


        <!-- Last Row members -->
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
          <div class="card col-card">
            <img
              src="./assets/Photos/Dr. Bimala Bhandari.jpg"
              class="img-fluid member"
              alt="Vice-Chairperson"
            />
            <h4 class="mt-2 h5 fw-semibold text-danger">डा. बिमला भण्डारी</h4>
            <p class="m-0 fw-semibold">सदस्य</p>
            <p class="m-0 py-1">रसिया</p>
          </div>
          </div>


        </div>
      </div>
@endsection


