@php
    $lang = \Illuminate\Support\Facades\App::getLocale();
    $contact=\App\Models\Contact::latest()->first();
    $servicesMenu=\App\Models\Service::all();
    $categories=\App\Models\Category::all();
    $information=\App\Models\Information::all();
@endphp
    <!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <title>Audit varn</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/css/filament/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/aos.css">
    <link rel="stylesheet" href="/assets/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/lightcase.css">
    <link rel="stylesheet" href="/assets/css/swiper-bundle.min.css">
    <!-- Magnific Popup CSS -->
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.css"/>

    <!-- main css for template -->
    <link rel="stylesheet" href="/assets/css/style.css?v=12.0.0">
</head>

<body>

<!-- ===============>> Preloader start here <<================= -->
<div class="preloader">
    <img loading="lazy" src="/assets/images/logo/logo.svg" alt="preloader icon">
</div>
<!-- ===============>> Preloader end here <<================= -->

<!-- ===============>> Header section start here <<================= -->
<header>
    <nav class="navbar navbar-expand-lg nav-h">
        <div class="container d-flex justify-content-between align-items-center p-0">
            <div class="d-flex align-items-center">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 0 142.447 142.447" xml:space="preserve">
            <g>
                <path d="M71.224,0C31.951,0,0,31.951,0,71.224s31.951,71.224,71.224,71.224s71.224-31.951,71.224-71.224
                            S110.496,0,71.224,0z M71.224,127.447C40.222,127.447,15,102.226,15,71.224S40.222,15,71.224,15s56.224,25.222,56.224,56.224
                            S102.226,127.447,71.224,127.447z"/>
                <path d="M100.923,72.016H71.724V46.724c0-4.143-3.357-7.5-7.5-7.5s-7.5,3.357-7.5,7.5v32.792
                        c0,4.143,3.357,7.5,7.5,7.5h36.699c4.143,0,7.5-3.357,7.5-7.5S105.065,72.016,100.923,72.016z"/>
            </g>
          </svg>
                <p>{{$contact->work_time}}</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-telephone" viewBox="0 0 16 16">
                    <path
                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                </svg>
                <p>
                    <a href="tel:{{$contact->phone1}}">{{$contact->phone1}}</a>
                    <a href="tel:{{$contact->phone2}}" class="ms-2">{{$contact->phone2}}</a>
                </p>
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17 21.25H7C3.35 21.25 1.25 19.15 1.25 15.5V8.50003C1.25 4.85003 3.35 2.75003 7 2.75003H17C20.65 2.75003 22.75 4.85003 22.75 8.50003V15.5C22.75 19.15 20.65 21.25 17 21.25ZM7 4.25003C4.14 4.25003 2.75 5.64003 2.75 8.50003V15.5C2.75 18.36 4.14 19.75 7 19.75H17C19.86 19.75 21.25 18.36 21.25 15.5V8.50003C21.25 5.64003 19.86 4.25003 17 4.25003H7Z"
                        fill="#A60064"/>
                    <path
                        d="M11.9998 12.87C11.1598 12.87 10.3098 12.61 9.65978 12.08L6.52978 9.57997C6.20978 9.31997 6.14978 8.84997 6.40978 8.52997C6.66978 8.20997 7.13978 8.14997 7.45978 8.40997L10.5898 10.91C11.3498 11.52 12.6398 11.52 13.3998 10.91L16.5298 8.40997C16.8498 8.14997 17.3298 8.19997 17.5798 8.52997C17.8398 8.84997 17.7898 9.32997 17.4598 9.57997L14.3298 12.08C13.6898 12.61 12.8398 12.87 11.9998 12.87Z"
                        fill="#A60064"/>
                </svg>
                <p>
                    <a href="mailto:{{$contact->email1}}">{{$contact->email1}}</a>
                    <a href="mailto:{{$contact->email2}}">{{$contact->email2}}</a>
                </p>
            </div>
            <div class="d-flex align-items-center">
                <div class="dropdown" style="display: flex">
                    <a class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" >
                        @if( ($lang)=='ru')
                             Русский
                        @else
                            English
                        @endif
                    </a>
                    <ul class="dropdown-menu custom-dropdown" aria-labelledby="dropdownMenuButton">
                        <li>
                            <a href="/ru" class="dropdown-item" type="button">
                                 Русский
                            </a>
                        </li>
                        <li>
                            <a href="/en" class="dropdown-item" type="button">
                                 English
                            </a>
                        </li>
                    </ul>
                </div>




                <div class="lightdark-switch ms-3 d-none">
                   <span class="dark-btn p-0 border-0" id="btnSwitch"
                         style="width: 33px; height: 33px;">
                       <img loading="lazy" src="/assets/images/icon/moon.svg"
                            alt="lightdark-switch" class="swtich-icon">
                   </span>
                </div>
            </div>
        </div>
    </nav>
</header>
<header class="header-section bg-color-3" style="background-color: rgba(255, 255, 255, 0.8);">
    <div class="header-bottom">
        <div class="container border-top">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="{{route('home', ['lang' => app()->getLocale()])}}">
                        <img loading="lazy" class="dark" src="/assets/images/logo/logo.svg" alt="logo">
                    </a>
                </div>
                <div class="menu-area">
                    <ul class="menu menu--style1">
                        <li>
                            <a href="{{route('home', ['lang' => app()->getLocale()])}}"> {{__('main.home')}} </a>
                        </li>
                        <li>
                            <a href="#">{{__('main.about')}}</a>
                            <ul class="submenu">
                                <li>
                                    <a href="{{route('about', ['lang' => app()->getLocale()])}}">{{__('main.about_company')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('specialist', ['lang' => app()->getLocale()])}}">{{__('main.specialist')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('partnership', ['lang' => app()->getLocale()])}}">{{__('main.partnership')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('gallery', ['lang' => app()->getLocale()])}}">{{__('main.gallery')}}</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">{{__('main.service')}}</a>
                            <ul class="submenu">
                                @foreach($servicesMenu as $service)
                                    <li>
                                        <a href="{{route('service', ['lang' => app()->getLocale(), $service->slug])}}">{{$service->name}}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>
                        @if($lang=='ru')
                            <li>
                                <a href="#">{{__('main.client_all')}}</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{route('client', ['lang' => app()->getLocale()])}}">{{__('main.client')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('conclusion', ['lang' => app()->getLocale()])}}">{{__('main.conclusions')}}</a>
                                    </li>
                                    @if($information->count()>0)
                                        <li>
                                            <a href="{{route('information', ['lang' => app()->getLocale()])}}">{{__('main.information')}}</a>
                                        </li>
                                    @endif

                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="#">{{__('main.client_all')}}</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{route('client', ['lang' => app()->getLocale()])}}">{{__('main.client')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('conclusion', ['lang' => app()->getLocale()])}}">{{__('main.conclusions')}}</a>
                                    </li>
                                    @if($information->count()>0)
                                        <li>
                                            <a href="{{route('information', ['lang' => app()->getLocale()])}}">{{__('main.information')}}</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>

                        @endif
                        <li>
                            <a href="#">{{__('main.news')}}</a>
                            <ul class="submenu">
                                @foreach($categories as $category)
                                    @if($category->posts->count() > 0)
                                        <li>
                                            <a href="{{route('category', ['lang' => app()->getLocale(), $category->id])}}">{{$category->name}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('contact', ['lang' => app()->getLocale()])}}">{{__('main.contact')}}</a>
                        </li>
                    </ul>

                </div>
                <div class="header-action">
                    <div class="menu-area">
                        <div class="header-btn">
                            <a href="{{route('contact', ['lang' => app()->getLocale()])}}"
                               class="trk-btn trk-btn--border trk-btn--primary1">
                                <span style="font-weight: 500;">{{__('main.contact_we')}}</span>
                            </a>
                        </div>

                        <!-- toggle icons -->
                        <div class="header-bar d-lg-none header-bar--style1">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@yield('content')

<footer class="footer brand-1" style="background-image:url(https://pharmi.uz/front/img/map.png)">
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__top footer__top--style1">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-4 col-md-5">
                        <div class="footer__about">
                            <a href="{{route('home', ['lang' => app()->getLocale()])}}" class="footer__about-logo">
                                <img loading="lazy"
                                     src="/assets/images/logo/logo2.svg"
                                     alt="Logo"></a>
                            <div class="mt-2">
                                <ul class="social">
                                    <li class="social__item">
                                        <a href="{{$contact->facebook}}" class="social__link social__link--style2"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="social__item">
                                        <a href="{{$contact->instagram}}" class="social__link social__link--style2"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="social__item">
                                        <a href="{{$contact->linkedin}}" class="social__link social__link--style2"><i
                                                class="fa-brands fa-linkedin-in"></i></a>
                                    </li>
                                    <li class="social__item">
                                        <a href="{{$contact->youtube}}" class="social__link social__link--style2"><i
                                                class="fab fa-youtube"></i></a>
                                    </li>
                                    <li class="social__item">
                                        <a href="{{$contact->telegram}}"
                                           class="social__link social__link--style2 d-sm-none d-md-block"><i
                                                class="fab fa-telegram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-12">
                        <div class="footer__links">
                            <div class="footer__links-tittle">
                                <h6 style="font-size: 22px; font-weight: 500;"
                                    class="font-montserrat">{{__('main.menu')}}</h6>
                            </div>
                            <div class="footer__links-content">
                                <ul class="footer__linklist">
                                    <li class="footer__linklist-item"><a
                                            href="{{route('about', ['lang' => app()->getLocale()])}}">{{__('main.about')}}</a>
                                    </li>
                                    <li class="footer__linklist-item"><a
                                            href="{{route('service.footer', ['lang' => app()->getLocale()])}}">{{__('main.service')}}</a>
                                    </li>
                                    <li class="footer__linklist-item"><a
                                            href="{{route('client', ['lang' => app()->getLocale()])}}">{{__('main.client')}}</a>
                                    </li>
                                    <li class="footer__linklist-item"><a
                                            href="{{route('contact', ['lang' => app()->getLocale()])}}">{{__('main.contact')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-sm-8 col-12">
                        <div class="footer__links">
                            <div class="footer__links-tittle">
                                <h6 style="font-size: 22px; font-weight: 500;"
                                    class="font-montserrat">{{__('main.contact_information')}}</h6>
                            </div>
                            <div class="row contact-info">
                                <div class="col-4">
                                    <p>{{__('main.phone')}}:</p>
                                    <div class="d-flex flex-row align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-telephone"
                                             viewBox="0 0 16 16">
                                            <path
                                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                        </svg>
                                        <div>
                                            <a href="tel:{{$contact->phone1}}">{{$contact->phone1}}</a>
                                            <a href="tel:{{$contact->phone}}">{{$contact->phone2}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <p>{{__('main.email')}}:</p>
                                    <div class="d-flex flex-row align-items-center">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17 21.25H7C3.35 21.25 1.25 19.15 1.25 15.5V8.50003C1.25 4.85003 3.35 2.75003 7 2.75003H17C20.65 2.75003 22.75 4.85003 22.75 8.50003V15.5C22.75 19.15 20.65 21.25 17 21.25ZM7 4.25003C4.14 4.25003 2.75 5.64003 2.75 8.50003V15.5C2.75 18.36 4.14 19.75 7 19.75H17C19.86 19.75 21.25 18.36 21.25 15.5V8.50003C21.25 5.64003 19.86 4.25003 17 4.25003H7Z"
                                                fill="#A60064"/>
                                            <path
                                                d="M11.9998 12.87C11.1598 12.87 10.3098 12.61 9.65978 12.08L6.52978 9.57997C6.20978 9.31997 6.14978 8.84997 6.40978 8.52997C6.66978 8.20997 7.13978 8.14997 7.45978 8.40997L10.5898 10.91C11.3498 11.52 12.6398 11.52 13.3998 10.91L16.5298 8.40997C16.8498 8.14997 17.3298 8.19997 17.5798 8.52997C17.8398 8.84997 17.7898 9.32997 17.4598 9.57997L14.3298 12.08C13.6898 12.61 12.8398 12.87 11.9998 12.87Z"
                                                fill="#A60064"/>
                                        </svg>
                                        <div>
                                            <a href="mailto:{{$contact->email1}}">{{$contact->email1}}</a>
                                            <a href="mailto:{{$contact->email2}}">{{$contact->email2}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <p>{{__('main.address')}}:</p>
                                    <div class="d-flex flex-row align-items-center">
                                        <i class="fas fa-map-marker-alt" style="color: var(--brand-color)"></i>

                                        <div>
                                            <a class="ms-2" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($contact->address) }}"
                                               target="_blank">{{$contact->address}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="footer__end">
                    <div class="footer__end-copyright">
                        <p class=" mb-0">Copyright© 2024 VARN | {{__('main.copyright')}}</p>
                    </div>
                    <div>
                        <ul class="footer-menu wow fadeInRight" data-wow-delay=".4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInRight;">
                            {{__('main.site_creator')}}- <a href="https://oqila.uz"><img loading="lazy"
                                                                                         src="/footer-logo.png"
                                                                                         width="66"></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- ===============>> footer end here <<================= -->

<!-- ===============>> scrollToTop start here <<================= -->
<a href="#" class="scrollToTop scrollToTop--home1">
    <svg class="svg-inline--fa fa-arrow-up-from-bracket" aria-hidden="true" focusable="false" data-prefix="fas"
         data-icon="arrow-up-from-bracket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
         data-fa-i2svg="">
        <path fill="currentColor"
              d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3V320c0 17.7 14.3 32 32 32s32-14.3 32-32V109.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 53 43 96 96 96H352c53 0 96-43 96-96V352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V352z"></path>
    </svg><!-- <i class="fa-solid fa-arrow-up-from-bracket"></i> Font Awesome fontawesome.com -->
</a>
<!-- ===============>> scrollToTop ending here <<================= -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.umd.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        freeMode: true,
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            576: {
                slidesPerView: 3,
            },
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });


</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



<!-- vendor plugins -->
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/all.min.js"></script>
<script src="/assets/js/swiper-bundle.min.js"></script>
<script src="/assets/js/aos.js"></script>
<script src="/assets/js/fslightbox.js"></script>
<script src="/assets/js/purecounter_vanilla.js"></script>

<!-- jQuery -->

<!-- jQuery kutubxonasi -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Magnific Popup JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

<script src="/assets/js/custom.js"></script>
</body>

</html>
