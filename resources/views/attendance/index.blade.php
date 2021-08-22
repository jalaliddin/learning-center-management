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
                    <div class="card-header">{{ __('Talaba') }}</div>
                    <div class="card-body">
                        <lastprofile-component></lastprofile-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
