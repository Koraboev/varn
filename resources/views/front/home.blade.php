@extends('layout.main')
@section('content')
    @php

        $words = explode(' ', $banner->title);

        $lastWord = array_pop($words);

        $modifiedTitle = implode(' ', $words);
        $images = is_array($banner->images) ? $banner->images : json_decode($banner->images, true);
    $image1 = $images[0] ?? null;
    $image2 = $images[1] ?? null;
    $image3 = $images[2] ?? null;
    $image4 = $images[3] ?? null;



    preg_match('/(\d+)(.*)/', $about_varn->experience, $experienceMatches);
    $experienceNumber = $experienceMatches[1] ?? null;
    $experienceText = trim($experienceMatches[2]) ?? '';

     if (preg_match('/(\d+)(.*)/', $about_varn->skills, $skillMatches)) {
        $skillNumber = $skillMatches[1] ?? null;
        $skillText = trim($skillMatches[2]) ?? '';
    } else {
        $skillNumber = null;
        $skillText = '';
    }
     $category=\App\Models\Category::get()->first();
    @endphp

    <section class="banner bg--cover bg-color-3" style="background-color: rgba(255, 255, 255, 0.8); height: 90vh;">
        <section style="background-color: rgba(255, 255, 255, 0); height: 90vh;">
            <div class="container pt-5">
                <div class="banner__wrapper">
                    <div class="row gy-5 gx-4">
                        <div class="col-lg-6 col-md-6 mt-sm-3 mt-xl-5">
                            <div class="banner__content mt-lg-50 " data-aos="fade-right" data-aos-duration="1000">
                                <h1 class="banner__content-heading">{!! $modifiedTitle !!}
                                    <span style="color: var(--brand-color);">{{ $lastWord }}</span></h1>
                                <p class="banner__content-moto">{{$banner->short_content}}</p>
                                <div class="banner__content-btngroup">
                                    <a href="{{route('contact', ['lang' => app()->getLocale()])}}"
                                       class="trk-btn trk-btn--border trk-btn--primary1 trk-btn--arrow">
                                        {{__('main.contact_we')}}
                                    </a>
                                </div>
                                <div class="banner__content-social">
                                    <ul class="social">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class=" banner-images d-flex flex-column">
                                <div>
                                    @if($image1)
                                        <img loading="lazy" src="{{ asset('/storage/'.$image1) }}" alt="work 1">
                                    @endif
                                    @if($image2)
                                        <img loading="lazy" src="{{ asset('/storage/'.$image2) }}" alt="work 2">
                                    @endif
                                </div>
                                <div>
                                    @if($image3)
                                        <img loading="lazy" src="{{ asset('/storage/'.$image3) }}" alt="work 3">
                                    @endif
                                    @if($image4)
                                        <img loading="lazy" src="{{ asset('/storage/'.$image4) }}" alt="work 4">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!-- ===============>> Banner section end here <<================= -->

    <!-- ===============>> partner section start here <<================= -->
    <div class="partner partner--gradient" style="background-image:url(https://pharmi.uz/front/img/map.png)"></div>
    <!-- ===============>> partner section end here <<================= -->

    <!-- ===============>> About section start here <<================= -->
    <section class="about about--style1 bg-color-2 pb-4 pb-sm-5" style="background-image:url(https://pharmi.uz/front/img/map.png)">
        <div class="container">
            <div class="about__wrapper">
                <div class="row g-5 align-items-center mb-5">
                    <div class="col-lg-6">
                        <div class="about__thumb" data-aos="fade-right" data-aos-duration="800">
                            <div class="about__thumb-inner">
                                <div class="about__thumb-image floating-content">
                                    <img loading="lazy" class="dark" src="{{url('/storage/'.$about_varn->image)}}"
                                         alt="about-image">
                                    <div class="floating-content__top-left">
                                        <div class="floating-content__item">
                                            <h3><span class="purecounter" data-purecounter-start="0"
                                                      data-purecounter-end="28">{{$experienceNumber}}</span>
                                                {{$experienceText}}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="floating-content__bottom-right">
                                        <div class="floating-content__item">
                                            <h3 style="width: 165px;">
                                                <span class="purecounter" data-purecounter-start="0"
                                                      data-purecounter-end="100">{{$skillNumber}}</span>+
                                                {{$skillText}}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pt-4 pt-md-0">
                        <div class="about__content mt-4 mt-md-0" data-aos="fade-left" data-aos-duration="800">
                            <div class="about__content-inner column-gap-0">
                                <div class="section-header section-header--max18 mb-1">
                                    <h2 class="fs-2">{!! $about_varn->title!!}</h2>
                                </div>
                                <p class="mb-0">{!! $about_varn->description !!}</p>
                                <a href="{{route('about', ['lang' => app()->getLocale()])}}"
                                   class="trk-btn trk-btn--border trk-btn--primary1 fw-normal mb-2 mb-sm-0">{{__('main.more')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===============>> About section end here <<================= -->

    <!-- ===============>> feature section start here <<================= -->
    <section class="feature bg-color-4">
        <div class="container">
            <div class="feature__wrapper">
                <h4 class="font-montserrat">{{__('main.our_service')}}</h4>
                <div class="row g-3 align-items-center justify-content-between">
                    <div class="feature__content" data-aos="fade-right" data-aos-duration="800">
                        <div class="feature__content-inner">
                            <div class="feature__nav">
                                <div
                                    class="nav nav--feature flex-row nav-pills justify-content-lg-start justify-content-sm-center"
                                    id="feat-pills-tab" role="tablist" aria-orientation="horizontal">
                                    @foreach($services as $service)
                                        <div class="nav-link @if($loop->first) active @endif"
                                             id="feat-pills-{{$service->id}}-tab" data-bs-toggle="pill"
                                             data-bs-target="#feat-pills-{{$service->id}}" role="tab"
                                             aria-controls="feat-pills-{{$service->id}}" aria-selected="true">
                                            <div class="feature__item">
                                                <div class="feature__item-inner">
                                                    <div class="feature__item-content">
                                                        <h6>{{$service->name}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr class="hr1">
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="feature__thumb" data-aos="fade-left" data-aos-duration="800">
                            <div class="feature__thumb-inner">
                                <div class="tab-content" id="feat-pills-tabContent">
                                    @foreach($services as $service)
                                        <div class="tab-pane fade @if($loop->first) show active @endif"
                                             id="feat-pills-{{$service->id}}" role="tabpanel"
                                             aria-labelledby="feat-pills-{{$service->id}}-tab" tabindex="0">
                                            <div class="row w-100 service_box py-3 py-md-0" style="border-radius: 20px">
                                                @php
                                                    $subServiceCount = $service->subServices->count();
                                                    $halfCount = ceil($subServiceCount / 2);
                                                @endphp

                                                <ul class="px-5 my-4 col-lg-5 col-sm-12">
                                                    @foreach($service->subServices->take($halfCount) as $subservice)
                                                        <li style="font-size: 18px; color: black;">{{ $subservice->name }}</li>
                                                    @endforeach
                                                </ul>

                                                <ul class="px-5 my-4 col-lg-5 col-sm-12 ">
                                                    @foreach($service->subServices->slice($halfCount) as $subservice)
                                                        <li style="font-size: 18px; color: black;">{{ $subservice->name }}</li>
                                                    @endforeach
                                                </ul>


                                                <div class="col-lg-2 d-sm-none d-lg-block position-relative">
                                                    <div class="d-sm-none d-lg-block position-absolute"
                                                         style="height: 300px; bottom: 0; width: 95%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="service_bg service_bg-1"></div>
        <div class="service_bg service_bg-2"></div>
        <div class="container mt-0 mt-md-5 pt-50 pt-md-75">
            <a data-aos="fade-left" href="{{route('category', ['lang' => app()->getLocale(), $category->id])}}"
               class="trk-btn trk-btn--border trk-btn--primary1 fw-normal float-end">{{__('main.see_more')}}</a>
            <h3 data-aos="fade-right" class="py-1 m-0 w-50">{{__('main.news')}}</h3>
            <div class="row flex-lg-nowrap flex-sm-wrap mt-5 mx-0 mb-2">
                <div class="blog__wrapper col-12 col-lg-8 col-xl-9">
                    <div class="row news-main">
                        @foreach($posts as $index => $post)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 post_card">
                                <div class="blog__item" data-aos="fade-up" data-aos-duration="800" style="height: 100%;">
                                    <div class="blog__item-inner" style="height: 100%; display: flex; flex-direction: column;">
                                        <div class="blog__thumb" style="flex-shrink: 0;">
                                            <a href="">
                                                <img src="{{ url('/storage/'.$post->image) }}" alt="blog Images">
                                            </a>
                                        </div>
                                        @php
                                            $titleWords = explode(' ', $post->title);
                                            $shortTitle = implode(' ', array_slice($titleWords, 0, 5));

                                            $contentWords = explode(' ', $post->content);
                                            $shortContent = implode(' ', array_slice($contentWords, 0, 10));
                                        @endphp
                                        <div class="blog__content" style="flex-grow: 1;">
                                            <div class="blog__meta mt-1">
                                                <a href="{{ route('post', ['lang' => app()->getLocale(), $post->id]) }}">
                                                    <h5 class="fs-5">{{ $shortTitle }}</h5>
                                                </a>
                                                <p>{!! $shortContent !!}...</p>
                                                <div class="opacity-50 d-flex align-items-center flex-row my-2">
                                        <span>
                                            <img loading="lazy" src="/assets/images/news/calendar.webp" alt="Calendar" style="margin-top: -5px;">
                                            {{ \Carbon\Carbon::parse($post->created_at)->locale(app()->getLocale())->translatedFormat('F d, Y') }}
                                        </span>
                                                    <span class="vr"></span>
                                                    <span id="view-count">
                                            <img loading="lazy" src="/assets/images/news/eye.webp" alt="eye" style="margin-top: -4px;">
                                            <span id="count">{{ $post->view_count }}</span>
                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    @foreach($posts_also as $post)
                        <div class="ps-0 ms-0 ps-md-4 ms-md-3" data-aos="fade-up" data-aos-duration="1200">
                            <div class="opacity-50 d-flex align-items-center flex-row my-2">
                    <span>
                        <img src="/assets/images/news/calendar.webp" alt="Calendar" style="margin-top: -5px;">
                        {{ \Carbon\Carbon::parse($post->created_at)->locale(app()->getLocale())->translatedFormat('F d, Y') }}
                    </span>
                                <span class="vr mx-3"></span>
                                <span>
                        <img src="/assets/images/news/eye.webp" alt="eye" style="margin-top: -4px;">
                        {{ $post->view_count }}
                    </span>
                            </div>
                            @php
                                $titleWords = explode(' ', $post->title);
                                $shortTitle = implode(' ', array_slice($titleWords, 0, 5));
                            @endphp
                            <a href="{{ route('post', ['lang' => app()->getLocale(), $post->id]) }}">
                                <p class="w-75 font-montserrat text-dark">{{ $shortTitle }}</p>
                            </a>
                            <hr style="border-color: var(--brand-color); width: 100%">
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
        <div class="news_bg position-absolute"></div>
    </section>
    <!-- ===============>> feature section end here <<================= -->

    <!-- ===============>> partner section start here <<================= -->
    <div class="partner partner-2 partner--gradient">
    </div>
    <!-- ===============>> partner section end here <<================= -->

    <!-- ===============>> Blog section start here <<================= -->
    <section class="blog specialist-main padding-top padding-bottom bg-color-11">
        <div class="container">
            <div class="section-header d-md-flex align-items-center justify-content-between">
                <div class="section-header__content" data-aos="fade-right">
                    <h4 class="text-center text-md-start">{{__('main.specialist')}}</h4>
                </div>
                <div class="section-header__action" data-aos="fade-left">
                    <div class="swiper-nav swiper-nav--style1">
                        <button class="swiper-nav__btn prev-btn"><i class="fa-solid fa-angle-left"></i></button>
                        <button class="swiper-nav__btn active next-btn"><i
                                class="fa-solid fa-angle-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="slider-box slider-container aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">
                <div class="swiper specialist-slider">
                    <div class="slider swiper-wrapper">
                        @foreach($specialists as $specialist)
                            <div class="slide swiper-slide">
                                <img loading="lazy" src="{{url('/storage/'.$specialist->specialist_image)}}"
                                     style="width: 310px; height: 70%; object-fit: cover; object-position: top" alt="Image 1">
                                <h4>{{$specialist->specialist_name}}</h4>
                                <p>{{$specialist->specialist_job}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="blog padding-top padding-bottom bg-color-4 align-items-center d-flex position-relative testimonial">
        <div class="container">
            <div class="section-header d-md-flex align-items-center justify-content-between">
                <div class="section-header__content" data-aos="fade-right">
                    <h4 class="text-center text-md-start">{{__('main.testimonials')}}</h4>
                </div>
                <div class="section-header__action" data-aos="fade-left">
                    <div class="swiper-nav swiper-nav--style1">
                        <button class="swiper-nav__btn blog__slider-prev active">
                            <i class="fa-solid fa-angle-left"></i>
                        </button>
                        <button class="swiper-nav__btn blog__slider-next active">
                            <i class="fa-solid fa-angle-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="blog__wrapper" data-aos="fade-up" data-aos-duration="1000">
                <div class="blog__slider swiper comment-swiper">
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="blog__item blog__item--style2">
                                    <div class="blog__item-inner">
                                        <div class="blog__content">
                                            <div class="blog__writer">
                                                <div class="blog__writer-thumb">
                                                    <img loading="lazy" style="object-fit: cover"
                                                         src="{{url('/storage/'.$testimonial->image)}}"
                                                         alt="writer">
                                                </div>
                                                <div class="blog__writer-designation">
                                                    <p class="mb-0">{{$testimonial->name}}</p>
                                                    <span>{{$testimonial->job_type}}</span>
                                                </div>
                                            </div>
                                            <div class="blog__meta text-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"


                                                     fill="currentColor"
                                                     class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor"
                                                     class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor"
                                                     class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor"
                                                     class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor"
                                                     class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                            </div>
                                            <h5 class="10">{{$testimonial->title}}</h5>
                                            <p class="mb-15">{{$testimonial->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="service_bg service_bg-1 cta-1"></div>
        <div class="service_bg service_bg-2 cta-2"></div>
    </section>

@endsection
