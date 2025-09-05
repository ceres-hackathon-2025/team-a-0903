@extends('layouts.app')

@section('title', $hospital->name . ' の詳細')

@section('content')
    <div class="card shadow-sm h-100 border-0">
        {{-- 画像 --}}
        <img src="{{ $hospital->images }}" 
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
                    <ul class="list-unstyled mt-2 ms-4">
                    @for ($i = 0; $i <= 6; $i++)
                    @php
                    $flg = 0
                    @endphp
                    <li>
                    {{ $weeks[$i] }}：
                    @foreach ($hospital->businessHours as $hours)
                    @if ($hours->day_of_week->value == $i)
                        @php
                        $flg = 1
                        @endphp
                        {{ $hours->start_time->format('H:i') }} ~ {{ $hours->end_time->format('H:i') }}　
                        @endif
                    @endforeach
                    @if ($flg == 0) 
                    休業日
                    @endif
                    </li>
                    @endfor
                </ul>
                </li>
                <li class="mb-2">
                    <i class="fas fa-dog text-orange me-2"></i>
                    @foreach($hospital->species as $animal)
                        {{ $animal->name }} @if (!$loop->last)<span>、</span>@endif
                    @endforeach
                </li>
            </ul>
            

            {{-- 地図表示 --}}
            @if($hospital->address)
                <h5 class="fw-bold">マップ</h5>
                <div class="ratio ratio-4x3">
                <iframe
                    src="https://www.google.com/maps?q={{ urlencode($hospital->address) }}&output=embed"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                </div>
            @endif

 
        </div>

    </div>
        {{-- 戻るボタン --}}
    <a href="{{ route('index') }}" class="btn btn-orange mt-4">
        <i class="fas fa-arrow-left me-1"></i> 一覧に戻る
    </a>
@endsection
