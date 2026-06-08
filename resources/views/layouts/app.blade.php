<!DOCTYPE html>
<html>

<head>
    <title>Frozeria</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                Frozeria
            </a>

            <div>

                <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">
                    Dashboard
                </a>

                <a href="{{ route('kategori.index') }}" class="btn btn-light btn-sm">
                    Kategori
                </a>

                <a href="{{ route('barang.index') }}" class="btn btn-light btn-sm">
                    Barang
                </a>

            </div>

        </div>

    </nav>

    <div class="container py-4">

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
