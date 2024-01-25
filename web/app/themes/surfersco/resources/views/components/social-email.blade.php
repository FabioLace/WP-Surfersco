<section class="social-email">
    <div class="container">
        <div class="social">
            <div class="background-title">Instagram</h1>
            <div class="instagram-card">
                <img src="../../images/collage.png" />
                <div class="follow-us">
                    <div class="follow-container">
                        <i class="mdi-instagram" />
                        <div>Follow us</div>
                        <a href="#">{!! @surfersco !!}</a>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" color="#00b0ff" class="mx-auto w-70 text-white fw-bold">Contact us</v-btn>
        <div class="email-form">
            <form>
            {{--FIRST NAME
                LAST NAME
                EMAIL
                BIRTH PLACE/DATE
                PHONE
                COMPANY
                YOUR MESSAGE
                ACCEPT PRIVACY POLICY
                BTN SUBMIT
                --}}
                <button type="submit" color="#00b0ff" class="mx-auto text-white fw-bold" :disabled="!agree">Submit</v-btn>
            </form>
        </div>
    </div>
</section>