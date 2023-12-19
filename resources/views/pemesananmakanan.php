<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

header, footer {
    text-align: center;
    padding: 1em 0;
}

.menu {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 2em;
}

.menu-item {
    border: 1px solid #ddd;
    padding: 1em;
    margin: 1em;
    text-align: center;
}

.menu-item img {
    width: 100%;
    max-height: 150px;
    object-fit: cover;
    margin-bottom: 0.5em;
}

.keranjang {
    padding: 2em;
}

#keranjang-list {
    list-style: none;
    padding: 0;
}

#keranjang-list li {
    border-bottom: 1px solid #ddd;
    padding: 1em;
    display: flex;
    justify-content: space-between;
}

footer {
    text-align: center;
    padding: 1em 0;
}

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Pemesanan Makanan Can-U</title>
</head>
<body>
    <div class="bg-danger">
    <header style="background-color: #FF0000;"> 
        <h1 style="color: white;">Pemesanan Makanan Can-U</h1> 
    </header> 
    
    <section class="menu">
        <!-- Tampilkan daftar menu makanan -->
        <div class="menu-item">
            <img src="food1.jpg" alt="Nama Makanan 1">
            <h3>Nama Makanan 1</h3>
            <p>Deskripsi singkat makanan dan harga</p>
            <button onclick="tambahKeKeranjang(1)">Tambah ke Keranjang</button>
        </div>

        <!-- Item-menu lainnya -->

    </section>

    <section class="keranjang">
        <h2>Keranjang Pemesanan</h2>
        <ul id="keranjang-list">
            <!-- Daftar item di keranjang -->
        </ul>
        <p>Total Harga: <span id="total-harga">0</span></p>
        <button onclick="prosesPemesanan()">Proses Pemesanan</button>
    </section>

    <footer style="background-color: #FF0000; color: white;">
        <p>&copy; 2023 Pemesanan Makanan Can-U</p>
    </footer>

    <script src="script.js"></script>
</div>
</body>
</html>
