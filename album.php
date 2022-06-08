<?php
if (isset($_POST['usu_id'])) {
    $usu_id = $_POST['usu_id'];
} else {
    $usu_id = 0;
}
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
        <div class=" py-2  bg-light">
            <h1 class="p-3">Suggestions</h1>
            <div class="container" id="album">
            </div>
        </div>
        <a type="button" href="index.html" target="" rel="noopener noreferrer" class="btn btn-primary mt-2">Volver</a>
    </div>


    <script>
        let url = 'https://jsonplaceholder.typicode.com/albums';
        fetch(url)
            .then(response => response.json())
            .then(data => mostrarData(data))
            .catch(error => console.log(error))

        const mostrarData = (data) => {
            console.log(data)
            let body = "";
            data.forEach(album => {
                body += `
    <form action="fotos.php" method="post">
        <input type="hidden" name="album_id" value="${album.id}">

        <div class="mb-1 p-1 bg-body rounded shadow-sm">
            <div class=" text-muted"> Album N°${album.id}
                <div class="mb-0 small lh-sm w-100">
                    <div class="d-flex justify-content-between">
                    <strong class="text-gray-dark"> Titulo: ${album.title}</strong>
                        <div>
                            <button type="submit" class="btn btn-sm btn-outline-primary">Ver</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    `
    });

    document.getElementById('album').innerHTML = body
        }
    </script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>