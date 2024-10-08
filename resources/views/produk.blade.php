<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan</title>
    <link rel="stylesheet" href="{{ asset('/css/produk.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard Penjualan</h2>
        <ul>
            <li><a href="{{ url('index') }}">Home</a></li>
            <li><a href="{{ url('produk') }}">Produk</a></li>
            <li><a href="#">Penjualan</a></li>
            <li><a href="#">Laporan</a></li>
            <li><a href="#">Pengaturan</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header style="display: flex; justify-content:space-between">
            <h1>Produk Penjualan</h1>
        </header>

        <!-- Product Grid -->
        <div class="product-grid">
            <!-- product card 1 -->
            @foreach ($produk as $item)
            <div class="product-card">
                <img src="https://via.placeholder.com/200" alt="produk 1">
                <h3>{{ $item->nama_produk }}</h3>
                <p class="price">{{$item->nama_produk}}</p>
                <p class="description">{{ $item->deskripsi}}</p>
                <button class="add-to-cart">Edit</button>
                <button class="cancel-to-cart">Delete</button>
            </div>
            @endforeach
{{--
            <!-- product card 2 -->
            <div class="product-card">
                <img src="https://via.placeholder.com/200" alt="produk 2">
                <h3>Produk 2</h3>
                <p class="price">Rp. 300.000</p>
                <p class="description">Deskripsi singkat Produk 2</p>
                <button class="add-to-cart">+</button>
                <button class="cancel-to-cart">-</button>
            </div>

            <!-- product card 3 -->
            <div class="product-card">
                <img src="https://via.placeholder.com/200" alt="produk 3">
                <h3>Produk 3</h3>
                <p class="price">Rp. 400.000</p>
                <p class="description">Deskripsi singkat Produk 3</p>
                <button class="add-to-cart">+</button>
                <button class="cancel-to-cart">-</button>
            </div>
        </div>
    </div> --}}

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Aplikasi Penjualan. All rights reserved.</p>
    </footer>
</body>
</html>
