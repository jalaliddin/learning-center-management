@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header text-center">{{ $student->name }} {{ $student->surname }}</div>
                    <div class="card-body">
                        <img class="mx-auto d-block" src="/uploads/avatars/{{ $student->avatar }}"
                             style="width:150px; height:150px; border-radius:50%">
                        <ol>
                            <li>
                                <b>Ism:</b> {{ $student->name }}
                            </li>
                            <li>
                                <b>Familiya:</b> {{ $student->surname }}
                            </li>
                            <li>
                                <b>Telefon:</b> {{ $student->phone }}
                            </li>
                            <li>
                                <b>Sms yuboriladigan raqam:</b> {{ $student->sms_phone }}
                            </li>
                            <li>
                                <b>Email:</b> {{ $student->email }}
                            </li>
                            <li>
                                <b>Manzil:</b> {{ $student->address }}
                            </li>
                            <li>
                                <b>Qo'shimcha ma'lumot:</b> {{ $student->description }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header text-center">{{ __($student->name.'ning davomat tarixi') }}</div>
                    <div class="card-body">
                        // Tez kunda
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
