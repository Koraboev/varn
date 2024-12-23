@extends('layout.main')
@section('content')
@php
    $lang = \Illuminate\Support\Facades\App::getLocale();
@endphp

    <section class="page-header bg-color-1">
        <div class="container">
            <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
                <h2 >{{__('main.gallery')}}</h2>
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item "><a href="{{route('home')}}">{{__('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('main.gallery')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ================> Page header end here <================== -->
    <div class="blog padding-top padding-bottom bg-color-6 pb-0 pb-lg-4">
        <div class="container">
            <div class="blog__wrapper">
                <div class="row g-4">
                    @foreach($galleries as $gallery)

                            <div class="col-sm-6 col-lg-4">
                            <div class="blog__item" data-aos="fade-up" data-aos-duration="800" style="height: 100%;">
                                <div class="blog__item-inner" style="height: 100%; display: flex; flex-direction: column;">
                                    <div class="blog__thumb" style="flex-shrink: 0;">
                                        <a href="{{route('galleryDetail', ['lang' => app()->getLocale(), $gallery->id])}}">
                                            <img src="{{ url('/storage/' . $gallery->images[0]) }}" alt="blog Images">
                                        </a>
                                    </div>

                                    <div class="blog__content mt-10" style="flex-grow: 1;">
                                        <div class="blog__meta">
                                            <span class="blog__meta-tag blog__meta-tag--style1">{{\Carbon\Carbon::parse($gallery->created_at)->locale($lang)->format('d M Y')}}</span>
                                        </div>
                                        <h6 class="10">
                                            <a href="{{route('galleryDetail', ['lang' => app()->getLocale(), $gallery->id])}}">{{\Illuminate\Support\Str::words($gallery->title, 10, '...')}}</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                @include('front.paginate', ['items' => $galleries])
            </div>
        </div>
    </div>
@endsection
