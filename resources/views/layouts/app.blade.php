<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '動物病院検索')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { background-color: #f8f9fa; }
        .hospital-card-img {
            aspect-ratio: 16 / 10;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-paw"></i> 動物病院一覧
                </a>
            </div>
        </nav>
    </header>

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="text-center py-3 bg-light mt-4">
        <p class="mb-0">&copy; 2025 Animal Hospital Search. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>