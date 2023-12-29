<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Telu</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #343a40;
            color: white;
        }

        header, nav {
            background-color: red;
            padding: 1px;
            text-align: center;
        }

        nav {
            overflow: hidden;
        }

        nav a, .button, .feedback-button {
            display: inline-block;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            background-color: grey;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-menu-container {
            margin-top: 20px;
            text-align: left;
            padding: 0 20px;
        }

        .search-menu-form {
            display: flex;
            align-items: center;
        }

        .search-menu-input {
            margin-right: 10px;
        }

        .menu-container {
            padding: 20px;
            text-align: center;
        }

        .menu-title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
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
        }

        .menu-info p {
            color: #6c757d;
        }

        .buy-button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        footer {
            background-color: #FF0000;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Kantin Telu</h1>
        <h2>Jl. Telekomunikasi No. 1, Terusan Buah Batu Bandung</h2>
    </header>

    <nav>
        <a href="home.html" class="button"> HOME </a>
        <a href="menu.html" class="button"> MENU </a>
        <a href="feedback.html" class="feedback-button">Feedback</a>
    </nav>

    <div class="search-menu-container">
        <h2>Cari Menu</h2>
        <form class="search-menu-form">
            <input type="text" id="searchMenuInput" class="search-menu-input" placeholder="Nama Menu">
            <input type="submit" value="Cari" class="search-menu-submit">
        </form>
    </div>

    <div class="menu-container">
        <h1 class="menu-title">Daftar Menu</h1>

        <div class="menu-item">
            <img src="bakso.jpeg" alt="Menu 1">
            <div class="menu-info">
                <h3>Bakso Beranak</h3>
                <p>Harga: Rp 25.000</p>
                <p>Deskripsi: Bakso beranak spesial dengan bumbu yang enak</p>
            </div>
            <a href="pembayaran.php" class="buy-button"> Beli </a>
        </div>

        <div class="menu-item">
            <img src="miayam.jpeg" alt="Menu 2">
            <div class="menu-info">
                <h3>Mie Ayam</h3>
                <p>Harga: Rp 20.000</p>
                <p>Deskripsi: Mie ayam dengan kuah gurih dan ayam panggang.</p>
            </div>
            <a href="pembayaran.php" class="buy-button"> Beli </a>
        </div>

        <div class="menu-item">
            <img src="tahu.jpeg" alt="Menu 3">
            <div class="menu-info">
                <h3>Tahu Goreng Crispy</h3>
                <p>Harga: Rp 50.000</p>
                <p>Deskripsi: Tahu yang Digoreng garing memberikan cita rasa yang memuaskan.</p>
            </div>
            <a href="pembayaran.php" class="buy-button"> Beli </a>
        </div>

        <div class="menu-item">
            <img src="esteh.jpeg" alt="Menu 4">
            <div class="menu-info">
                <h3>Esteh</h3>
                <p>Harga: Rp 3.000</p>
                <p>Deskripsi: Esteh yang dibuat dengan hati memberikan cita rasa yang memuaskan.</p>
            </div>
            <a href="pembayaran.php" class="buy-button"> Beli </a>
        </div>
    </div>

    <footer>
        <p>&copy; 2023 Manajemen MENU Can-U</p>
    </footer>
</body>

</html>
