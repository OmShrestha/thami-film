<style>
    .light-fixture:before {
        overflow: hidden;
    }
</style>
<x-frontend.global.topbar :bs="$bs"/>
<?php
     $blogs = \App\Models\Blog::where('language_id','2')->get();
    ?>
<nav class="navbar sticky-top navbar-expand-lg bg-blue-500">
        <div class="container">
            <div class="d-flex justify-content-end w-100 d-lg-none">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav w-100 justify-content-xl-between ">
                     <li class="nav-item font-heading-20 ">
                        <a class="nav-link text-white-100" href="{{url('/')}}">होमपेज</a>
                    </li> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white-100 font-heading-20" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            हाम्रो वारेमा
                        </a>
                        <ul class="dropdown-menu font-heading-20 text-white-100 shadow-lg">
                            <li><a class="dropdown-item" href="/who-we-are">हामी को हौ ?</a></li>
                            <li><a class="dropdown-item" href="/sangathansangrachana">सांगठनिक संरचना</a></li>
                            <li><a class="dropdown-item" href="/faq">धेरै सोधिने प्रश्न र उत्तर</a></li>
                            <li class="dropdown">
                                <a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">हाम्रा गतिविधिहरु</a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <li>
                                        <a class="dropdown-item" href="#">कोरोनाको समयमा पोखरामा आक्सिजिन प्रान्टको निर्माण </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"> भुकम्पले झति भएको जाजरकोट स्वास्थ चौकी पुन: निर्माण!</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">भुकम्प पिडित आकस्मिक राहत</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">हमासको आक्रमणमा परी मृत्यु भएका १० जनाको परीवारलाई आर्थिक सहयोग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">हमासको आक्रमणमा परी धाईते भएका ४ जनालाई आर्थिक सहयोग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">मलेसियामा रेलमा ठोकिएर मृत्यु हुनेको परीवारलाई आर्थिक सहयोग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">पोर्चुगलमा मुत्यु भएको व्यक्तिको दाहसंसकारमा सहयोग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"> कुवेतमा मृत्यु भएको ४८ वर्षे महिनाको लास नेपाल लग्न लाग्ने रकम सहयोग </a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white-100 font-heading-20" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            नेतृत्व
                        </a>
                        <ul class="dropdown-menu font-heading-20 text-white-100 shadow-lg">
                            <li><a class="dropdown-item" href="/kendriasachivalaye">केन्द्रीय सचिवालय</a></li>
                            <li><a class="dropdown-item" href="/kendriacommitte">केन्द्रीय कमिटि</a></li>
                            <li><a class="dropdown-item" href="/advisory">सल्लाहकार परिषद्</a></li>
                            <li class="dropdown">
                                <a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">केन्द्रीय विभागहरु</a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <li>
                                        <a class="dropdown-item" href="/anugamanbibag">अनुगमन विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/sangathanbibag">संगठन विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/schoolbibag">स्कूल विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/prachartathaprakashan">रचार तथा प्रकाशन विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/mahilabibag">महिला विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/mahilasasaktikaran">महिला सशक्तिकरण विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/nrna">एनआरएनए तथा संघ/संस्था समन्वय विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/arthikbibag">आर्थिक विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/paryatanbibag">पर्यटन तथा प्रवर्द्धन विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/kalasahitya">कला, साहित्य तथा संस्कृति विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/sramtaharojgar">श्रम तथा रोजगार प्रवर्द्धन विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/gyanship">ज्ञान, सिप तथा प्रविधि विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/budhijivi">वुद्धिजीवि विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/udyog">उद्योग व्यवसाय विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/atiriktabibag">अतिरिक्त कृयाकलाप विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/nepallagani">नेपाल लगानी तथा प्रवर्द्धन विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/yuwathakhelkud">युवा तथा खेलकूद विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/kanunbibag">कानून विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/bidhharthibibag">विद्यार्थी विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/swasthyebibag">स्वास्थ्य विभाग</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/karyalayabebasthapanbibag">कार्यालय व्यवस्थापन विभाग</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white-100 font-heading-20" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            इतिहास
                        </a>
                        <ul class="dropdown-menu font-heading-20 text-white-100 shadow-lg">
                            <li><a class="dropdown-item" href="/sansthasanthapan">सँस्था स्थापना</a></li>
                            <li><a class="dropdown-item" target="_blank" href="/antarimcommitte">अन्तरिम कमिटि</a></li>
                            <li><a class="dropdown-item" target="_blank" href="/pratham-adhibeshan">प्रथम अधिवेशन</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white-100 font-heading-20" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            महादेश तथा राष्ट्रिय कमिटि
                        </a>
                        <ul class="dropdown-menu font-heading-20 text-white-100 shadow-lg">
                            <li><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">अमेरिकाज महादेश</a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <li><a class="dropdown-item" href="https://onfusa.org/" target="_blank">अमेरिका</a></li>
                                    <li><a class="dropdown-item" href="/canada">क्यानडा</a></li>
                                </ul>
                            </li>

                            <li><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">युरोप महादेश</a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <li><a class="dropdown-item" href="/austria">अष्ट्रिया</a></li>
                                    <li><a class="dropdown-item" href="/ireland">आयरल्याण्ड</a></li>
                                    <li><a class="dropdown-item" href="/italy">इटाली</a></li>
                                    <li><a class="dropdown-item" href="/czech-republic">चेक रिपब्लिक</a></li>
                                    <li><a class="dropdown-item" href="/germany">जर्मनी</a></li>
                                    <li><a class="dropdown-item" href="/denmark">डेनमार्क</a></li>
                                    <li><a class="dropdown-item" href="/netherlands">नेदरल्याण्ड</a></li>
                                    <li><a class="dropdown-item" href="/norway">नर्वे</a></li>
                                    <li><a class="dropdown-item" href="/portugal">पोर्चुगल</a></li>
                                    <li><a class="dropdown-item" href="/poland">पोल्याण्ड</a></li>
                                    <li><a class="dropdown-item" href="/france">फ्रान्स</a></li>
                                    <li><a class="dropdown-item" href="/finland">फिनल्याण्ड</a></li>
                                    <li><a class="dropdown-item" href="/belgium">बेल्जियम</a></li>
                                    <li><a class="dropdown-item" href="/malta">माल्टा</a></li>
                                    <li><a class="dropdown-item" href="/uk">यु. के.</a></li>
                                    <li><a class="dropdown-item" href="/russia">रशिया</a></li>
                                    <li><a class="dropdown-item" href="/romania">रोमानिया</a></li>
                                    <li><a class="dropdown-item" href="/cyprus">साइप्रस</a></li>
                                    <li><a class="dropdown-item" href="/spain">स्पेन</a></li>
                                    <li><a class="dropdown-item" href="/slovenia">स्लोभेनिया</a></li>
                                    <li><a class="dropdown-item" href="/switzerland">स्वीजरल्याण्ड</a></li>
                                    <li><a class="dropdown-item" href="/sweden">स्वीडेन</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">मध्य पूर्व महादेश</a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <li><a class="dropdown-item" href="/israel">इजरायल</a></li>
                                    <li><a class="dropdown-item" href="/oman">ओमान</a></li>
                                    <li><a class="dropdown-item" href="/qatar">कतार</a></li>
                                    <li><a class="dropdown-item" href="/kuwait">कुवेत</a></li>
                                    <li><a class="dropdown-item" href="/uae">यु.ए.ई.</a></li>
                                    <li><a class="dropdown-item" href="/bahrain">वहराइन</a></li>
                                    <li><a class="dropdown-item" href="/saudi-arabia">साउदी अरव</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">पूर्वी एशिया महादेश</a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <li><a class="dropdown-item" href="/cambodia">कम्बोडिया</a></li>
                                    <li><a class="dropdown-item" href="/japan">जापान</a></li>
                                    <li><a class="dropdown-item" href="/south-korea">दक्षिण कोरिया</a></li>
                                    <li><a class="dropdown-item" href="/macau">मकाउ</a></li>
                                    <li><a class="dropdown-item" href="/malaysia">मलेशिया</a></li>
                                    <li><a class="dropdown-item" href="/hong-kong">हंगकंग</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">ओशियाना महादेश</a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <li><a class="dropdown-item" href="/australia">अष्ट्रेलिया</a></li>
                                    <li><a class="dropdown-item" href="/new-zealand">न्यूजल्यांड</a></li>
                                </ul>
                            </li>
                        </ul>
                      
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white-100 font-heading-20" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            दस्तावेज तथा वक्तव्य
                        </a>
                        <ul class="dropdown-menu font-heading-20 text-white-100 shadow-lg">
                            <li><a class="dropdown-item" target="_blank" href="{{ asset('assets/lfm/static/ONF-Bylaws.pdf') }}">विधान</a></li>
                            <li><a class="dropdown-item"  href="/adhibeshan">प्रथम अधिवेशनबाट पारित प्रतिवेदन</a></li>
                            <li><a class="dropdown-item" href="#">अन्य प्रतिवेदनहरु</a></li>
                        </ul>

                        
                    </li>
                    <li class="nav-item font-heading-20 ">
                        <a class="nav-link text-white-100" href="/gallery">फोटो ग्यालरी</a>
                    </li> 

                   
                </ul>
                <div class="d-flex justify-content-end align-items-center gap-2">
    <a href="/membership">
        <button class="bg-red-500 border-0 text-white-100 px-32 py-8 rounded">
            सदस्यता
        </button>
    </a>
    <a href="/donate">
        <button class="bg-red-500 border-0 text-white-100 px-32 py-8 rounded">
            डोनेट
        </button>
    </a>
</div>
            </div>
        </div>
    </nav>
