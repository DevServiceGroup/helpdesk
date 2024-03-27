<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    </style>
    <style>
        body {
            background: wheat;
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        #derecha {
            float: right;
            top: 20px;
            right: 20px;
            z-index: 999;
            text-decoration-line: none;
            color: rgb(51, 0, 255);
            /* Asegura que esté por encima de otros elementos */
        }

        #contenedor {
            border-radius: 2%;
            border-top: 5px solid rgb(223, 0, 0);
            /* Borde superior de 2 píxeles de ancho y color rojo */
            border-left: none;
            /* No borde a la izquierda */
            border-right: none;
            /* No borde a la derecha */
            border-bottom: none;
            /* No borde en la parte inferior */
        }
    </style>
</head>

<body>
    <a id="derecha" class="mx-4 mt-2" href="/">Home</a>
    <div class="container mt-4" id="contenedor" style="background: rgb(235, 233, 233); height: 90%; ">
        <div id="cards-container" class="row pb-4">
            @if ($requerimientopersonales != null)
                @foreach ($requerimientopersonales as $requerimiento123)
                    <div class="card mt-4 mx-3" style="width: 18rem; max-height: 13rem; overflow-y: auto;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $requerimiento123->importancia }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $requerimiento123->email }}</h6>
                            <p class="card-text">{{ $requerimiento123->requerimiento }}</p>
                            <div class="card-footer" style="background: rgba(128, 128, 128, 0)">
                                Estado:{{ $requerimiento123->estado }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h6 class="m-4">Este correo no a solicitado ningun requerimiento</h6>
            @endif
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
