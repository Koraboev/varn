@extends('layout.main')
@section('content')

    <!-- ================> Page header start here <================== -->
    <section class="page-header bg-color-1">
        <div class="container">
            <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
                <h2>{{__('main.about_company')}}</h2>
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item "><a href="{{route('home')}}">{{__('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('main.about')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>




    <section class="about about--style1  bg-color-3">
        <div class="container">
            <div class="about__wrapper">
                <div class="section-header text-center">
                    <h2> {{__('main.learn_more')}}<span>       {{__('main.our_company')}} </span></h2>
                </div>
                @foreach($abouts as $about)
                    <div class="row g-5 align-items-center mt-15">
                        <div class="col-lg-6 about3-images d-flex flex-wrap gallery">
                            @foreach($about->images as $image)
                                <a href="{{url('/storage/'.$image)}}" data-fancybox="gallery"><img
                                        src="{{url('/storage/'.$image)}}" alt=""></a>
                            @endforeach
                        </div>
                        <div class="col-lg-6">
                            <div class="about__content" data-aos="fade-left" data-aos-duration="800">
                                <div class="about__content-inner">
                                    {!!  $about->text !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>

@endsection
