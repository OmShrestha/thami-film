
@extends("components.frontend.layouts.master")

@section('pagename')
    Payment
@endsection

@section('content')
<div class="container my-5">
        <h2 class="text-center mb-4">धेरै सोधिने प्रश्न र उत्तर</h2>
        <div class="accordion" id="faqAccordion">
            <!-- Question 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                    १. प्रवासी नेपाली मंच (ONF) कस्तो संस्था हो?
                    </button>
                </h2>
                <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                    प्रवासी नेपाली मंच (ONF) विश्वभर रहेका प्रवासी नेपालीहरूमाझ एकता, सहयोग, र सामाजिक सेवा प्रवर्द्धन गर्ने उद्देश्यले स्थापना गरिएको संस्था हो। यस संस्थाले नेपालीहरूको हक, अधिकार, र हितको संरक्षणमा विशेष ध्यान दिन्छ। सामाजिक, सांस्कृतिक, र परोपकारी गतिविधिहरू मार्फत नेपाली समुदायलाई सहयोग गर्ने र जोड्ने यसको मुख्य उद्देश्य हो।
                    </div>
                </div>
            </div>
            <!-- Question 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                    २. प्रवासी नेपाली मंच (ONF) ले ककसलाई सहयोग गर्छ?
                    </button>
                </h2>
                <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                    प्रवासी नेपाली मंचले विदेशमा बसोबास गर्ने नेपाली समुदायलाई सहायता प्रदान गर्छ। यसले रोजगार, शिक्षा, स्वास्थ्य सेवा, आपतकालीन सहायता, र आप्रवासन सम्बन्धी समस्याहरू समाधान गर्न सहयोग पुर्‍याउँछ। साथै, संस्थाले आवश्यकता परेको बेला नेपालमा रहेका मानिसहरूलाई पनि मानवीय र आर्थिक सहयोग पुर्‍याउने प्रयास गर्दछ।
                    </div>
                </div>
            </div>
            <!-- Question 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                    ३. प्रवासी नेपाली मंचको सदस्य को को हुन् सक्छन?
                    </button>
                </h2>
                <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                    प्रवासी नेपाली मंचको सदस्यता प्रवासी नेपाली नागरिक, नेपालबाट उत्पत्ति भएका व्यक्ति, वा नेपाली समुदायको हितमा कार्य गर्ने व्यक्तिहरूले लिन सक्छन्। यस संस्थामा विभिन्न क्षेत्र, पेशा, र समुदायका मानिसहरू सदस्य बन्न सक्छन्, जसले नेपाली एकतालाई थप बलियो बनाउन सहयोग पुर्‍याउँछ।
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                    ४. प्रवासी नेपाली मंच (ONF) कतिवटा देशहरुमा शाखा छन्?
                    </button>
                </h2>
                <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                    प्रवासी नेपाली मंच (ONF) का शाखाहरू विभिन्न महादेशका दर्जनौं देशहरूमा रहेका छन्। मुख्यतया, यो संस्था नेपाली प्रवासीहरूको बाक्लो उपस्थिति रहेका देशहरूमा सक्रिय छ। प्रत्येक शाखाले आफ्नो क्षेत्रीय गतिविधिहरू संचालन गर्ने र मातृभूमि नेपालसँग सम्बन्धित परियोजनाहरूमा सहभागी हुने भूमिका खेल्छ। हालसम्म २२ वटा अन्तर्राष्ट्रिय विभाग, ५ महादेश कमिटी, ३७ राष्ट्रिय कमिटी, र विभिन्न देशका क्षेत्रीय तथा नगरस्तरीय कमिटीहरू सक्रिय छन्।
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading5">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse5" aria-expanded="false" aria-controls="faqCollapse5">
                    ५. नेपालबाट विदेशी मुलुकहरूमा नेपालीहरू कहिलेदेखि जान थालेका हुन्? साथै,  संयुक्त राज्य अमेरिका तथा जापान जस्ता मुलुकमा नेपालीहरूको आप्रवास कहिलेबाट सुरु भयो?
                    </button>
                </h2>
                <div id="faqCollapse5" class="accordion-collapse collapse" aria-labelledby="faqHeading5" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                    नेपालबाट विदेशी मुलुकमा अध्ययन वा रोजगारीको सिलसिलामा जाने प्रचलन धेरै पुरानो हो। प्रारम्भमा नेपालीहरू भारतमा अध्ययन र व्यवसाय गर्न जान्थे। तेस्रो मुलुकतर्फ जाने प्रचलन भने १९४० को दशकदेखि विस्तार भएको पाइन्छ।संयुक्त राज्य अमेरिकामा पहिलो पटक नेपाली आप्रवासीहरू १९४० मा पुगेका थिए भने पहिलो नेपाली स्थायी बासिन्दा १९५२ मा बनेको पाइन्छ। नेपाल सरकारले १९०२ मा ८ जना विद्यार्थीलाई खानी, इन्जिनियरिङ र कृषिको अध्ययनका लागि जापान पठाएको थियो। तिनीहरू १७ जुन १९०२ मा जापान पुगेका थिए।
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading6">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse6" aria-expanded="false" aria-controls="faqCollapse6">
                    ६. मध्यपूर्वमा नेपालीहरूको के कुन कारणले बसाइँसराइ कहिलेबाट भएको हो?
                    </button>
                </h2>
                <div id="faqCollapse6" class="accordion-collapse collapse" aria-labelledby="faqHeading6" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                    मध्यपूर्वमा पहिलो पटक नेपालीहरूको बसाइ २०औं शताब्दीको प्रारम्भमा भएको मानिन्छ। मुख्यतया ब्रिटिश औपनिवेशिक शक्तिले गोर्खा सिपाहीहरू भर्ती गरी तिनलाई मध्यपूर्व क्षेत्रमा तैनाथ गरेका थिए।
नेपालमा १९९० को दशकदेखि द्वन्द्व, रोजगारीको कमी, उद्योगहरूको पलायन र विद्युत अभावले गर्दा युवाहरू रोजगारीका लागि मध्यपूर्व र अन्य देशतर्फ जान थाले। निजी भर्ती एजेन्सीहरू र सरकारी कोटाका कारण यो प्रक्रिया सहज भएको थियो।
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading7">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse7" aria-expanded="false" aria-controls="faqCollapse7">
                    ७. नेपालीहरूले प्रवासमा सामाजिक संगठनहरू कहिलेदेखि स्थापना गर्न थाले? साथै प्रवासी नेपाली मञ्चको मुख्य उद्देश्य के हो?
                    </button>
                </h2>
                <div id="faqCollapse7" class="accordion-collapse collapse" aria-labelledby="faqHeading7" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                    नेपालीहरूले भारतबाहेक पहिलो पटक १९६६ मा भारतमा प्रवासी नेपाली संघ स्थापना गरेका थिए। त्यसपछि जापान, दक्षिण कोरिया, अमेरिका, अस्ट्रेलिया, बेलायत, बेल्जियम, मध्यपूर्व लगायतका विभिन्न देशमा संगठन स्थापना हुँदै आएको छ।  प्रवासी नेपाली मञ्चको मुख्य उद्देश्य नेपालीहरूको हकहितका लागि काम गर्नु, नेपालको कला, संस्कृति र पर्यटन प्रवर्धन गर्नु, र आवश्यकताअनुसार स्वदेश तथा विदेशमा नेपालीहरूलाई सहयोग पुर्‍याउनु हो।
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


