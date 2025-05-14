@extends("components.frontend.layouts.master")

@section('pagename')

@endsection
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v15.0"></script>

@section('content')

   <!-- Slider Section -->
   <!-- Slider Section -->
<section>
    <div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
        <div class="carousel-inner">
            @foreach($sliders as $index => $slider)
                <div class="carousel-item @if($index == 0) active @endif" data-bs-interval="6000">
                    <img src="{{ asset('assets/frontend/images/sliders/' . $slider->image) }}" class="d-block w-100" alt="img">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>



    <!-- Chairman Section -->
    <section>
        <div class="container py-16 py-xl-48 ">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-5 col-12 py-0">
                    <div class="chairman">
                        <img src="{{ asset('assets/lfm/static/chairman.jpeg') }}" alt="" class="d-block w-100">
                        
                    </div>
                    <div class="chairperson-name">
                        संजय थापा<br>
                        अध्यक्ष<br>
                        प्रवासी नेपाली मन्च,  अन्तर्राष्ट्रिय कमिटि
                    </div>
                </div>
                <div class="col-xl-7 col-12 pt-16">
                    <div class="pl-xl-48 pl-0 ">
                        <h1 class="font-display-36 fw-semibold text-blue-500 h-c">अध्यक्ष ज्यू को शुभकामना !</h1>
                        <!-- <p class="font-heading-28 text-blue-500">सन्देश</p> -->
                        <p class="font-body-18">
                            नेपालवाट प्रवासमा रोजगारी, पेशा व्यवसाय वा अध्यनको लागि स्थाई वा अस्थाई रुपमा वसोवास गरिरहेका नेपालीहरु विच आपसी सद्भाव, मित्रता र सहयोग आदान प्रदान गराउने र प्रवासमा रहेका नेपालीहरुको समस्य वुझि आवस्यकता अनुसारको पहल गर्ने र प्रवास तथा नेपालमा प्रवासी नेपालीहरुको हक अधिकारको लागि र नेपालको कला, संसकृति र भाषाको संरक्षण तथा प्रचारको र नेपालको पर्यटन उधोग व्यवसायलाई प्रत्साहन गरी प्रवासमा आर्जन गरेको ज्ञानशिप पुंजीलाई नेपाल सम्म पुर्याई संवृद्ध नेपाल सुखी नेपालको राष्ट्रिय आकंक्षालाई सहयोग पुर्याउने उद्धेश्यले प्रवासमा रहेका देशभक्त, लोकतान्त्रिक र प्रगतिशील नेपालीहरुको विच एउटा संस्थाको आवस्यकता परेकोले प्रवासी नेपाली मन्चको गठन गरिएको हो !
                        </p>
                        <p class="font-body-18">
                            प्रवासी नेपाली मन्च संसारी भरी ९० कै दसक देखी राष्ट्रिय कमिटीको रुपमा गठन भई संचालन भई रहेको देखिन्छ र २००० साल पछि धेरै राष्ट्रहरुमा विकास र विस्तार भई हाल अमेरीका, युरोप, अष्ट्रोलिया, मध्यपूर्वी एसिया र एसिया प्यासशिफिक गरी ३७ वटा देशमा कृयाशिल छ। 
                        </p>
                        <p class="font-body-18">
                            आज हामी Website निर्माण गरी प्रवासी नेपाली मन्चको संसार भरी राष्ट्रिय कमिटीको माध्यमवाट होस वा माहादेश कमिटीको माध्यमवाट होस वा अन्तर्राष्ट्रिय कमिटीको माध्यमवाट होस नेपाल र नेपालको लागि गरिएको कामहरुको प्रचार प्रशारमा लाग्ने छौ र यो Website निर्माण पस्चात हाम्रो निति, कार्यक्रमा र हाम्रो गतिविधिहरु सम्पुर्ण जनमानसमा सहज पुग्ने छ  भन्ने उद्देश्य पनि पुरा हुने आशा गरेका छौ।
                        </p>
                        <p class="font-body-18">
                           अन्तमा, प्रवासी नेपाल मन्च, अन्तर्राष्ट्रिय कमिटी, ज्ञानशीप विभागले सकृयतामा Website निर्माणमा भुमिका खेलेकोमा हार्दिक धन्यवाद दिन चाहन्छु साथै Website निर्माण मा सहयोग गर्ने NEPA-IT LLC लाई पनि हार्दिक धन्यावाद व्यक्त गर्दै सवको सहयोग सदा यो संस्थाले पाईरहने आशा र विश्वास गर्दछु !
यसैको माध्ययम बाट हामीलाई आवस्यक सुक्षाव र स्वच्छ आलोचनाको पनि अपेक्षा गर्दछौ। धन्यवाद
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <!-- Youtube Video Section -->
    <section class="bg-white-80">
        <div class="container py-16 py-xl-48 ">
            <div class="row">
                <div class="col-12">
                    <h1 class="font-display-36 fw-bold mb-0">ONF भिडियो</h1>
                    <div class="border border-bottom mb-16 "></div>
                </div>
                <div class="col-12 p-0">
                    <div class="container justify-content-center yt-video">
                        <div class="row g-3">
                            <div class="col-12 col-md-4">
                                <iframe class="w-100" height="412"
                                    src="https://www.youtube.com/embed/sXNgHXkqXus?si=oD5Bhk4QoqTrftKI"
                                    title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="col-12 col-md-4 ">
                                <iframe class="w-100" height="412"
                                    src="https://www.youtube.com/embed/Cz31BYnZa2I?si=cPs72XRm2j5vknqS"
                                    title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="col-12 col-md-4 ">
                                <iframe class="w-100" height="412"
                                    src="https://www.youtube.com/embed/A-_FSqmJI4E?si=uhAU98TVWheGN46x"
                                    title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news">
        <div class="container py-16 py-xl-48">
            <div class="row">
                <div class="col-12">
                    <p class="font-display-36 fw-bold mb-0">समाचार</p>
                    <div class="border border-bottom mb-16"></div>
                </div>
                <div class="col-12">
                    <div class="row align-items-center">
                        @foreach($blogs->take(1) as $blog)
                            <div class="col-lg-6 col-12 py-8">
                                <div class="image-container main-image-container mx-auto">
                                    <a href="{{ route('blogs.show', [$blog->slug]) }}"><img style="width:100%" src="{{ loadImageFor($blog->main_image) }}" alt=""></a>
                                    <div class="overlay-text">
                                        <span class="badge bg-blue-400">{{$blog->bcategory->name}}</span>
                                        <h3 class="mt-2 font-heading-20 line-height-heading fw-semibold">
                                            <a href="{{ route('blogs.show', [$blog->slug]) }}">{{$blog->title}}</a>
                                        </h3>
                                        <!-- <p class="mb-0"><small>बिकेश शाक्य- 15 नोभेम्बर 2024</small></p> -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-6 col-12">
                            <div class="row">
                            @foreach($blogs->skip(1)->take(4) as $blog)
                            <div class="col-lg-6 col-12 py-8">
                                    <div class="image-container side-image-container mx-auto">
                                        <a href="{{ route('blogs.show', [$blog->slug]) }}"><img style="width:100%" src="{{ loadImageFor($blog->main_image) }}" alt=""></a>
                                        <div class="overlay-text">
                                            <span class="badge bg-blue-400">{{$blog->bcategory->name}}</span>

                                            <h3
                                                class="mt-2 font-heading-16 line-height-heading fw-semibold text-white-100">
                                                <a href="{{ route('blogs.show', [$blog->slug]) }}">{{$blog->title}}</a>
                                            </h3>
                                            <!-- <p class="mb-0"><small>बिकेश शाक्य- 15 नोभेम्बर 2024</small></p> -->
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                              
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facebook and Notice -->
    <section class="bg-white-80">
        <div class="container py-16 py-xl-48">
            <div class="row">
            <div class="col-12 col-lg-5">
    <div class="row justify-content-center">
        <div class="text-center full-width-card">
            <div class="card p-3 shadow-lg rounded">
                <h3 class="text-center mb-3">Follow Us on Facebook</h3>
                <hr class="mt-0 mb-4" />
                <div class="scrollable-facebook">
                    <div class="fb-page" 
                         data-href="https://www.facebook.com/ONFGlobal" 
                         data-tabs="timeline" 
                         data-width="500" 
                         data-height="460" 
                         data-small-header="false" 
                         data-adapt-container-width="true" 
                         data-hide-cover="false" 
                         data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/ONFGlobal" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/ONFGlobal">ONF Global</a>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                <div class="col-12 col-lg-7">
                    <div class="card border-0 shadow-sm" style="width: 100%;">
                        <div class="card-header font-heading-24 text-black-500">
                            सूचना शीर्षक
                        </div>
                        <div class="card- p-0 p-xl-8">
                            <ul class="list-group list-group-flush">
                                
                            @foreach($blogs->take(5) as $blog)
                                <li class="list-group-item">
                                    <a href="{{ route('blogs.show', [$blog->slug]) }}"><h5 class="font-heading-16 fw-semibold text-black-500">{{$blog->title}}</h5></a>
                                    <p class="text-black-400 mb-1">
                                    {{$blog->excerpt}}
                                    </p>
                                </li>
                            @endforeach
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Category News -->
    <section>
        <div class="container py-16 pt-xl-48 pb-xl-24">
            <div class="row">
                <div class="col-12">
                    <h1 class="font-display-36 fw-bold mb-0">आजको बिशेष</h1>
                    <div class="border border-bottom mb-8 mb-xl-16 "></div>
                </div>
                <div class="col-12">
                    <div class="row">
                        
                        
                    @foreach($blogs->take(4) as $blog)
                        <div class="col-xl-3 col-md-6 col-12 py-8">
                            <div class="card shadow-sm">
                                <div class="cat-img">
                                    <img style="width:100%" src="{{ loadImageFor($blog->main_image) }}" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="font-heading-20 fw-semibold text-black-500"><a href="{{ route('blogs.show', [$blog->slug]) }}"
                                            class="cat-title">{{$blog->title}}</a>
                                    </h5>
                                    <p class="card-text text-black-400">{{$blog->excerpt}}</p>
                                    <a href="{{ route('blogs.show', [$blog->slug]) }}" class="text-blue-500 font-label-13 btn-link">अझै हेर्नुहोस् ›</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    

@endsection
