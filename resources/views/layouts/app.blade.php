<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ペットレス急')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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
    </style>
</head>
<body>
    <header>
        <div class="container-fluid py-3">
            <a href="#" class="h1 text-decoration-none text-dark">
                <i class="fas fa-paw text-orange me-2"></i><strong>ペットレス急</strong>
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
</body>
</html>