@extends('layout.main')
@section('content')
    @php
        $lang = \Illuminate\Support\Facades\App::getLocale();
 @endphp

    <section class="page-header bg-color-1">
        <div class="container">
            <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
                <h2 class="page-header__content-title">{{$post->title}}</h2>
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item "><a href="{{route('home')}}">{{__('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="blog-details padding-top padding-bottom bg-color-6">
        <div class="container">
            <div class="blog-details__wrapper">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <div class="blog-details__item">
                            <div class="blog-details__item-inner">
                                <div class="blog-details__thumb">
                                    <div class="blog-details__thumb-inner" data-aos="fade-up" data-aos-duration="800">
                                        <img src="{{url('/storage/'.$post->image)}}" alt="blog-image">
                                    </div>
                                </div>
                                <div class="blog-details__content">
                                    <h3 class="page-header__content-title"> {{$post->title}} </h3>
                                    <div class="blog-details__meta">
                                        <ul>
                                            <li>
                                                <img src="/assets/images/2.png" alt="date-icon">
                                                {{\Carbon\Carbon::parse($post->created_at)->locale(\Illuminate\Support\Facades\App::getLocale())->translatedFormat('F d, Y')}}
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="mb-0">{!! $post->content !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8  col-12">
                        <div class="sidebar">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="sidebar__categorie" data-aos="fade-up" data-aos-duration="900">
                                        <div class="sidebar__head">
                                            <h6>{{__('main.categories')}}</h6>
                                        </div>
                                        <div class="sidebar__categorie-body">
                                            <div class="sidebar__categorie-content">
                                                <ul>
                                                   @foreach($categories as $category)
                                                        <li class="active">
                                                            <a href="{{route('category', ['lang' => app()->getLocale(),$category->id])}}">
                                                                {{$category->name}}</a>
                                                            <span>{{count($category->posts)}}</span>
                                                        </li>
                                                   @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="sidebar__recentpost" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="sidebar__head">
                                            <h6>{{__('main.recent_post')}}</h6>
                                        </div>
                                        <div class="sidebar__recentpost-body">
                                            <ul>
                                                @foreach($posts as $post)
                                                    <li>
                                                        @php
                                                            $titleWords = explode(' ', $post->title);
                                                            $shortTitle = implode(' ', array_slice($titleWords, 0, 3));
                                                        @endphp
                                                        <div class="sidebar__recentpost-item">
                                                            <div class="sidebar__recentpost-inner">
                                                                <div class="sidebar__recentpost-thumb">
                                                                    <a href="{{route('post', ['lang' => app()->getLocale(),$post->id])}}"><img src="{{url('/storage/'. $post->image)}}"
                                                                                                     alt="recentpost-image"  style="width: 150px; height: 70px; object-fit: cover;">
                                                                    </a>
                                                                </div>
                                                                <div class="sidebar__recentpost-content">
                                                                    <p><a href="{{route('post', ['lang' => app()->getLocale(),$post->id])}}">{{$shortTitle}}...</a></p>
                                                                    <span>{{\Carbon\Carbon::parse($post->created_at)->locale(\Illuminate\Support\Facades\App::getLocale())->translatedFormat('F d, Y')}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
