@extends('layout.main')
@section('content')

    <!-- ================> Page header start here <================== -->
    <section class="page-header bg-color-1">
        <div class="container">
            <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
                <h2>{{__('main.information')}}</h2>
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item "><a href="{{route('home')}}">{{__('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('main.information')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>



    <div class="container view" style="padding-bottom: 25px; margin-top: 25px;">
        @if($information)
            {!! $information->description !!}
        @else
            <p>{{ __('main.no_information_available') }}</p>
        @endif
    </div>


@endsection
