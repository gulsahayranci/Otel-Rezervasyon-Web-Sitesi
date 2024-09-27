@extends('frontend.layout.layout')
@section('content')



    <div class="container my-4 " style="margin: 500px">
        <table class="mb-3">


            <th><h2>Kayıt Ol</h2> </th>
            @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
        <form action="{{url('/panel/customer/store')}}" method="POST">
            @method('POST')
            @csrf
            <tr>
                <th >İsim Soyisim</th>
               <td><input type="text" class="form-control" name="full_name" required></td>
            </tr>
            <tr>
                <th >E-mail</th>
                <td><input type="email" class="form-control" name="email" required></td>
            </tr>
            <tr>
                <th >Şifre</th>
                <td><input type="password" class="form-control" name="password" required></td>
            </tr>
            <tr>
                <th >Telefon</th>
                <td><input type="number" class="form-control" name="mobile" required></td>
            </tr>
            <tr>
                <th >Adres</th>
                <td><input type="text" class="form-control" name="adres" required></td>
            </tr>
            <tr>
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
