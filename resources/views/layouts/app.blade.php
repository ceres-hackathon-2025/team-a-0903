<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ペットレス急')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="/images/icon_images/icon3.png">
    {{-- ▼▼▼ オレンジ色のためのCSSを追加 ▼▼▼ --}}
    <style>
        body { 
            background-color: #FFF3E0; /* 全体の背景を温かみのある薄いオレンジ色に */
        }
        .hospital-card-img {
            aspect-ratio: 16 / 10;
            object-fit: cover;
        }

        /* オレンジ色のナビゲーションバー */
        .navbar-orange {
            background-color: #FF9800; /* ヘッダーの背景を鮮やかなオレンジに */
        }

        /* オレンジ色のボタン（他のファイルで使います） */
        .btn-orange {
            background-color: #F57C00;
            border-color: #F57C00;
            color: #fff;
        }
        .btn-orange:hover {
            background-color: #E65100;
            border-color: #E65100;
            color: #fff;
        }

        .bg-orange {
            --bs-bg-opacity: 1;
            background-color: rgba(255, 165, 0, var(--bs-bg-opacity)) !important;
        }

        .text-orange {
            color: orange !important;
        }
        /* ロゴ全体のレスポンシブ対応 */
.logo-img {
    max-height: 80px;   /* PCでは高さを80px以内に */
    width: auto;
    height: auto;
}

/* アイコンとロゴで高さを揃える */
.icon-img,
.text-logo {
    max-height: 80px;
}

/* 画面幅が小さい時は縮小 */
@media (max-width: 576px) {
    .logo-img {
        max-height: 50px; /* スマホでは小さく */
    }
}

    </style>
    
    {{-- ▼▼▼ この行を追加 ▼▼▼ --}}
    @stack('styles')
</head>
<body>
<header>
    <div class="container-fluid py-3 text-center">
        <a href="{{ route('index') }}" class="h1 text-decoration-none text-dark d-flex align-items-center justify-content-center gap-2 flex-wrap">
            <img src="{{ asset('images/icon_images/icon3.png') }}" 
                 alt="ペットレス急 アイコン" 
                 class="logo-img icon-img">
            <img src="{{ asset('images/icon_images/logo3.png') }}" 
                 alt="ペットレス急 ロゴ" 
                 class="logo-img text-logo">
        </a>
    </div>
</header>


    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="text-center py-3 bg-light mt-4">
        {{-- ▼▼▼ フッターにコピーライトを追加 ▼▼▼ --}}
        <p class="mb-0 text-muted">&copy; {{ date('Y') }} ペットレス急. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- ▼▼▼ この行を追加 ▼▼▼ --}}
    @stack('scripts')
</body>
</html>