@extends('layout.main')
@section('content')


    <!-- ================> Page header start here <================== -->
    <section class="page-header bg-color-1">
        <div class="container">
            <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
                <h2 >{{__('main.partnerships')}}</h2>
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item "><a href="{{route('home')}}">{{__('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('main.partnerships')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ================> Page header end here <================== -->

    <div class="container view" style="padding-bottom: 25px;">
       {!!  $top_button->top_content !!}
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <colgroup>
                    <col>
                    <col>
                    <col>
                    <col>
                </colgroup>
                <tbody>
                @foreach($partnerships as $partnership)
                    <tr>
                        <td style="vertical-align: middle; text-align: center;">
                            <p>
                                <img src="{{url('/storage/'.$partnership->flag_image)}}" style="max-width: 150px; height: auto;">
                            </p>
                        </td>
                        <td style="vertical-align: middle; text-align: center;">
                            <p>
                                <a  href="{{$partnership->company_link}}">{{$partnership->company_name}} </a>
                            </p>
                        </td>
                        <td style="vertical-align: middle; text-align: center;">
                            <p>{{$partnership->country_name}}</p>
                        </td>
                        <td style="vertical-align: middle; text-align: center;">
                            <p>{{$partnership->city_name}}</p>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        {!!  $top_button->bottom_content !!}</div>
@endsection
