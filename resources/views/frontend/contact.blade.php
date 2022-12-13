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
                                        <form>
                                                <div class="row">
                                                        <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                                placeholder="Your First Name" />
                                                                </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                                placeholder="Your Last Name" />
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                        <input type="email" class="form-control"
                                                                                placeholder="Your Email Address" />
                                                                </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                        <input type="number" class="form-control"
                                                                                placeholder="Your Phone Number" />
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-12 col-md-12">
                                                                <div class="form-group">
                                                                        <textarea name="message" id="" cols="30"
                                                                                rows="3" class="form-control"
                                                                                placeholder="Say Something...."></textarea>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="d-flex justify-content-center justify-content-md-end">
                                                        <button type="submit" class="btn btn-warning">Submit</button>
                                                </div>
                                        </form>
                                </div>
                        </div>
                        <div class="row address-second-part">
                                <div class="col-12 col-md-6 col-lg-3" style="padding: 5px">
                                        <div class="contact-feature">
                                                <div class="contact-img">
                                                        <img src="images/iphone.png" alt="" class="mr-1" />
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
                                                        <img src="images/chat.png" alt="" class="mb-0 mr-2" />
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
                                                        <img src="images/calendar.png" alt="" style="width: 40px"
                                                                class="mr-2" />
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
                                                        <img src="images/location.png" alt="" class="mr-1" />
                                                </div>
                                                <div class="contact-item">
                                                        <p class="font-weight-bold">3548 Columbia Mine Road,</p>
                                                        <p class="text-black-50">Wheeling, West Virginia, 26003</p>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</section>
@endsection