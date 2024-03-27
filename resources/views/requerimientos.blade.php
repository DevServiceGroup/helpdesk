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
        <label for="" class="mt-3">Prioridades</label>
        <select name="" id="prioridad-selector" class="form-control mt-1" style="max-width: 25%">
            <option value="" disabled selected></option>
            <option value="Alto">Alta</option>
            <option value="Medio">Media</option>
            <option value="Bajo">Baja</option>
        </select>
        <label class="m-3">Hay {{$requerimientos}} requerimientos completados y {{$requerimientossin}} sin completar</label class="m-3">
        <div id="cards-container" class="row pb-4"></div>
    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#prioridad-selector').change(function() {
            var prioridad = $(this).val();
            console.log(prioridad);

            $.ajax({
                url: '{{ route('ajax.requerimientos') }}',
                method: 'GET',
                data: {
                    prioridad: prioridad
                },
                success: function(data) {
                    mostrarRequerimientos(data);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        function mostrarRequerimientos(requerimientos) {
            var container = $('#cards-container'); // Selecciona el contenedor de los cards
            container.empty(); // Limpia el contenido actual del contenedor

            if (requerimientos && requerimientos.length > 0) {
                requerimientos.forEach(function(requerimiento) {
                    var card = $('<div class="card mt-4 mx-3" style="width: 18rem; max-height: 13rem; overflow-y: auto;">');
                    var cardBody = $('<div class="card-body">');
                    var titulo = $('<h5 class="card-title">').text(requerimiento.importancia);
                    var email = $('<h6 class="card-subtitle mb-2 text-body-secondary""></h6>').text(
                        requerimiento.email);
                    var descripcion = $('<p class="card-text">').text(requerimiento.requerimiento);
                    var cardFooter = $(
                        '<div class="card-footer" style="background: rgba(128, 128, 128, 0)">');
                    var enlace = $('<a>').addClass('btn btn-success').attr('href',
                        '/requerimientos/' + requerimiento.id).text('Completar');

                    cardBody.append(titulo);
                    cardBody.append(email);
                    cardBody.append(descripcion);
                    cardFooter.append(enlace);
                    card.append(cardBody);
                    card.append(cardFooter);
                    container.append(card);
                });
            } else {
                container.text('No hay requerimientos disponibles.');
            }
        }
    });
</script>


</html>
