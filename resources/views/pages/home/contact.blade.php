@extends('layouts.main')

@section('main')
<div id="contact-section" class="py-5 mt-5 bg-gray">
    <div class="container">
        <div class="section-title mt-3 fw-semi">
            <div>
                <h1>Contact Us</h1>
            </div>
            <p>We Always Looking Forward Your Suggestion. Thank You!</p>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <form>
                    <div class="form-group mb-4">
                        <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Your Name">
                    </div>
                    <div class="form-group mb-4">
                        <input type="email" class="form-control form-control-lg" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group mb-4">
                        <input type="text" name="subject" id="subject" class="form-control form-control-lg" placeholder="Subject">
                    </div>
                    <div class="form-group mb-4">
                        <textarea class="form-control form-control-lg" name="message" id="message" rows="3" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="mt-4 btn-block custom-btn">Send</button>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="embed-responsive" style="height: 400px;">
                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.409065015922!2d96.13317361435068!3d16.855647188399352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb5a634a7f33%3A0x4fa272a704e38513!2sUniversity+of+Information+Technology+-+UIT!5e0!3m2!1sen!2smm!4v1535598823596" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
