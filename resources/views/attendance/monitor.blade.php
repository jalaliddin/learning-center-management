@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Oxirgi tashriflar.') }}</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Avatar:</th>
                                <th scope="col">Ismi:</th>
                                <th scope="col">Familiya:</th>
                                <th scope="col">Tel.:</th>
                                <th scope="col">SMS:</th>
                                <th scope="col">Tashfir vaqti:</th>
                                <th scope="col">Harakatlar:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($attendances as $attendance)
                                <tr>
                                    <th scope="row">{{ $attendance->student->id }}</th>
                                    <td>
                                        <img src="/uploads/avatars/{{ $attendance->student->avatar }}" style="width:40px; height:40px; border-radius:50%">
                                    </td>
                                    <td>{{ $attendance->student->name }}</td>
                                    <td>{{ $attendance->student->surname }}</td>
                                    <td>{{ $attendance->student->phone }}</td>
                                    <td>{{ $attendance->student->sms_phone }}</td>
                                    <td>{{ $attendance->created_at }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{route('student.show', $attendance->student->id)}}">Batafsil</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $attendances->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
