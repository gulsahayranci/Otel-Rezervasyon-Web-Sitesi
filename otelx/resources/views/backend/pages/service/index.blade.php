@extends('backend.layout.app')

@section('content')
    <div id="layoutSidenav">
        @include('backend.inc.sidebar')

        <div id="layoutSidenav_content">

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Servisler</h4>
                                    <p class="card-description">
                                        <a href="{{route('panel.service.create')}}">Yeni</a>
                                    </p>

                                    @if(session()->get('success'))
                                        <div class="alert-alert-success">
                                            {{session()->get('success')}}
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table">

                                            <thead>
                                            <tr>

                                                <th>#</th>
                                                <th>title</th>
                                                <th>detay</th>
                                                <th>action</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($data) && $data->count() >0)
                                                @foreach($data as $d)

                                                    <tr>

                                                        <td>#</td>
                                                        <td>{{$d->title}}</td>
                                                        <td>{{$d->detail}}</td>
                                                        <td >

                                                            <a href="{{route('panel.service.destroy',['id'=>$d->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                                                        </td>

                                                    </tr>





                                                @endforeach
                                            @endif


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- content-wrapper ends -->

                <!-- partial -->
            </div>
        </div>
    </div>




    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('backend')}}/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('backend')}}/assets/demo/chart-area-demo.js"></script>
    <script src="{{asset('backend')}}/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('backend')}}/js/datatables-simple-demo.js"></script>
    <script src="{{asset('backend/js/datatables-simple-demo.js')}}"></script>
    <link href="{{asset('backend/css/gitcdn.github.io_bootstrap-toggle_2.2.2_css_bootstrap-toggle.min.css')}}" rel="stylesheet">

    </body>
    </html>




@endsection

