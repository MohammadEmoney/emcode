@extends('layouts.front')

@section('content')
<!--================Hero Banner start =================-->
@component('front.components.banner')

@endcomponent
<!--================Hero Banner end =================-->

<!--================ Start Blog Post Area =================-->
<section class="section-margin--small section-margin">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 420px;"></div>
        <script>
          function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};
            var grayStyles = [
              {
                featureType: "all",
                stylers: [
                  { saturation: -90 },
                  { lightness: 50 }
                ]
              },
              {elementType: 'labels.text.fill', stylers: [{color: '#A3A3A3'}]}
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -31.197, lng: 150.744},
              zoom: 9,
              styles: grayStyles,
              scrollwheel:  false
            });
          }

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>

      </div>


      <div class="row">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Karaj, Iran</h3>
              <p>1st Square, Gohardasht</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-headphone"></i></span>
            <div class="media-body">
              <h3><a href="tel:+989354209109" dir="ltr">+98 935 420 9109</a></h3>
              <p>24/7</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="mailto:memoney026@gmail.com">memoney026@gmail.com</a></h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-9">
            @if (session('success'))
                <div class="alert alert-success mt-2" style="width: 92%">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('contact.message') }}" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                @csrf
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <input class="form-control" name="name" id="name" type="text" value="{{ old('name') }}" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="email" id="email" type="email" value="{{ old('email') }}" placeholder="Enter email address">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="subject" id="subject" type="text" value="{{ old('subject') }}" placeholder="Enter Subject">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <textarea class="form-control different-control w-100" name="body" id="message" cols="30" rows="5" placeholder="Enter Message">{{ old('body') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center text-md-right mt-3">
                    <button type="submit" class="button button--active button-contactForm">Send Message</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</section>
<!--================ End Blog Post Area =================-->

@endsection
