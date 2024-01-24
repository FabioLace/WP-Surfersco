<section class="about-us">
    <h1 class="mx-auto">About us</h1>
    <div class="about-us-container">
        <div class="about">
            <img class="surfer" src="../../images/surfer.jpg" alt="surfer" />
            <div class="text">
                <div class="h2-text">
                    <h2> {{-- TITLE --}}</h2>
                    <i class="mdi-close mx-auto" />
                    <div>
                        {{-- TEXT --}}
                    </div>
                    <a href="#">Read more</a>
                </div>
            </div>
            {{-- IF !empty($video) --}}
                <video src="{{ $video }}" class="about-video" autoplay loop muted />
            {{-- END IF --}}
        </div>
    </div>
</section>