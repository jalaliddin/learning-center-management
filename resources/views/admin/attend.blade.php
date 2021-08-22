@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Iltimos QR kod orqali skanerlang!') }}</div>
                    <div class="card-body">
                        <template>
                            <qrreader-component></qrreader-component>
                        </template>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Oxirgi tashriflar') }}</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ism</th>
                                <th scope="col">Holat</th>
                                <th scope="col">Sana</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Jalol Saidov</td>
                                <td>Keldi</td>
                                <td>21.08.2021</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jalol Saidov</td>
                                <td>Ketdi</td>
                                <td>21.08.2021</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Jalol Saidov</td>
                                <td>Keldi</td>
                                <td>21.08.2021</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
