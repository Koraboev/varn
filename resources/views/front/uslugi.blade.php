@extends('layout.main')
@section('content')
    <section class="page-header bg-color-1">
        <div class="container">
            <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
                <h2>{{__('main.service')}}</h2>
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item "><a href="{{route('home')}}">{{__('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('main.service')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="feature bg-color-4 mb-40">
        <div class="container">
            <div class="feature__wrapper">
                <h4 class="font-montserrat mb-20">{{__('main.our_service')}}</h4>
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
                        <hr>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="feature__thumb" data-aos="fade-left" data-aos-duration="800">
                            <div class="feature__thumb-inner">
                                <div class="tab-content" id="feat-pills-tabContent">
                                    @foreach($services as $service)
                                        <div class="tab-pane fade @if($loop->first) show active @endif"
                                             id="feat-pills-{{$service->id}}" role="tabpanel"
                                             aria-labelledby="feat-pills-{{$service->id}}-tab" tabindex="0">
                                            <div class="row w-100 service_box" style="border-radius: 20px">
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
                                                    <div class="d-sm-none d-lg-block position-absolute" style="height: 300px; bottom: 0; width: 95%"></div>
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
        <div class="service_bg service_bg-2"></div>

    </section>

@endsection

