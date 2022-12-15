@extends('frontend.layouts.app')
@section('content')
<section class="contact">
        <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.817046772!2d96.18567781544888!3d16.78577548844166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ece4e7678821%3A0x21f3b455f173820c!2sYadanar%20Thiri%20St%2C%20Yangon!5e0!3m2!1sen!2smm!4v1666274350200!5m2!1sen!2smm"
                        width="100%" height="250" style="border: 0" allowfullscreen="true" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="address">
                <div class="container">
                        <div class="row address-first-part">
                                <div class="col-12">
                                        <h6 class="text-uppercase">Send Us A Mail</h6>
                                        <form action="/contact" method="POST">
                                                @csrf
                                                <div class="row">
                                                        <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                        <input type="text" class="form-control "
                                                                                placeholder="Your First Name"
                                                                                name="fname" value="{{ old('fname') }}"
                                                                                required autofocus />
                                                                        @error('fname')
                                                                        <small class="text-danger">{{ $message
                                                                                }}</small>
                                                                        @enderror
                                                                </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                                placeholder="Your Last Name"
                                                                                name="lname" value="{{ old('lname') }}"
                                                                                required />
                                                                        @error('lname')
                                                                        <small class="text-danger">{{ $message
                                                                                }}</small>
                                                                        @enderror
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                        <input type="email" class="form-control "
                                                                                placeholder="Your Email Address"
                                                                                name="email" value="{{ old('email') }}"
                                                                                required />
                                                                        @error('email')
                                                                        <small class="text-danger">{{ $message
                                                                                }}</small>
                                                                        @enderror
                                                                </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                        <input type="number" class="form-control"
                                                                                placeholder="Your Phone Number"
                                                                                name="phone" required
                                                                                value="{{ old('phone') }}" />
                                                                        @error('phone')
                                                                        <small class="text-danger">{{ $message
                                                                                }}</small>
                                                                        @enderror
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-12 col-md-12">
                                                                <div class="form-group">
                                                                        <textarea name="message" id="" cols="30"
                                                                                rows="3" class="form-control"
                                                                                placeholder="Say Something....">{{ old('message') }}</textarea>
                                                                        @error('message')
                                                                        <small class="text-danger">{{ $message
                                                                                }}</small>
                                                                        @enderror
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="d-flex justify-content-center justify-content-md-end">
                                                        <button type="submit" class="btn btn-theme">Submit</button>
                                                </div>
                                        </form>
                                </div>
                        </div>
                        <div class="row address-second-part">
                                <div class="col-12 col-md-6 col-lg-3" style="padding: 5px">
                                        <div class="contact-feature">
                                                <div class="contact-img">
                                                        <img src="{{ asset('/frontend/images/iphone.png') }}" alt=""
                                                                class="mr-1" />
                                                </div>
                                                <div class="contact-item">
                                                        <p class="font-weight-bold">
                                                                Phone: <span class="ml-1">+959 69 496 4472</span>
                                                        </p>
                                                        <p class="text-black-50">
                                                                Email: <span class="ml-1">lwinkoko0271@gmail.com</span>
                                                        </p>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3" style="padding: 5px">
                                        <div class="contact-feature">
                                                <div class="contact-img">
                                                        <img src="{{ asset('/frontend/images/chat.png') }}" alt=""
                                                                class="mb-0 mr-2" />
                                                </div>
                                                <div class="contact-item">
                                                        <p class="font-weight-bold">
                                                                Support <span class="ml-1">24 x 7</span>
                                                        </p>
                                                        <p class="text-black-50">We are always online</p>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3" style="padding: 5px">
                                        <div class="contact-feature">
                                                <div class="contact-img">
                                                        <img src="{{ asset('/frontend/images/calendar.png') }}" alt=""
                                                                style="width: 40px" class="mr-2" />
                                                </div>
                                                <div class="contact-item">
                                                        <p class="font-weight-bold">Shop opening timing</p>
                                                        <p class="text-black-50">9am - 6pm</p>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3" style="padding: 5px">
                                        <div class="contact-feature">
                                                <div class="contact-img">
                                                        <img src="{{ asset('/frontend/images/location.png') }}" alt=""
                                                                class="mr-1" />
                                                </div>
                                                <div class="contact-item">
                                                        <p class="font-weight-bold">Yadanar Thiri St,</p>
                                                        <p class="text-black-50">Dawbone, No.271 , 2B</p>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</section>
@endsection