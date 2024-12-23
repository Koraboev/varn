@extends('layout.main')
@section('content')


    <section class="page-header bg-color-1">
        <div class="container">
            <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
                <h2 >{{__('main.client_all')}}</h2>
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item "><a href="{{route('home')}}">{{__('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('main.client_all')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <div class="container">
        <p class="faq-heading" style="font-size: 14px; line-height: 1.5;">{{__('main.text')}}</p>
@foreach($clients as $client)
            <details class="faq-card">
                <summary><h6 class="fs-6">{{$client->title}}</h6> <span class="faq-open-icon">+</span></summary>
                <span class="faq-card-spoiler">{!! $client->description !!}</span>
            </details>
@endforeach
        <div class="recommendations row magnific-popup-gallery">
           @foreach($clients as $client)
               @if(isset($client->image))
                <div class="col-sm-4 item">
                    <img src="{{url('/storage/'.$client->image)}}" width="314" height="436" alt="" style="width: 90%; height: auto; margin-bottom: 10px;">
                    <div class="hovered">
                        <a href="{{url('/storage/'.$client->image)}}" title="" data-gal="magnific-pop-up[image]" class="port-icon"><i class="fa fa-search"></i></a>
                    </div>
                </div>
                @endif
           @endforeach
        </div>

    </div>

@endsection
