@extends('layout.main')
@section('content')


    <section class="page-header bg-color-1">
        <div class="container">
            <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
                <h2 >{{__('main.contact')}}</h2>
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item "><a href="{{route('home')}}">{{__('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('main.contact')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="contact padding-top padding-bottom mb-25">
        <div class="container">
            <div class="contact__wrapper">
                <div class="row g-5">
                    <div class="col-md-5" >
                        <div class="contact-content">
                           {!! $contact->text !!}
                        </div>
                        <!-- /.contact-content -->
                        <div class="lets-contact">
                            <ul class="contact-list">
                                <li>
                                    <a href="#"><i class="fa fa-home"></i>     {{$contact->address}}</a>
                                </li>
                                <li>
                                    <a href="mailto:{{$contact->email1}}"><i class="fa fa-envelope"></i>   {{$contact->email1}}</a>,
                                    <a href="mailto:{{$contact->email2}}">   {{$contact->email2}}</a>
                                </li>
                                <li>
                                    <a href="tel:{{$contact->phone1}}"><i class="fa fa-phone"></i>    {{$contact->phone1}}</a>,
                                    <a href="tel:{{$contact->phone2}}">  {{$contact->phone2}}</a>
                                </li>
                            </ul>
                            <!-- /.contact-list -->
                            <ul class="social mt-3 mt-md-40">
                                <li class="social__item">
                                    <a href="{{$contact->facebook}}"
                                       class="social__link social__link--style1"><i
                                            class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="social__item">
                                    <a href="{{$contact->linkedin}}"
                                       class="social__link social__link--style1"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li class="social__item">
                                    <a href="{{$contact->instagram}}" class="social__link social__link--style1"><i
                                            class="fab fa-instagram"></i></a>
                                </li>
                                <li class="social__item">
                                    <a href="{{$contact->youtube}}" class="social__link social__link--style1"><i
                                            class="fab fa-youtube"></i></a>
                                </li>
                                <li class="social__item">
                                    <a href="{{$contact->telegram}}"
                                       class="social__link social__link--style1"><i class="fab fa-telegram"></i></a>
                                </li>
                            </ul>
                            <!-- /.contact-social -->
                        </div>
                        <!-- /.lets-contact -->
                    </div>
                    <div class="col-md-7 pt-3 mt-0 mt-md-4">
                        <div class="contact__form">
                            <form action="{{route('form.submit', ['lang' => app()->getLocale()])}}" method="POST" data-aos="fade-left" data-aos-duration="1000">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div>
                                            <label for="name" class="form-label">{{__('main.name')}}</label>
                                            <input class="form-control" name="name" type="text" id="name" placeholder="{{__('main.name')}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div>
                                            <label for="email" class="form-label">{{__('main.email')}}</label>
                                            <input class="form-control" name="email" type="email" id="email" placeholder="{{__('main.email')}}">
                                        </div>
                                    </div>
                                  <div class="col-12">
                                        <div>
                                            <label for="phone" class="form-label">{{__('main.phone')}}</label>
                                            <input class="form-control" name="phone" type="text" id="phone" placeholder="{{__('main.phone')}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div>
                                            <label for="textarea" class="form-label">{{__('main.textarea')}}</label>
                                            <textarea cols="30" name="message" rows="5" class="form-control" id="textarea"
                                                      placeholder="{{__('main.textarea')}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="trk-btn trk-btn--border trk-btn--primary1 mt-4 d-block">{{__('main.submit')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2995.586194784939!2d69.210621!3d41.281773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8a397ae4bf81%3A0x976e9fe713b14354!2sBunyodkor+Avenue+42%2C+100097%2C+Tashkent%2C+Uzbekistan!5e0!3m2!1sen!2sus!4v1696426159401!5m2!1sen!2sus" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
@endsection
