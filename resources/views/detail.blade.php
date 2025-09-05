@extends('layouts.app')

@section('title', $hospital->name . ' の詳細')

@section('content')
    <div class="card shadow-sm h-100 border-0">
        {{-- 画像 --}}
        <img src="{{ $hospital->image_url }}" 
             class="card-img-top hospital-card-img" 
             alt="{{ $hospital->name }}">

        <div class="card-body">
            {{-- 病院名 --}}
            <h1 class="card-title h3 fw-bold mb-3">
                <i class="fas fa-hospital me-2 text-orange"></i>{{ $hospital->name }}
            </h1>

            {{-- 詳細情報リスト --}}
            <ul class="list-unstyled mb-4">
                <li class="mb-2">
                    <i class="fas fa-map-marker-alt text-orange me-2"></i>
                    <strong>住所:</strong> {{ $hospital->address }}
                </li>
                <li class="mb-2">
                    <i class="fas fa-phone text-orange me-2"></i>
                    <strong>電話番号:</strong> {{ $hospital->tel }}
                </li>
                <li class="mb-2">
                    <i class="fas fa-clock text-orange me-2"></i>
                    <strong>診療時間:</strong> 
                    <li>
                        月曜日：
                        @foreach ($hospital->businessHours as $hours)
                        
                            @if ($hours->day_of_week == (object)["1"])
                                {{ $hours->start_time }} ~ {{ $hours->end_time }}
                            @endif
                        @endforeach
                    </li>
                </li>
                <li class="mb-2">
                    <i class="fas fa-dog text-orange me-2"></i>
                    <strong>対応動物:</strong> 
                    @foreach ($hospital->species as $animal)
                    {{ $animal->name }}
                    @endforeach
                </li>
            </ul>

 
        </div>

    </div>
        {{-- 戻るボタン --}}
    <a href="{{ route('index') }}" class="btn btn-orange mt-4">
        <i class="fas fa-arrow-left me-1"></i> 一覧に戻る
    </a>
@endsection
