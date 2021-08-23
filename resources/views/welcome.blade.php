@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="card-deck">
                            <div class="card-group">
                                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                    <div class="card-header text-center">Umumiy o'quvchilar soni</div>
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $studentCount }}</h3>
                                        <p class="card-text">Tizimdan ro'yhatdan o'tgan ayni paytda holati faol o'quvchilar.</p>
                                    </div>
                                </div>
                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                    <div class="card-header text-center">Umumiy davomatlar soni</div>
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $attendanceCount }}</h3>
                                        <p class="card-text">Tizimdagi umumiy davomatlar soni, tizim buni avtomatik tarzda hisoblaydi.</p>
                                    </div>
                                </div>
                                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                    <div class="card-header text-center">Yuborilgan smslar</div>
                                    <div class="card-body">
                                        <h3 class="card-title">25</h3>
                                        <p class="card-text">SMS xizmati bilan ulanmaganligi sababli bu xususiyat, o'z ish faoliyatida emas.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
