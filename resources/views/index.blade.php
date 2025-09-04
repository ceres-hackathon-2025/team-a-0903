@extends('layouts.app')

@section('title', '動物病院一覧')

@section('content')
    <div class="mb-4">
        <h1 class="display-6 fw-bold">お近くの動物病院を探す</h1>
        <p class="text-muted">あなたの大切なペットのための病院を見つけましょう。</p>
    </div>

    {{-- 検索フォーム --}}
    <div class="card card-body mb-4">
        <form action="#" method="GET">
            <div class="row g-3">
                <div class="col-md-8">
                    <label for="keyword" class="form-label">キーワード</label>
                    <input type="text" id="keyword" name="keyword" class="form-control" placeholder="病院名、地名など">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search me-1"></i> 検索する
                    </button>
                </div>
            </div>

            {{-- ペットの種類チェックボックス --}}
            <div class="mt-3">
                <label class="form-label d-block">対応している動物</label>
                <div class="d-flex flex-wrap gap-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="dog" name="animal[]" value="dog">
                        <label class="form-check-label" for="dog">犬</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cat" name="animal[]" value="cat">
                        <label class="form-check-label" for="cat">猫</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rabbit" name="animal[]" value="rabbit">
                        <label class="form-check-label" for="rabbit">ウサギ</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hamster" name="animal[]" value="hamster">
                        <label class="form-check-label" for="hamster">ハムスター</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="bird" name="animal[]" value="bird">
                        <label class="form-check-label" for="bird">鳥類</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="reptile" name="animal[]" value="reptile">
                        <label class="form-check-label" for="reptile">爬虫類</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="other" name="animal[]" value="other">
                        <label class="form-check-label" for="other">その他</label>
                    </div>
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