@extends('layouts.app')

@section('title', $hospital->name . ' の詳細')

@section('content')
<style>
    .hospital-card .carousel {
    margin-top: 1rem; /* 上部の余白量を調整 */
}
/* カード全体 */
.hospital-card {
    border-radius: 1.5rem;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    overflow: hidden;
}
.hospital-card img {
    height: 400px; /* 高さを固定 */
    object-fit: cover; /* はみ出した部分を切り取って中央に表示 */
    width: 100%; /* 横幅はカードいっぱい */
    border-radius: 1.5rem 1.5rem 0 0;
}
/* アイコン共通 */
.list-icon {
    width: 1.25rem;
    color: #ff7f50;
}

/* 戻るボタン */
.btn-orange {
    background-color: #ff7f50;
    color: #fff;
    border-radius: 2rem;
}
.btn-orange:hover {
    background-color: #f1734dff;
}
/* 診療時間リスト内の丸角ボックス */
.hours-box {
    background-color: #fff5f0;
    border-radius: 1rem;
    padding: 0.5rem 1rem;
    margin-bottom: 0.25rem;
}
</style>

<div class="card hospital-card h-100 border-0">
    {{-- 画像カルーセル --}}
    @if($hospital->hospitalImages->count())
    <div id="hospitalCarousel" class="carousel slide rounded-top" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($hospital->hospitalImages as $key => $image)
            <div class="carousel-item @if($key == 0) active @endif">
                <img src="{{ $image->image_path }}" class="d-block w-100" alt="{{ $hospital->name }} の画像">
            </div>
            @endforeach
        </div>
        @if($hospital->hospitalImages->count() > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#hospitalCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hospitalCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
        @endif
    </div>
    @endif

    <div class="card-body p-3 p-md-4">
        {{-- 病院名 --}}
        <h1 class="card-title h3 fw-bold mb-4">
            <i class="fas fa-hospital me-2 text-orange"></i>{{ $hospital->name }}
        </h1>

        {{-- 詳細情報リスト --}}
        <ul class="list-unstyled mb-4">
            <li class="mb-2">
                <i class="fas fa-map-marker-alt list-icon me-2"></i>
                <strong>住所:</strong> {{ $hospital->address }}
            </li>
            <li class="mb-2">
                <i class="fas fa-phone list-icon me-2"></i>
                <strong>電話番号:</strong> {{ $hospital->tel }}
            </li>
            <li class="mb-2">
                <i class="fas fa-clock list-icon me-2"></i>
                <strong>診療時間:</strong>
                <ul class="list-unstyled mt-2 ms-4">
                    @for ($i = 0; $i <= 6; $i++)
                        @php $flg = 0; @endphp
                        <li>
                            {{ $weeks[$i] }}：
                            @foreach ($hospital->businessHours as $hours)
                                @if ($hours->day_of_week->value == $i)
                                    @php $flg = 1; @endphp
                                    {{ $hours->start_time->format('H:i') }} ~ {{ $hours->end_time->format('H:i') }}
                                @endif
                            @endforeach
                            @if ($flg == 0)
                                <span class="text-danger">休業日</span>
                            @endif
                        </li>
                    @endfor
                </ul>
            </li>
            <li class="mb-2">
                <i class="fas fa-dog list-icon me-2"></i>
                @foreach($hospital->species as $animal)
                    {{ $animal->name }} @if (!$loop->last)<span>、</span>@endif
                @endforeach
            </li>
        </ul>

        {{-- 地図表示 --}}
        @if($hospital->address)
        <h5 class="fw-bold mb-3">マップ</h5>
        <div class="ratio ratio-4x3 mb-3">
            <iframe
                src="https://www.google.com/maps?q={{ urlencode($hospital->address) }}&output=embed"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        @endif

        {{-- 戻るボタン --}}
        <div class="text-center mt-4">
            <a href="{{ route('index') }}" class="btn btn-orange btn-lg">
                <i class="fas fa-arrow-left me-1"></i> 一覧に戻る
            </a>
        </div>
    </div>
</div>
@endsection
