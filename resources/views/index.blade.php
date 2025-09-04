@extends('layouts.app')

@section('title', '動物病院一覧')

@section('content')
    <div class="mb-4">
        <h1 class="fw-bold h3">お近くの動物病院を探す</h1>
        <p class="text-muted">あなたの大切なペットのための病院を見つけましょう。</p>
    </div>

    {{-- 検索フォーム --}}
    <div class="card card-body mb-4">
        <form action="{{ route('search')}}" method="GET">
            <div class="row g-3">
                <div class="col-md-8">
                    <label for="keyword" class="form-label">キーワード</label>
                    <input type="text" id="keyword" name="keyword" class="form-control" value="{{ request('keyword') }}" placeholder="病院名、地名など">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-orange w-100">
                        <i class="fas fa-search me-1"></i> 検索する
                    </button>
                </div>
            </div>

            {{-- ペットの種類チェックボックス --}}
            <div class="mt-3">
                <label class="form-label d-block">対応している動物</label>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($animals as $value)
                    <div class="form-check">

                        <input class="form-check-input" type="checkbox" id="{{ $value->id }}" name="animal[]" value="{{ $value->id }}" {{ in_array($value->id, $selectedAnimals) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $value->id }}">{{ $value->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
        </form>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($hospitals as $hospital)
            <div class="col">
                <x-hospital-card :hospital="$hospital" />
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center" role="alert">
                    該当する動物病院が見つかりませんでした。
                </div>
            </div>
        @endforelse
    </div>

    {{-- ページネーションリンク --}}
    {{-- <div class="mt-4">{{ $hospitals->links() }}</div> --}}

    <!-- ページトップに戻るボタンのHTML -->
    <a id="back-to-top-btn" class="back-to-top-btn" href="#" role="button">PAGE TOP</a>
@endsection

@push('styles')
<style>
    .back-to-top-btn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        
        border: none;
        outline: none;
        background-color: #F57C00; /* ▼▼▼ 色をオレンジに変更 ▼▼▼ */
        color: white;
        cursor: pointer;
        
        width: 100px;
        height: 45px;
        border-radius: 25px;
        
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        white-space: nowrap;

        display: flex;
        justify-content: center;
        align-items: center;

        opacity: 0.9;
        transition: opacity 0.3s;
    }

    .back-to-top-btn:hover {
        opacity: 1;
        background-color: #E65100; /* ▼▼▼ ホバー時の色もオレンジに変更 ▼▼▼ */
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let topBtn = document.getElementById('back-to-top-btn');

        window.onscroll = function() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                topBtn.style.display = "flex";
            } else {
                topBtn.style.display = "none";
            }
        };

        topBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>
@endpush