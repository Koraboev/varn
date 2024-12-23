@extends('layout.main')
@section('content')
    <section class="page-header bg-color-1">
        <div class="container">
            <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
                <h2>{{__('main.specialist')}}</h2>
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item "><a href="{{route('home')}}">{{__('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('main.specialist')}}</li>
                    </ol>
                </nav>
            </div>
        </div>


    </section>

        <section class="about-main">
            <div class="container">
                @foreach($specialists as $specialist)
                    <div class="row position-relative h-100">
                        <div class=" col-md-5 col-sm-12">
                            <img src="{{url('/storage/'.$specialist->specialist_image)}}" alt="image audit varn">
                        </div>
                        <div class="col-md-7 col-sm-12 about-content">
                            <div>
                                <h2>{{$specialist->specialist_name}}</h2>
                                {!! $specialist->description !!}
                            </div>
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach($specialist->images as $image)
                                        <div class="swiper-slide">
                                            <a href="{{url('/storage/'.$image)}}" data-fancybox="gallery"><img src="{{url('/storage/'.$image)}}" alt=""></a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination" style="bottom: -7px"></div>
                            </div>
                        </div>
                    </div>
                    <hr style="width: 100%; color: #8b8b9a; margin-bottom: 30px">
                @endforeach
            </div>

        </section>

@endsection
