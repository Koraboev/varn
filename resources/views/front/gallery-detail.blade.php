@extends('layout.main')
@section('content')

    <section class="page-header bg-color-1">
        <div class="container">
            <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
                <h2 >{{$gallery->title}}</h2>
                <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item "><a href="{{route('home', ['lang' => app()->getLocale()])}}">{{__('main.home')}}</a></li>
                        <li class="breadcrumb-item "><a href="{{route('gallery', ['lang' => app()->getLocale()])}}">{{__('main.gallery')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$gallery->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ================> Page header end here <================== -->
    <div class="blog padding-top padding-bottom bg-color-6">
        <div class="container">
        <h5 class="text-center"></h5>
            <div class="blog__wrapper mt-40">
                <div class="row g-4">
                    @foreach($gallery->images as $image)
                        <div class="col-sm-6 col-lg-4">
                            <div class="blog__item" data-aos="fade-up" data-aos-duration="800" style="height: 100%;">
                                <div class="blog__item-inner" style="height: 100%; display: flex; flex-direction: column;">
                                    <div class="blog__thumb" style="flex-shrink: 0;">
                                        <!-- Lightbox bilan bog'lash va galeriyani o'rnatish -->
                                        <a href="{{ url('/storage/' . $image) }}" class="popup-image-gallery" data-fancybox="gallery">
                                            <img src="{{ url('/storage/' . $image) }}" alt="blog Images">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                    <script>
                        $(document).ready(function() {
                            $('.popup-image-gallery').magnificPopup({
                                type: 'image',
                                gallery: {
                                    enabled: true, // Galereyani yoqish
                                    navigateByImgClick: true, // Rasmga bosish orqali o'tkazish
                                    preload: [0, 1] // Old va keyingi rasmlarni oldindan yuklash
                                },
                                closeOnContentClick: true, // Rasmga bosganda yopish
                                closeBtnInside: true, // Yopish tugmasi rasm ichida bo'lishi
                                // Agar kerak bo'lsa, tugmachalar uchun ko'rsatmalar:
                                callbacks: {
                                    beforeOpen: function() {
                                        this.st.mainClass = this.st.el.attr('data-effect'); // Animatsiya effektini o'rnatish
                                    }
                                }
                            });
                        });





                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
