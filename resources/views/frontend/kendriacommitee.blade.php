
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

        <!-- Fourth row: Additional members -->
        <!-- Second row: Four members -->
        <div class="row row-member justify-content-center">
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
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Shiva Kumar Baruwal.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">शिव बरुवाल</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">बेल्जियम</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Kunti Thapa.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">कुन्ती थापा</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">अमेरिका</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Govinda Paudel.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">गोविन्द पौडेल</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">पोर्चुगल</p>
            </div>
          </div>
        </div>

        <div class="row row-member justify-content-center">
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Dr Saroj Kandel.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">डा. सरोज कंडेल</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">जापान</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Kalpana Tripathi.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">कल्पना त्रिपाठी</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">यु.के.</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Janaki Karki.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">जानकी कार्की</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">अमेरिका</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Hemraj Joshi.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">हेमराज जोशी</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">जर्मनी</p>
            </div>
          </div>
        </div>

        <div class="row row-member justify-content-center">
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Rajendra Pudasaini.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">
                राजेन्द्र पुडासैनी
              </h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">यु.के.</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Balram Giri Photo.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">बलराम गिरी</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">साउदी अरब</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Surendra Thapaliya.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">सुरेन्द्र थपलिया</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">यु.के.</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Suresh KC.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">सुरेश केसी</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">जापान</p>
            </div>
          </div>
        </div>

        <div class="row row-member justify-content-center">
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Jyoti Sharma.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">ज्योतीदेवी शर्मा</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">इजरायल</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Saraswoti KC.jfif"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">सरस्वती केसी</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">यु.के.</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Sanju Poudel Photo.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">
                सन्जु केसी पौड्याल
              </h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">दक्षिण कोरिया</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Shishir Nepal.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">शिशिर नेपाल</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">अष्ट्रेलिया</p>
            </div>
          </div>
        </div>

        <!-- Second last members -->
        <div class="row row-member justify-content-center">
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="https://via.placeholder.com/120x160"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">पुरुत्तोम बोहरा</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">अमेरिका</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Rajendra Siwakoti.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">
                राजेन्द्र शिवाकोटी
              </h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">अमेरिका</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Sita KC Thapa.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">सीता के.सी. थापा</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">अष्ट्रेलिया</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Bijay Phuyal.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">विजय कुमार फुँयाल</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">अष्ट्रेलिया</p>
            </div>
          </div>
        </div>

        <!-- Last Row members -->
        <div class="row row-member justify-content-center">
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Santosh Bhattarai.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">
                सन्तोष कुमार भट्टराई
              </h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">जर्मनी</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Madhav Shah.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">माधव शाह</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">अष्ट्रेलिया</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Baburam Pariyar.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">
                बाबुराम बिश्वकर्मा
              </h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">यु.ए.ई.</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Shaligram Panta.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">शालिग्राम पन्त</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">बहराइन</p>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-4 col-md-6 col-sm-12 justify-content-center d-flex text-center mb-3"
          >
            <div class="card col-card">
              <img
                src="./assets/Photos/Tak Gurung.jpg"
                class="img-fluid member"
                alt="Vice-Chairperson"
              />
              <h4 class="mt-2 h5 fw-semibold text-danger">टक बहादुर गुरुङ</h4>
              <p class="m-0 fw-semibold">सदस्य</p>
              <p class="m-0 py-1">यु.ए.ई.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection


