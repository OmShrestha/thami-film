$(function () {
    var width = $(window).width();
    if (width > 991) {

        /* ===============================  scroll  =============================== */

        gsap.registerPlugin(ScrollTrigger);

        let sections = gsap.utils.toArray(".panel");

        gsap.to(sections, {
            xPercent: -100 * (sections.length - 1),
            ease: "none",
            scrollTrigger: {
                trigger: ".thecontainer",
                pin: true,
                scrub: 1,
                // snap: 1 / (sections.length - 1),
                end: () => "+=" + document.querySelector(".thecontainer").offsetWidth
            }
        });

    }
});

gsap.registerPlugin(SplitText);

var $quote = $("#quote"),
    mySplitText = new SplitText($quote, {type: "words"}),
    splitTextTimeline = gsap.timeline();

gsap.set($quote, {perspective: 400});
//an array of all the divs that wrap each character
mySplitText.split({type: "chars, words, lines"})
splitTextTimeline.from(mySplitText.chars, {duration: 0.2, autoAlpha: 0, scale: 4, force3D: true, stagger: 0.01}, 0.7)
    .to(mySplitText.words, {duration: 0.1, color: "#921f34", scale: 0.9, stagger: 0.1}, "words")
    .to(mySplitText.words, {duration: 0.1, color: "#000", scale: 1, stagger: 0.1}, "words+=0.1")

//splittext typewriter effect for #about-quote text
var $aboutQuote = $("#about-quote"),
    aboutSplitText = new SplitText($aboutQuote, {type: "words"}),
    aboutSplitTextTimeline = gsap.timeline();

gsap.set($aboutQuote, {perspective: 400});
aboutSplitText.split({type: "chars, words, lines"})
aboutSplitTextTimeline.from(aboutSplitText.chars, {duration: 0.2, autoAlpha: 0, scale: 4, force3D: true, stagger: 0.01}, 0.7)
    .to(aboutSplitText.words, {duration: 0.1, color: "#921f34", scale: 0.9, stagger: 0.1}, "words")
    .to(aboutSplitText.words, {duration: 0.3, color: "#000", scale: 1, stagger: 0.2}, "words+=0.1")

