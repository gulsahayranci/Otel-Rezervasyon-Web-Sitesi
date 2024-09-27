@extends('frontend.layout.layout')
@section('content')



    <div class="container my-4 " style="margin: 500px">
        <table class="mb-3">


            <th><h2>Giriş Yap</h2> </th>
            @if(Session::has('error'))
                <p class="text-danger">{{session('error')}}</p>
            @endif
            <form action="{{route('customer_login')}}" method="POST">
                @method('POST')
                @csrf

                <tr>
                    <th >E-mail</th>
                    <td><input type="email" class="form-control" name="email" required></td>
                </tr>
                <tr>
                    <th >Şifre</th>
                    <td><input type="password" class="form-control" name="password" required></td>
                </tr>

                    <input type="hidden" name="ref" value="front">
                    <td colspan="2"><input type="submit" class="btn btn-primary"></td>
                </tr>


            </form>
        </table>
    </div>
    <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="col-lg-10 border rounded p-1">
                <div class="border rounded text-center p-1">
                    <div class="bg-white rounded text-center p-5">

                        <div class="position-relative mx-auto" style="max-width: 400px;">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
