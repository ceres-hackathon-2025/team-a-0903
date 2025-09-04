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
                        <input class="form-check-input" type="checkbox" id="{{ $value }}" name="animal[]" value="{{ $value }}" {{ in_array($value, $selectedAnimals) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $value }}">{{ $value }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
        </form>
    </div>


    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($hospitals as $hospital)
            <div class="col">
                {{-- 病院カードコンポーネントを呼び出し --}}
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

    {{-- ページネーションリンク (必要に応じて) --}}
    {{-- 
    <div class="mt-4">
        {{ $hospitals->links() }}
    </div> 
    --}}
@endsection