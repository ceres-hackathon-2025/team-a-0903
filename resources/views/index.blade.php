@extends('layouts.app')

@section('title', '動物病院一覧')

@section('content')
<style>
/* 全体背景 */
body {
    background-color: #fffaf5;
}

/* ページタイトル・説明 */
h1.fw-bold {
    margin-bottom: 0.5rem;
}
p.text-muted {
    margin-bottom: 1.5rem;
}

/* 検索フォーム */
.card.card-body {
    border-radius: 1.5rem;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
    padding: 1.5rem;
}

.form-control {
    border: 2px solid #666;
    border-radius: 1rem;
    box-shadow: none;
}

.btn-orange {
    background-color: #ff7f50;
    color: #fff;
    border-radius: 2rem;
    padding: 0.5rem 1.5rem;
}
.btn-orange:hover {
    background-color: #ff6333;
}

/* チェックボックス */
.form-check-input {
    width: 1.3em;
    height: 1.3em;
    border: 2px solid #666;
    border-radius: 0.25rem;
    margin-top: 0.2em;
    cursor: pointer;
}

/* カード */
.col > .card {
    border-radius: 1.5rem; /* 丸角 */
    overflow: hidden;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* 影を追加 */
}

/* カード画像 */
.card img {
    height: 250px;
    object-fit: cover;
    width: 100%;
}

/* ページトップボタン */
.back-to-top-btn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 90;
    border: none;
    background-color: #F57C00;
    color: white;
    cursor: pointer;
    width: 100px;
    height: 45px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: bold;
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0.9;
    transition: opacity 0.3s;
}
.back-to-top-btn:hover {
    opacity: 1;
    background-color: #E65100;
}

/* ▼ チャットボット ▼ */
#chatbot-container {
    position: fixed;
    bottom: 20px;
    left: 20px;
    z-index: 100;
}
#chatbot-toggle {
    background: #F57C00;
    border: none;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    font-size: 24px;
    color: white;
    cursor: pointer;
}
#chatbot-box {
    display: none;
    flex-direction: column;
    justify-content: space-between;
    width: 300px;
    height: 400px;
    background: white;
    border: 2px solid #F57C00;
    border-radius: 1rem;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    margin-bottom: 10px;
}
#chatbot-messages {
    flex: 1;
    padding: 10px;
    overflow-y: auto;
    font-size: 14px;
}
#chatbot-input-area {
    display: flex;
    border-top: 1px solid #ccc;
}
#chatbot-input {
    flex: 1;
    border: none;
    padding: 8px;
    border-radius: 0 0 0.5rem 0.5rem;
}
#chatbot-send {
    background: #F57C00;
    border: none;
    color: white;
    padding: 8px 12px;
    cursor: pointer;
    border-radius: 0 0 0.5rem 0.5rem;
}
</style>

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
                    <input class="form-check-input border-width" type="checkbox" id="{{ $value->id }}" name="animal[]" value="{{ $value->id }}" {{ in_array($value->id, $selectedAnimals) ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $value->id }}">{{ $value->name }}</label>
                </div>
                @endforeach
            </div>
        </div>

        {{-- 営業中のチェックボックス --}}
        <div class="mt-3">
            <div class="d-flex flex-wrap gap-2">
                <div class="form-check">
                    <input class="form-check-input border-width" type="checkbox" id="{{ $businessFlg }}" name="businessFlg" value="1" {{$businessFlg == "1" ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $businessFlg }}">営業中のみ表示</label>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- 病院カード一覧 --}}
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @forelse ($hospitals as $hospital)
        <div class="col">
            <x-hospital-card :hospital="$hospital" :currentDay="$currentDay" :weeks="$weeks" />
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning text-center" role="alert">
                該当する動物病院が見つかりませんでした。
            </div>
        </div>
    @endforelse
</div>

{{-- ページトップボタン --}}
<a id="back-to-top-btn" class="back-to-top-btn" href="#" role="button">PAGE TOP</a>

{{-- ▼ AIチャットボット ▼ --}}
<div id="chatbot-container">
    <button id="chatbot-toggle">💬</button>
    <div id="chatbot-box">
        <div id="chatbot-messages"></div>
        <div id="chatbot-input-area">
            <input type="text" id="chatbot-input" placeholder="ペットの症状を入力..." />
            <button id="chatbot-send">送信</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ページトップボタン
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
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // チャットボット
    const toggleBtn = document.getElementById('chatbot-toggle');
    const chatBox = document.getElementById('chatbot-box');
    const sendBtn = document.getElementById('chatbot-send');
    const input = document.getElementById('chatbot-input');
    const messages = document.getElementById('chatbot-messages');

    toggleBtn.addEventListener('click', () => {
        chatBox.style.display = chatBox.style.display === 'flex' ? 'none' : 'flex';
    });

    sendBtn.addEventListener('click', () => {
        const text = input.value.trim();
        if (!text) return;
        const userMsg = document.createElement('div');
        userMsg.textContent = "👤: " + text;
        messages.appendChild(userMsg);
        const botMsg = document.createElement('div');
        botMsg.textContent = "🐾: ご質問ありがとうございます。「" + text + "」についてですね。";
        messages.appendChild(botMsg);
        messages.scrollTop = messages.scrollHeight;
        input.value = '';
    });
});
</script>
@endpush
