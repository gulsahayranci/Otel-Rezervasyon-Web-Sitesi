@extends('frontend.layout.layout')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{asset('img/carousel-1.jpg')}});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Rooms</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{route('anasayfa')}}">Anasayfa</a></li>
                        <li class="breadcrumb-item"><a href="">Sayfalar</a></li>
                        <li class="breadcrumb-item"><a href="{{route('rooms')}}">Odalar</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Oda Detay</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    @foreach($data as $d)
    <div class="container" style="margin: 70px">
        <h3>{{$d->title}}</h3>
        <div
            style="
                display: flex;
                align-content: center;
                flex-wrap: wrap;
                flex-direction: column;
                justify-content: flex-start;
                margin-top: 40px">

            <p style="display:none">{{ $myIMG = Str::remove('public',$d->photo) }}</p>
            <img src="{{ asset( 'storage/'. $myIMG)}}"  width="600"/>
        </div>
        <div style="display:flex; justify-content: flex-end; margin: 30px 240px;">
            <div>
                <p class="price">${{$d->price}}</p>
            </div>
        </div>
        <div class="room-details">

            <h3>Room Details</h3>
            <ul>
                {{$d->detail}}
            </ul>
            <h3>Galeri</h3>


        </div>
        <div
            style="
                display: flex;
                align-content: center;
                flex-wrap: wrap;
                flex-direction: column;
                justify-content: flex-start;
                margin-top: 40px">
            <div class="slider-container" style="
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                " >
                <button id="prevButton" class="slider-button"  style="
                    background-color: orange;
                    border-width: 1px;
                    padding: 10px;
                    color: white;
                    border-color: lightblue;
                    margin: 30px;
                    "><</button>
                <div class="slider">
                    @foreach($d->roomtypeimgs as $img)
                        <img src="{{ asset('storage/' . Str::remove('public', $img->img_src)) }}" class="slide" />
                    @endforeach
                </div>
                <button id="nextButton" class="slider-button"  style="
                    background-color: orange;
                    border-width: 1px;
                    padding: 10px;
                    color: white;
                    border-color: lightblue;
                    margin: 30px;
                    ">></button>
            </div>
        </div>
    </div>
    @endforeach




    <!-- Newsletter Start -->
    <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="col-lg-10 border rounded p-1">
                <div class="border rounded text-center p-1">
                    <div class="bg-white rounded text-center p-5">
                        <h4 class="mb-4">Subscribe Our <span class="text-primary text-uppercase">Newsletter</span></h4>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                            <button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    .slider {
        width: 600px; /* Slider genişliği */
        overflow: hidden;
        margin: 0 auto;
    }

    .slide {
        width: 600px; /* Resim genişliği */
        display: none;
    }
</style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            var slides = $('.slide');
            var currentSlide = 0;

            function showSlide(slideIndex) {
                slides.hide();
                slides.eq(slideIndex).show();
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(currentSlide);
            }

            var autoSlideInterval = setInterval(nextSlide, 3000);

            showSlide(currentSlide);

            $('#prevButton').click(function () {
                prevSlide();
            });

            $('#nextButton').click(function () {
                nextSlide();
            });
        });
    </script>

@endsection

