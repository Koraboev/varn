@extends('layout.main')
@section('content')
    @php
        $lang = \Illuminate\Support\Facades\App::getLocale();
 @endphp


    <section class="page-header bg-color-1">
        <div class="container">

            <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
                <h2 >{{$service->name}}</h2>
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item "><a href="{{route('home')}}">{{__('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$service->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="service-details padding-top padding-bottom bg-color-6 pb-1 pb-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-sm-offset-1 col-xs-offset-0">
                    <div class="section-heading">
                        <p class="text-center">{!! $service->description !!}</p>
                    </div>
                </div>
            </div>
            <div class="service-details__wrapper">
                <div class="row flex-lg-row-reverse g-5">
                    <div class="col-lg-8">
                        <div class="service-details__item">
                            <div class="service-details__item-inner">
                                <div class="service-details__content aos-init aos-animate" data-aos="fade-up" data-aos-duration="900">
                                    <h3 class="mb-15" id="service-name"></h3>
                                    <p class="mb-0" id="service-description"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8  col-12">
                        <div class="sidebar">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="sidebar__categorie aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="sidebar__head">
                                            <h6 class="mt-3 mt-sm-0">{{$service->name}}</h6>
                                        </div>
                                        <div class="sidebar__categorie-body">
                                            <div class="sidebar__social-content">
                                                <ul>
                                                    @foreach($service->subServices as $subService)
                                                        <li class="links">
                                                            <a href="#"  class="sub-service-link" data-id="{{ $subService->id }}">
                                                               {{$subService->name}}
                                                            </a>
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
    </div>
    <button id="id"></button>
    <script>

        const links = document.querySelectorAll('.sub-service-link');

        if (links.length > 0) {
            links[0].classList.add('show');
            links[0].parentElement.classList.add('active');

            const subServiceId = links[0].getAttribute('data-id');
            fetch(`/get-subservice-details/${subServiceId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('service-name').innerText = data.name;
                    document.getElementById('service-description').innerHTML = data.description;
                })
                .catch(error => console.error('Xato:', error));
        }

        links.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                links.forEach(a => {
                    a.classList.remove('show');
                    a.parentElement.classList.remove('active');
                });

                link.classList.add('show');
                link.parentElement.classList.add('active');

                const subServiceId = this.getAttribute('data-id');
                fetch(`/get-subservice-details/${subServiceId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('service-name').innerText = data.name;
                        document.getElementById('service-description').innerHTML = data.description;
                    })
                    .catch(error => console.error('Xato:', error));
            });
        });
    </script>


@endsection
