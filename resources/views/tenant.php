<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Pemesanan Makanan Online</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
}

.tenant-form label {
    display: block;
    margin-bottom: 5px;
}

.tenant-form input,
.tenant-form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
}

.tenant-form button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
}

.tenant-form button:hover {
    background-color: #45a049;
}

.daftar-tenant {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.tenant {
    width: calc(33.33% - 20px);
    margin: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    background-color: #fff;
    text-align: center;
}

.tenant img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
}

.tenant button {
    background-color: #4caf50;
    color: #fff;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    margin-top: 5px;
}

.tenant button:hover {
    background-color: #45a049;
}
</style>
</head>
<body>

<div class="container">
    <h2>Can - U</h2>
    <h3>Carilah makanan sesuka m-u</h3>

    <!-- Menampilkan daftar Tenant -->
    <div class="daftar-tenant">
        <div class="tenant">
            <img src="tenant1.jpg" alt="Tenant 1">
            <h3>Ayam Bakar Express</h3>
            <p>Paket Combo, Gratis Es Teh.</p>
            <button>Lihat Selengkapnya</button>
        </div>

        <div class="tenant">
            <img src="tenant2.jpg" alt="Tenant 2">
            <h3>Rumah masakan</h3>
            <p>Aneka nasi, Cepat Saji.</p>
            <button>Lihat Selengkapnya</button>
        </div>

        <div class="tenant">
            <img src="tenant3.jpg" alt="Tenant 3">
            <h3>Labbaik Sate</h3>
            <p>Sate, Bakso dan Soto.</p>
            <button>Lihat Selengkapnya</button>
        </div>

        <div class="tenant">
            <img src="tenant4.jpg" alt="Tenant 4">
            <h3>Bakso Merdeka</h3>
            <p>Aneka baso, Gratis Es Teh.</p>
            <button>Lihat Selengkapnya</button>
        </div>

        <div class="tenant">
            <img src="tenant5.jpg" alt="Tenant 5">
            <h3>Gulai Kambing</h3>
            <p>Soto, Gulai, Cepat Saji.</p>
            <button>Lihat Selengkapnya</button>
        </div>

        <div class="tenant">
            <img src="tenant6.jpg" alt="Tenant 6">
            <h3>Ayam L a Aroma</h3>
            <p>Minuman, Ayam, Bebek.</p>
            <button>Lihat Selengkapnya</button>
        </div>

        <!-- Tambahkan lebih banyak div .tenant sesuai dengan jumlah tenant -->
    </div>
</div>
</body>
</html>
