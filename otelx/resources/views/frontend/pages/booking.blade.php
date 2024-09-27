
@extends('frontend.layout.layout')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Rezervasyon</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                        <li class="breadcrumb-item"><a href="#">Sayfalar</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Rezervasyon</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->





    <!-- Booking Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

                <h1 class="mb-5"> <span class="text-primary text-uppercase">Oda Rezervasyonu</span></h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @if($errors->any())
                        @foreach($errors->all() as $error )
                            <p class="text-danger">{{$error}}</p>
                        @endforeach
                    @endif
                    @if(session()->get('success'))
                        <div class="alert-alert-success">
                            {{session()->get('success')}}
                        </div>
                    @endif
                    <div class="wow fadeInUp" data-wow-delay="0.2s">

                        <form action="{{route('panel.bookings.store')}}"  class="forms-sample" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="checkin_date">Giriş Tarihi</label>
                                <input type="date" class="form-control checkin-date" id="checkin_date"  name="checkin_date" >
                            </div>
                            <div class="form-group">
                                <label for="checkout_date">Çıkış Tarihi</label>
                                <input type="date" class="form-control" id="checkout_date"  name="checkout_date" >
                            </div>
                            <div class="form-group">
                                <label for="total_adults">Toplam Yetişkin</label>
                                <input type="text"  class="form-control" id="total_adults"  name="total_adults" >
                            </div>
                            <div class="form-group">
                                <label for="total_children">Toplam Çocuk </label>
                                <input type="text" class="form-control" id="total_children"  name="total_children">
                            </div>


                            <tr>
                                <th>Mevcut Odalar<span class="text-danger">*</span></th>
                                <td>

                                    <select  class="form-control room-list" name="room_id">

                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="hidden" name="customer_id" value="{{session('data')[0]->id}}" />
                                    <input type="hidden" name="ref" value="front" />
                                    <input type="submit" class="btn btn-primary "  />
                                </td>
                            </tr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Booking End -->
    <!-- Newsletter Start -->
    <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="col-lg-10 border rounded p-1">
                <div class="border rounded text-center p-1">
                    <div class="bg-white rounded text-center p-5">
                        <h4 class="mb-4"><span class="text-primary text-uppercase"></span></h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".checkin-date").on('blur',function(){
                var _checkindate=$(this).val();
                //ajax
                $.ajax({
                    url:"{{url('panel/bookings')}}/available-rooms/"+_checkindate,
                    dataType:'json',
                    beforeSend:function(){
                        $(".room-list").html('<option>---loading---</option>');
                    },
                    success:function(res){
                        var _html='';
                        $.each(res.data,function(index,row){
                            _html+='<option value="'+row.id+'">'+row.title+'</option>';
                        });
                        $(".room-list").html(_html);
                    }
                });
            });
        });
    </script>

@endsection



@endsection
