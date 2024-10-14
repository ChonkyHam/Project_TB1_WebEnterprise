<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan</title>
    <link rel="stylesheet" href="{{ asset('/css/produk.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>


<style>
    .card-button {
        background-color: #007BFF; /* Blue background */
        color: #FFFFFF !important; /* Force white text */
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px; /* Rounded corners */
        cursor: pointer; /* Change cursor to pointer when hovering */
        text-decoration: none; /* Remove underline from the link */
    }

    .card-button:hover {
        background-color: #0056b3; /* Darker blue when hovering */
    }
</style>


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
            <div>
                <h1>Daftar Produk</h1>
                <p>Termukan Produk Terbaik Untuk Kebutuhan Anda</p>
            </div>

            <div>
                <button class="card-button"><a class="text-decoration-none text-wh" href="{{ url('/produk/add') }}">Add Product</a></button>
            </div>
        </header>

        <!-- Product Grid -->
        <div class="product-grid">
            <!-- product card 1 -->
            @foreach ($produk as $item)
            <div class="product-card">
                <img src="https://via.placeholder.com/200" alt="produk 1">
                <h3>{{ $item->nama_produk }}</h3>
                <p class="price">{{$item->harga}}</p>
                <p class="description">{{ $item->deskripsi}}</p>
                <button class="add-to-cart">Edit</button>

                <form action="{{ url('produk/delete', $item->kode_produk) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </div>
            @endforeach

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Aplikasi Penjualan. All rights reserved.</p>
    </footer>
</body>
</html>
