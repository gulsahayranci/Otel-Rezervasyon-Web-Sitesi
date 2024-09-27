@extends('backend.layout.app')
@section('content')

    <div id="layoutSidenav">
        @include('backend.inc.sidebar')

        <div id="layoutSidenav_content">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Ekle</h4>
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

                        <form action="{{route('panel.staff.store')}}"  class="forms-sample" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="full_name">İsim</label>
                                <input type="text" class="form-control" id="full_name"  name="full_name" >
                            </div>
                            <tr>
                                <th>Departman seçin </th>
                                <td>
                                    <select name="department_id"  class="form-control">
                                        <option value="0" >---departman tipi---</option>
                                        @foreach($departs as $dp)
                                            <option value="{{$dp->id}}">{{$dp->title}}</option>
                                        @endforeach
                                    </select>
                                </td>

                            </tr>
                            <div class="form-group">
                                <label for="Photo">fotoğraf</label>
                                <input type="file" class="form-control" id="photo"  name="photo" >
                            </div>
                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea class="form-control" name="bio" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="salary_type">Maaş Türü</label>
                                <input type="radio" name="salary_type" value="günlük" >günlük
                                <input type="radio" name="salary_type" value="aylık" >aylık
                            </div>
                            <div class="form-group">
                                <label for="salary_amt">Maaş Miktarı</label>
                                <input type="number" class="form-control" id="salary_amt"  name="salary_amt" >
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
