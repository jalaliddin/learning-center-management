@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('student.index')}}" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Orqaga qaytish</a>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">{{Session::get('message')}}</div>
                        @endif
                        @if(count($errors)>0)

                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="alert alert-danger">{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{route('student.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Ism:</label>
                                    <input type="text" class="form-control" name="firstname" placeholder="Ism">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Familiya:</label>
                                    <input type="text" class="form-control" name="surname" placeholder="Familiya">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Telefon:</label>
                                    <input type="tel" class="form-control" name="phone" placeholder="998901234567">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Sms yuboriladigan raqam:</label>
                                    <input type="tel" class="form-control" name="sms_phone" placeholder="998975150510">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Email:</label>
                                    <input type="email" class="form-control" name="email" placeholder="mail@example.com">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Manzil:</label>
                                    <input type="text" class="form-control" name="address" placeholder="Kukhna Ark str. 6x">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Qo'shimcha ma'lumot:</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Rasm:</label>
                                <input type="file" class="form-control-file" id="" name="avatar">
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Saqlash</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
