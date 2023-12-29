<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 10px;
            background-color: #f8f9fa;
        }

        h1, h2 {
            margin-left: 10px;
            color: #343a40;
        }

        .add-menu-container {
            margin-left: 10px;
            margin-bottom: 20px;
        }

        .add-menu-button {
            display: block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px;
            padding: 10px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .menu-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px;
        }

        .menu-info {
            flex-grow: 1;
            text-align: left;
        }

        .menu-info h3 {
            margin-bottom: 10px;
            color: #343a40;
        }

        .menu-info p {
            color: #6c757d;
            margin-bottom: 5px;
        }

        .edit-button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        .mb-3 select {
            width: 100%;
        }
    </style>
</head>

<body>
    <h1>Daftar Menu</h1>
    <h2>Daftar Menu yang Tersedia</h2>

    <div class="add-menu-container">
        <button class="add-menu-button">Tambah Menu</button>
    </div>

    <div class="mb-3">
        <label for="asset-category" class="form-label">Kategori Menu</label>
        <select class="form-select" aria-label="Default select example">
            <option selected>Tersedia</option>
            <option value="1">Tidak Tersedia</option>
        </select>
    </div>

    <div class="menu-item">
        <img src="Mieayamjpeg" alt="Menu 1">
        <div class="menu-info">
            <h3>Nasi Goreng</h3>
            <p>Harga: Rp 25.000</p>
        </div>
        <button class="edit-button">Edit</button>
    </div>

    <div class="menu-item">
        <img src="Bakso.jpeg" alt="Menu 2">
        <div class="menu-info">
            <h3>Mie Ayam</h3>
            <p>Harga: Rp 20.000</p>
        </div>
        <button class="edit-button">Edit</button>
    </div>
</body>

</html>
