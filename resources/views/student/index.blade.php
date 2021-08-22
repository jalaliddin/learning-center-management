@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        {{ __('Talabalar') }}
                        <a href="{{route('student.create')}}" class="btn btn-success float-right active" role="button" aria-pressed="true">Yangi talaba</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ism</th>
                                <th scope="col">Familiya</th>
                                <th scope="col">Telefon</th>
                                <th scope="col">QR code</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <th scope="row">{{$student->id}}</th>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->surname}}</td>
                                    <td>{{$student->phone}}</td>
                                    <td>
{{--                                        {{$student->qr_code}}--}}
                                        <a href="{{route('qrcode', $student->id)}}" class="btn btn-primary active" role="button" aria-pressed="true">QR code</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
