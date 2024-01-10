@extends('front.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="preloader">
        <div class="loading"><span></span><span></span><span></span><span></span></div>
        </div>
        <section class="contact-layout2 ">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contact-panel d-flex flex-wrap">
                            @include('auth.forms.register')
                            <div
                            class="contact-panel__info d-flex flex-column justify-content-between bg-overlay bg-overlay-primary-gradient" style="padding-left: 40px;padding-right: 40px">
                            <div class="bg-img"><img src="{{ asset('css/images/banners/1.jpg') }}" alt="banner"></div>
                            <div>
                                <h4 class="contact-panel__title color-white">{{ __("Quick Contacts") }}</h4>
                                <p class="contact-panel__desc font-weight-bold color-white mb-30">
                                    {{ __("If you have any questions or need help, feel free to contact with our team.") }}
                                </p>
                            </div>
                            <div>
                                <ul class="contact__list list-unstyled mb-30">
                                    <li>
                                        <i class="icon-phone"></i><a href="tel:+{{ __(002) }}{{ $setting['site_phone'] ?? '' }}">{{ __("Emergency Line:") }}{{ __(002) }}{{ $setting['site_phone'] ?? '' }}</a>
                                    </li>
                                    <li>
                                        <i class="icon-location"></i><a>{{ __("Location:") }} {{ $setting['site_address'] ?? '' }}</a>
                                    </li>
                                    <li>
                                        <i class="icon-clock"></i><a>{{ $setting['site_work_time'] ?? '' }}</a>
                                    </li>
                                </ul>
                                {{--  <a href="#" class="btn btn__white btn__rounded btn__outlined">Contact Us</a>  --}}
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
