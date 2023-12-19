<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: whitesmoke;
            font-family: 'Times New Roman', Times, serif;
        }

        h2, p {
            text-align: center;
            color: red;
            margin-top: 50px;
        }

        .container-md {
            margin-top: 35px;
        }

        .image-container {
            display: flex;
            justify-content: space-between;
            overflow-x: auto;
            margin-bottom: 20px;
        }

        .image-item {
            width: 250px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 10px;
        }

        .col-3 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-1">
        <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
                <h2>Menu Makanan</h2>
                <p>Menu Makanan Di Kantin Tel-u</p>

                <div class="container">
                    <div class="image-container">
                        <img class="image-item" src="bakso.jpeg" alt="Bakso">
                        <img class="image-item" src="sushi.jpeg" alt="Sushi">
                        <img class="image-item" src="tahu.jpeg" alt="Tahu">
                        <img class="image-item" src="miayam.jpeg" alt="Mi Ayam">
                    </div>
                </div>

                <div class="container-md">
                    <div class="row">
                        <div class="col-3">
                            <h3>Bakso</h3>
                            <p><a href="deskripsi_bakso.html" target="_blank">Bakso dengan cita rasa alami</a></p>
                        </div>
                        <div class="col-3">
                            <h3>Sushi</h3>
                            <p><a href="deskripsi_bakso.html" target="_blank">Sush dengan cita rasa alami</a></p>
                        </div>
                        <div class="col-3">
                            <h3>Tahu</h3>
                            <p><a href="deskripsi_bakso.html" target="_blank">Tahu dengan cita rasa alami</a></p>
                            </div>
                        <div class="col-3">
                            <h3>Miayam</h3>
                            <p><a href="deskripsi_bakso.html" target="_blank">Miayam dengan cita rasa alami</a></p>
            
                        <!-- Tambahkan tautan untuk deskripsi_sushi.html, deskripsi_tahu.html, dan deskripsi_miayam.html sesuai kebutuhan -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional: Add Bootstrap JS for additional features -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-ZfMw8Uof7u8JvXmUsKGJ4L/gx4xjZF3u6Go5xZa0UJZ6qfuL5Xs5n5B1IYRDv0P" crossorigin="anonymous"></script>
</body>
</html>
