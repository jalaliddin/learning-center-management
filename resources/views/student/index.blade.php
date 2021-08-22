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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ism</th>
                                <th scope="col">Familiya</th>
                                <th scope="col">Telefon</th>
                                <th scope="col">SMS</th>
                                <th scope="col">QR code</th>
                                <th scope="col">Amaliyotlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <th scope="row">{{$student->id}}</th>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->surname}}</td>
                                    <td>{{$student->phone}}</td>
                                    <td>{{$student->sms_phone}}</td>
                                    <td>
                                        <a href="{{route('qrcode', $student->id)}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">QR code</a>
                                    </td>
                                    <td>
                                        <a href="{{route('student.show', $student->id)}}">
                                            <button type="button" class="btn btn-primary btn-sm"><i
                                                    class="far fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{route('student.edit', $student->id)}}">
                                            <button type="button" class="btn btn-success btn-sm"><i
                                                    class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" onclick="deleteConfirm('deleteStudent')"><i class="far fa-trash-alt"></i></a>
                                        <form id="deleteStudent" action="{{  route('student.destroy', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
