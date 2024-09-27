@extends('backend.layout.app')
@section('content')

    <div id="layoutSidenav">
        @include('backend.inc.sidebar')

        <div id="layoutSidenav_content">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ekle</h4>
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

                        <form action="{{route('panel.bookings.store')}}"  class="forms-sample" method="POST" enctype="multipart/form-data">
                            @csrf
                            <tr>
                                <th>Müşteri seçin</th>
                                <td>
                                    <select name="customer_id"  class="form-control">
                                        <option value="0" >---müşteriler---</option>
                                        @foreach($data as $customer)
                                            <option value="{{$customer->id}}">{{$customer->full_name}}</option>
                                        @endforeach
                                    </select>
                                </td>

                            </tr>
                            <div class="form-group">
                                <label for="checkin_date">Giriş Tarihi</label>
                                <input type="date" class="form-control checkin-date" id="checkin_date"  name="checkin_date" >
                            </div>
                            <div class="form-group">
                                <label for="checkout_date">Çıkış Tarihi</label>
                                <input type="date" class="form-control" id="checkout_date"  name="checkout_date" >
                            </div>
                            <tr>
                                <th>Mevcut Odalar<span class="text-danger">*</span></th>
                                <td>
                                    <select  class="form-control room-list" name="room_id">

                                    </select>
                                </td>

                            </tr>
                            <div class="form-group">
                                <label for="total_adults">Toplam Yetişkin</label>
                                <input type="text"  class="form-control" id="total_adults"  name="total_adults" >
                            </div>
                            <div class="form-group">
                                <label for="total_children">Toplam Çocuk </label>
                                <input type="text" class="form-control" id="total_children"  name="total_children">
                            </div>




                            <button type="submit" class="btn btn-primary mr-2"   >Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="{{asset('backend')}}/https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('backend')}}/js/scripts.js"></script>
    <script src="{{asset('backend')}}/https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('backend')}}/assets/demo/chart-area-demo.js"></script>
    <script src="{{asset('backend')}}/assets/demo/chart-bar-demo.js"></script>
    <script src="{{asset('backend')}}/https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('backend')}}/js/datatables-simple-demo.js"></script>
    <script src="{{asset('backend')}}/../../js/file-upload.js"></script>
    <script src="{{asset('backend')}}/../../js/off-canvas.js"></script>
    <script src="{{asset('backend')}}/../../js/hoverable-collapse.js"></script>
    <script src="{{asset('backend')}}/../../js/template.js"></script>
    <script src="{{asset('backend')}}/../../js/settings.js"></script>
    <script src="{{asset('backend')}}/../../js/todolist.js"></script>
    <script src="{{asset('backend')}}/../../vendors/js/vendor.bundle.base.js"></script>
    <link rel="stylesheet" href="{{asset('backend')}}/../../vendors/feather/feather.css">
    <link rel="stylesheet" href="{{asset('backend')}}/../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('backend')}}/../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('backend')}}/../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('backend')}}/../../images/favicon.png" />
    </body>
    </html>
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
