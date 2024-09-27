<!-- Header Start -->
@php
    use App\Models\SiteSetting;

        $setting=SiteSetting::where('id',1)->first();
@endphp
<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-2 bg-dark d-none d-lg-block">
            <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h2 class="m-2 text-primary text-uppercase">Hotel</h2>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        <p class="mb-0">{{$setting->mail}}</p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <p class="mb-0">+{{$setting->telefon}}</p>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <div class="d-inline-flex align-items-center py-2">
                        <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                        <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                        <a class="" href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="index.html" class="navbar-brand d-block d-lg-none">
                    <h2 class="m-0 text-primary text-uppercase">Hotel</h2>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('anasayfa')}}" class="nav-item nav-link active">Anasayfa</a>
                        <a href="{{route('about')}}" class="nav-item nav-link">Hakkımızda</a>
                        <a href="{{route('services')}}" class="nav-item nav-link">Servislerimiz</a>
                        <a href="{{route('rooms')}}" class="nav-item nav-link">Odalar</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Sayfalar</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{route('team')}}" class="dropdown-item">Ekibimiz</a>

                            </div>
                        </div>
                        <a href="{{route('contact')}}" class="nav-item nav-link">İletişim</a>
                    </div>
                    @if(Session::has('customerlogin'))
                        <a href="{{route('front_booking')}}" class="nav-item nav-link" >Rezervasyon</a>
                        <a href="{{route('logout')}}" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Çıkış<i class=" ms-3"></i></a>

                    @else
                        <a href="#" class="nav-item nav-link">Rezervasyon</a>
                        <a href="{{route('login')}}" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Giriş<i class=" ms-3"></i></a>
                        <a href="{{route('register')}}" class="btn btn-primary rounded-0 py-3 px-md-5 d-none d-lg-block">Kayıt Ol<i class=" ms-3"></i></a>

                    @endif

                </div>
            </nav>
        </div>
    </div>
</div>

<!-- Header End -->
