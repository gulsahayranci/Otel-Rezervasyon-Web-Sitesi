@extends('backend.layout.app')
@section('content')

    <div id="layoutSidenav">
        @include('backend.inc.sidebar')

        <div id="layoutSidenav_content">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Müşteri</h4>
                        @if($errors)
                            @foreach($errors->all() as $error )
                                <div class="alert-alert-danger">
                                    {{$error}}
                                </div>

                            @endforeach
                        @endif
                        @if(session()->get('success'))
                            <div class="alert-alert-success">
                                {{session()->get('success')}}
                            </div>
                        @endif

                        <form action="{{url('/panel/customer/'.$id.'/update',['data'=>$data])}}" class="forms-sample" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            <div class="form-group">
                                <label for="full_name">İsim Soyisim</label>
                                <input type="text" class="form-control" id="full_name" value="{{$data->full_name }}" name="full_name" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <textarea  class="form-control" id="email"  name="email"  rows="1"> {{ $data->email }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="password">Şifre</label>
                                <textarea  class="form-control" id="password"  name="password"  rows="1"> {{ $data->password }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Telefon</label>
                                <textarea  class="form-control" id="mobile"  name="mobile"  rows="1"> {{ $data->mobile }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="adres">Adres</label>
                                <textarea  class="form-control" id="adres"  name="adres"  rows="1"> {{ $data->adres }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="photo">Resim</label>
                                <textarea  class="form-control" id="photo"  name="photo" type="file" rows="1">{{ $data->photo }}</textarea>
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


@endsection
