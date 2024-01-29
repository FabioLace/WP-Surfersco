<section class="social-email">
    <div class="container">
        <div class="social">
            <div class="background-title">Instagram</h1>
            <div class="instagram-card">
                <img src="@asset('images/collage.png')" />
                <div class="follow-us">
                    <div class="follow-container">
                        <i class="mdi-instagram" />
                        <div>Follow us</div>
                        <a href="#">{!! @surfersco !!}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="email-form">
            @php
                try {
                    //syntax error, unexpected identifier "id", expecting "]"
                    do_shortcode([gravityform id="1" title="true"]);
                } catch (Exception $err) {
                    echo $err->getMessage();
                }
            @endphp
        </div>
    </div>
</section>