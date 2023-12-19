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

.daftar-tenant {
    padding: 2em;
}

.tenant-item {
    border: 1px solid #ddd;
    padding: 1em;
    margin: 1em;
}

.tambah-tenant {
    padding: 2em;
}

form {
    display: flex;
    flex-direction: column;
}

form label {
    margin-bottom: 0.5em;
}

footer {
    text-align: center;
    padding: 1em 0;
}
    
    <link rel="stylesheet" href="styles.css">
    </style>
    <title>Manajemen Tenant Can-U</title>
</head>
<body>
    <header style="background-color: #FF0000;">
        <h1 style="color: white;">Tenant Can-U</h1>
    </header>
    
    <section class="daftar-tenant">
        <h2>Daftar Tenant</h2>
        <!-- Tampilkan daftar tenant dengan opsi pengelolaan -->
        <div class="tenant-item">
            <h3>Nama Tenant 1</h3>
            <p>Deskripsi singkat tentang tenant dan menu yang ditawarkan.</p>
            <button onclick="editTenant(1)">Edit</button>
            <button onclick="hapusTenant(1)">Hapus</button>
        </div>

        <!-- Tenant lainnya -->

    </section>

    <section class="tambah-tenant">
        <h2>Tambah Tenant Baru</h2>
        <form>
            <label for="nama-tenant">Nama Tenant:</label>
            <input type="text" id="nama-tenant" name="nama-tenant" required>
            <label for="deskripsi-tenant">Deskripsi Tenant:</label>
            <textarea id="deskripsi-tenant" name="deskripsi-tenant" rows="4" required></textarea>

            <button type="submit">Tambah Tenant</button>
        </form>
    </section>

    <footer style="background-color: #FF0000; color: white;">
        <p>&copy; 2023 Manajemen Tenant Can-U</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>