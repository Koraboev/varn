@extends('layout.main')
@section('content')
    <section class="page-header bg-color-1">
        <div class="container">
            <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
                <h2>{{$category->name}}</h2>
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item "><a href="{{route('home')}}">{{__('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <div class="container mt-5 pt-0 mt-md-5 pt-md-75">
{{--        <div class="row flex-lg-nowrap flex-sm-wrap mt-5 mx-0 ">--}}

{{--            <div class="col-sm-12 col-lg-12 col-12 row news_box category-box" data-aos="fade-right"--}}

{{--                 data-aos-duration="2000">--}}

{{--                @foreach($posts as $index => $post)--}}
{{--                    <div class="card" data-aos="fade-up" data-aos-duration="1200">--}}
{{--                        <a href="{{route('post', ['lang' => app()->getLocale(),$post->id] )}}">--}}
{{--                            <img loading="lazy" src="{{url('/storage/'.$post->image)}}" class="card-img" alt="news"--}}
{{--                                 style="width: 310px; height: 210px; object-fit: cover;">--}}
{{--                        </a>--}}
{{--                        <div class="card-body">--}}
{{--                            @php--}}
{{--                                $titleWords = explode(' ', $post->title);--}}
{{--                                $shortTitle = implode(' ', array_slice($titleWords, 0, 5));--}}

{{--                                $contentWords = explode(' ', $post->content);--}}
{{--                                $shortContent = implode(' ', array_slice($contentWords, 0, 10));--}}
{{--                            @endphp--}}

{{--                            <a href="{{route('post', ['lang' => app()->getLocale(),$post->id])}}"><h5--}}
{{--                                    class="fs-5">{{ $shortTitle }}</h5></a>--}}
{{--                            <p>{!! $shortContent !!}...</p>--}}
{{--                            <div class="opacity-50 d-flex align-items-center flex-row my-2">--}}
{{--                <span>--}}
{{--                    <img loading="lazy" src="/assets/images/news/calendar.webp" alt="Calendar"--}}
{{--                         style="margin-top: -5px;">--}}
{{--                    {{\Carbon\Carbon::parse($post->created_at)->format('d.m.Y')}}--}}
{{--                </span>--}}
{{--                                <span class="vr"></span>--}}
{{--                                <span id="view-count">--}}
{{--                    <img loading="lazy" src="/assets/images/news/eye.webp" alt="eye" style="margin-top: -4px;">--}}
{{--                    <span id="count">{{ $post->view_count }}</span>--}}
{{--                </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="blog__wrapper">
            <div class="row g-4">
                @foreach($posts as $index => $post)

                    <div class="col-sm-6 col-lg-3">
                        <div class="blog__item" data-aos="fade-up" data-aos-duration="800" style="height: 100%;  margin-inline-end: 15px;">
                            <div class="blog__item-inner" style="height: 100%; display: flex; flex-direction: column;">
                                <div class="blog__thumb" style="flex-shrink: 0;">
                                    <a href="">
                                        <img src="{{url('/storage/'.$post->image)}}" alt="blog Images">
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
                                        <a href="{{route('post', ['lang' => app()->getLocale(),$post->id])}}"><h5
                                                class="fs-5">{{ $shortTitle }}</h5></a>
                                        <p>{!! $shortContent !!}...</p>
                                        <span><img loading="lazy" src="/assets/images/news/calendar.webp" alt="Calendar" style="margin-top: -5px;">{{\Carbon\Carbon::parse($post->created_at)->format('d.m.Y')}}</span>
                                        <span class="vr"></span>
                                        <span id="view-count"><img loading="lazy" src="/assets/images/news/eye.webp" alt="eye" style="margin-top: -4px;">
                                            <span id="count">{{ $post->view_count }}</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        @include('front.paginate', ['items' => $posts])
    </div>

@endsection
