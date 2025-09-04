@extends('layouts.app')

@section('title', '動物病院一覧')

@section('content')
    <div class="mb-4">
        <h1 class="fw-bold h3">お近くの動物病院を探す</h1>
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
                    <button type="submit" class="btn btn-orange w-100">
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
        background-color: #0d6efd;
        color: white;
        cursor: pointer;
        
        /* 変更点：横長のボタンに */
        width: 100px;
        height: 45px;
        border-radius: 25px; /* カプセル形状にする */
        
        /* 変更点：文字のスタイル */
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        white-space: nowrap; /* 文字が改行されないようにする */

        display: flex;
        justify-content: center;
        align-items: center;

        opacity: 0.8;
        transition: opacity 0.3s;
    }

    .back-to-top-btn:hover {
        opacity: 1;
    }
</style>
@endpush

@push('scripts')
<script>
    // 3. ボタンを制御するJavaScript
    document.addEventListener('DOMContentLoaded', function() {
        // ボタンの要素を取得
        let topBtn = document.getElementById('back-to-top-btn');

        // スクロール時の処理
        window.onscroll = function() {
            // 画面上部から200px以上スクロールされたらボタンを表示
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                topBtn.style.display = "flex";
            } else {
                topBtn.style.display = "none";
            }
        };

        // ボタンクリック時の処理
        topBtn.addEventListener('click', function(e) {
            e.preventDefault(); // aタグのデフォルトの動作（#へのジャンプ）をキャンセル
            
            // ページトップへスムーズにスクロール
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>
@endpush