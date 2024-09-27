@extends('frontend.layout.layout')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image:  url({{asset('img/carousel-1.jpg')}});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Our Team</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Our Team</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Booking Start -->

    <!-- Booking End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Ekibimiz</h6>
                <h1 class="mb-5">Ekibimizle tanışın..</h1>
            </div>
            <div class="row g-4">
                @if($data)
                    @foreach($data as $d)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded shadow overflow-hidden">
                        <div class="position-relative">

                            <p style="display:none">{{ $myIMG = Str::remove('public',$d->photo) }}</p>
                            <td><img src="{{ asset( 'storage/'. $myIMG)}}"  width="300"/> </td>
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">{{$d->full_name}}</h5>
                            <small>{{$d->department->title}}</small>
                        </div>
                    </div>
                </div>
               @endforeach
                    @endif
            </div>
        </div>
    </div>
    <!-- Team End -->


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
    <!-- Newsletter Start -->


 @endsection
