<section class="social-email">
    <div class="container">
        <div class="col social">
            <div class="background-title">Instagram</div>
            <div class="instagram-card">
                <img src="@asset('images/collage.png')" />
                <div class="follow-us">
                    <i class="mdi mdi-instagram"></i>
                    <div>Follow us</div>
                    <a href="#">@surfersco</a>
                </div>
            </div>
        </div>
        @php($active_plugins = get_option('active_plugins'))
        @if(in_array('gravityforms/gravityforms.php', $active_plugins))
            <div class="col email-form">
                {!! do_shortcode('[gravityform id="1" title="true"]') !!}
            </div>
        @else
            <div class="col form-wrapper">
                <form class="custom-form">
                    <div class="row">
                        <input type="text" class="col" placeholder="First name" required/>
                        <input type="text" class="col" placeholder="Last name" required />
                    </div>
                    <input type="email" class="mb-3" placeholder="E-mail" required />
                    <div class="row">
                        <input type="text" class="col" placeholder="Birth Place" />
                        <input type="date" class="col" placeholder="Birth Date" placeholder="/"/>
                    </div>
                    <div class="row">
                        <input type="tel" class="col" placeholder="Phone" />
                        <input type="text" class="col" placeholder="Company" />
                    </div>
                    <textarea rows="5" label="Your Message" placeholder="Your Message"></textarea>
                    <div class="checkbox-label">
                        <input type="checkbox" id="privacy-policy" name="privacy-policy"/>
                        <label for="privacy-policy">Accept the privacy policy</label>
                    </div>
                    <button type="submit" color="#00b0ff" class="button-submit">Submit</button>
                </form>
            </div>
        @endif
    </div>
</section>