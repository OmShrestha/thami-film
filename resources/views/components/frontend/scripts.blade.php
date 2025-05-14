<script src="{{ asset('assets/frontend/js/vendor/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/jquery-migrate-3.0.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/wow.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/jquery.fancybox.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/lity.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/swiper8-bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/jquery.counterup.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/parallaxie.js') }}"></script>

<script src="{{ asset('assets/frontend/js/gsap_lib/gsap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/gsap_lib/ScrollSmoother.min.js') }}"></script>
<!-- <script src="{{ asset('assets/frontend/js/gsap_lib/ScrollTrigger.min.js') }}"></script> -->
<script src="{{ asset('assets/frontend/js/gsap_lib/SplitText.min.js') }}"></script>

{{--@vite('resources/js/frontend/app.js', 'resources/js/frontend/common.js')--}}
<script src="{{ Vite::asset('resources/js/frontend/app.js') }}"></script>
<script src="{{ Vite::asset('resources/js/frontend/common.js') }}"></script>

<script src="{{ asset('assets/frontend/js/hscroll.js')}}"></script>
<script>

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('#subscribeForm, #footerSubscribeForm').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);
                const actionUrl = this.getAttribute('action');
                const method = this.getAttribute('method');

                fetch(actionUrl, {
                    method: method,
                    body: formData,
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.errors) {
                            this.querySelector(".err-email").innerHTML = data.errors.email[0];
                        } else {
                            this.querySelector(".success-email").innerHTML = 'Thank you for subscribing!';
                            this.reset(); // Reset form fields
                            this.querySelector(".err-email").innerHTML = '';
                        }
                    })
                    .catch(error => console.error('Error:', error));
                setTimeout(() => {
                    this.querySelector(".success-email").innerHTML = ''
                }, 7000);
                setTimeout(() => {
                    this.querySelector(".err-email").innerHTML = ''
                }, 7000);
            });
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('contact-form');
        if (!form) return;
        form.addEventListener('submit', function () {
            document.getElementById('submit').innerHTML = '<i class="fa fa-circle-o-notch fa-spin fa-spin mr-10"></i> Processing...';
            document.getElementById('submit').setAttribute('disabled', 'disabled');
        })
    });


    @if(request()->path() == '/')
        const dialogues = [
            '{{ asset('assets/frontend/dialogues/buckshot-what.mp3') }}',
            '{{ asset('assets/frontend/dialogues/buckshot-tickled.mp3') }}',
            '{{ asset('assets/frontend/dialogues/buckshot-buck.mp3') }}',
            '{{ asset('assets/frontend/dialogues/buckshot-click.mp3') }}',
            '{{ asset('assets/frontend/dialogues/buckshot-mmm.mp3') }}',
            '{{ asset('assets/frontend/dialogues/buckshot-pick.mp3') }}',
            '{{ asset('assets/frontend/dialogues/buckshot-reading.mp3') }}',
            '{{ asset('assets/frontend/dialogues/buckshot-spicy.mp3') }}',
            // Add more dialogues as needed
        ];

        let currentDialogueIndex = 0;

        // const womMascot = document.getElementById('wom-mascot');
        //use class instead of id
        const womMascot = document.querySelector('.wom-mascot');
        const audioPlayer = new Audio();

        womMascot.addEventListener('click', () => {
            currentDialogueIndex = Math.floor(Math.random() * dialogues.length);
            if (audioPlayer.src !== window.location.origin + '/' + dialogues[currentDialogueIndex]) {
                audioPlayer.src = dialogues[currentDialogueIndex];
            }
            audioPlayer.play().catch(error => console.error("Error playing the audio:", error));
            currentDialogueIndex = (currentDialogueIndex + 1) % dialogues.length;
        });

        audioPlayer.addEventListener('ended', () => {
            audioPlayer.src = dialogues[currentDialogueIndex];
        });
    @endif
</script>

