@extends('layout.main')
@section('content')
    <section class="page-header bg-color-1">
        <div class="container">
            <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
                <h2 >{{__('main.conclusions')}}</h2>
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item "><a href="{{route('home')}}">{{__('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('main.conclusions')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <div class="portfolios section mt-40">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="portfolio-details">
                        <div id="yw0" class="list-view">
                            <div class="summary"></div>

                            <div class="grid">
                                <div class="grid d-flex flex-wrap">
                                    @foreach($conclusions as $conclusion)
                                        <div class="grid-item col-sm-3 col-xs-12 figts limited  mb-20">
                                            <h6 class="text-center">{{$conclusion->conclusion}}</h6>
                                            <div class="portfolio-item">
                                                <a href="{{ url('/storage/'.$conclusion->image) }}" class="image-popup">
                                                    <img class="img-responsive" src="{{url('/storage/'.$conclusion->image)}}" alt="{{$conclusion->conclusion}}">
                                                </a>
                                            </div><!-- /.portfolio-item -->
                                        </div> <!-- /.grid-item -->
                                    @endforeach
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
