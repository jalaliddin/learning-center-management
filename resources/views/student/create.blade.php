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
                        <form method="POST" action="{{route('student.store')}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Ism:</label>
                                    <input type="text" class="form-control" name="name" placeholder="Ism">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Familiya</label>
                                    <input type="text" class="form-control" name="surname" placeholder="Familiya">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Telefon:</label>
                                <input type="tel" class="form-control" name="phone" placeholder="998901234567">
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Saqlash</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
