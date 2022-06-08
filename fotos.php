<?php
$album_id = $_POST['album_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Javascript - Fetch</title>

    <style>
        body {
            background-color: #e6dddd;
        }
    </style>
</head>

<body>
    <div class="container mt-4 shadow-lg p-3 mb-5 bg-body rounded">
        <h1> Fetch - Javascript</h1>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row g-3" id="album">
                </div>
            </div>
        </div>
        <a type="button" href="index.html" target="" rel="noopener noreferrer" class="btn btn-primary mt-2">Volver</a>
    </div>

    <div id="prueba"></div>

    <script>
        let url = "https://jsonplaceholder.typicode.com/photos/?albumId=<?= $album_id ?>";

        // TODO Uso async/await para hacer el fetch
        const request = async (url) => {
            const response = await fetch(url);
            if (!response.ok)
                throw new Error("Error: ", response.status);
            const data = await response.json();
            return data;
        }

        const mostrarData = (data) => {
            let body = "";
            data.forEach(album => {
                body += `
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex">
                        <div class="card shadow-sm">
                        <img src="${album.thumbnailUrl}" class="card-img-top" alt="${album.title}">
                        <div class="card-body">
                            <h3 class="card-title">${album.title}</h3>
                            <p class="card-text">URL: <a href="${album.url}">  ${album.url} </a></p>
                        </div>
                        </div>
                    </div>
                `
            });
            document.getElementById('album').innerHTML = body
        }

        // Mostrar los datos
        request(url)
            .then(data => mostrarData(data))
            .catch(error => console.log(error));
    </script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>