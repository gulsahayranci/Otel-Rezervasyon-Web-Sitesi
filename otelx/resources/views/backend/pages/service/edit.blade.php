@extends('backend.layout.app')
@section('content')

    <div id="layoutSidenav">
        @include('backend.inc.sidebar')

        <div id="layoutSidenav_content">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Servis Düzenle </h4>
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

                        <form action="{{url('panel/service/')}}" class="forms-sample" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Başlık</label>
                                <input type="text" class="form-control" id="title" value="{{$data->title ?? ''}}" name="title" >
                            </div>
                            <div class="form-group">
                                <label for="detail">Detay</label>
                                <textarea class="form-control">{{$data->detail ?? ''}}</textarea>
                            </div>






                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
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
