<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpesk</title>
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

        .border-custom {
            border-top: 5px solid #ccc;
            border-bottom: 0px;
            border-left: 0px;

            border-right: 0px;
        }

        #input-email {
            border-top: 0;
            border-left: 0;
            border-right: 0;
            border-radius: 0;
            border-color: rgba(128, 128, 128, 0.438);
            padding: 1%;
        }

        #input-email:focus {
            border-color: red;
            box-shadow: 0 0 0 0 rgba(255, 0, 0, 0);
            /* Añadir sombra para resaltar */
        }

        #enviar {
            background: rgb(255, 0, 0);
        }
        #derecha {
            position: fixed;
            float: right;
            top: 20px;
            right: 20px;
            z-index: 999;
            text-decoration-line: none;
            color: rgb(71, 25, 131)
        }
    </style>
</head>

<body>
    @if (Auth::check())
        <a id="derecha" class="mx-4" href="{{route('requerimientos.index')}}" style="color: rgb(51, 0, 255)"><h6>Ver requerimientos</h6></a>
    @else
        <a id="derecha" class="mx-4" data-toggle="modal" data-target="#exampleModal">Login</a>
    @endif
    <div class="container mt-4">
        <div class="card text border-danger mb-3 mb-3 m-auto border-custom" style="max-width: 60%;">
            <div class="card-header" style="background-color: white;">
                <h3>Helpdesk Área de SITI</h3>
                <p>Sistema de soporte técnico especializado en resolver problemas y brindar asistencia relacionada con
                    el uso de sistemas informáticos, software, redes y tecnologías de la información dentro de una
                    organización.</p>
            </div>
            <h6 class="card-header p-4" style="color: red; background-color: white; font-size: medium;">* Indica que la
                pregunta es obligatoria</h6>
            <!-- <h5 class="card-title">Primary card title</h5> -->

        </div>
    </div>
    <form action="{{ route('requerimientos.store') }}" method="post">
        @csrf
        <div class="container mt-4">
            <div class="card text mb-3 mb-3 m-auto" style="max-width: 60%;">
                <div class="mx-4 mt-4" style="background-color: white;">Ingrese su correo electronico</div>
                <input type="email" class="form-control m-3 mb-4" name="email" placeholder="Tu respuesta"
                    id="input-email" style="max-width: 30%;">
            </div>
        </div>
        <div class="container mt-4">
            <div class="card text mb-3 mb-3 m-auto" style="max-width: 60%;">
                <div class="mx-4 mt-4" style="background-color: white;">Digita el requerimiento</div>
                <input type="text" class="form-control m-3 mb-4" name="requerimiento" placeholder="Tu respuesta"
                    id="input-email" style="max-width: 90%;">

            </div>
        </div>
        <div class="container mt-4">
            <div class="card text mb-3 mb-3 m-auto" style="max-width: 60%;">
                <div class="mx-4 mt-4" style="background-color: white;">Nivel de Urgencia</div>
                <div class="form-check">
                    <div class="form-check mt-3">
                        <input class="form-check-input" name="importancia" type="radio" value="Alto"
                            id="altoCheckbox">
                        <label class="form-check-label" for="altoCheckbox">
                            Alto
                        </label>
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" name="importancia" type="radio" value="Medio"
                            id="medioCheckbox">
                        <label class="form-check-label" for="medioCheckbox">
                            Medio
                        </label>
                    </div>
                    <div class="form-check mt-3 mb-4">
                        <input class="form-check-input" name="importancia" type="radio" value="Bajo"
                            id="bajoCheckbox">
                        <label class="form-check-label" for="bajoCheckbox">
                            Bajo
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="card text mb-3 mb-3 m-auto" style="max-width: 60%;">
                <div class="mx-4 mt-4" style="background-color: white;">Ingresa cual es tu empresa</div>
                <input type="text" class="form-control m-3 mb-4" name="empresa" placeholder="Tu respuesta"
                    id="input-email" style="max-width: 90%;">

            </div>
        </div>
        <div class="container mt-3">
            <div class="mb-3 mb-3 m-auto" style="max-width: 60%;">
                <button type="submit" class="btn btn-danger" id="enviar">Enviar</button>
            </div>
        </div>
    </form>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('login.store') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group m-1">
                            <label for="">Email</label>
                            <input type="email" required class="form-control" name="email" id=""
                                aria-describedby="emailHelpId" placeholder="">
                        </div>
                        <div class="form-group m-1">
                            <label for="">Password</label>
                            <input type="password" required class="form-control" name="password" id=""
                                placeholder="">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
            </form>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('error') == 'nopass')
    <script>
        Swal.fire({
            title: "Error!",
            text: "Contraseña Incorrecta!",
            icon: "error"
        });
    </script>
@endif
@if (session('ok') == 'ok')
    <script>
        Swal.fire({
            title: "Correcto!",
            text: "Creado Correctamente!",
            icon: "success"
        });
    </script>
@endif
@if (session('ok') == 'error')
    <script>
        Swal.fire({
            title: "Error!",
            text: "Ocurrio un error intentalo de nuevo!",
            icon: "error"
        });
    </script>
@endif
@if (session('error') == 'nouser')
    <script>
        Swal.fire({
            title: "Error!",
            text: "Email o contraseña incorrectos!",
            icon: "error"
        });
    </script>
@endif
@if (session('error') == 'nodatos')
    <script>
        Swal.fire({
            title: "Error!",
            text: "Completa todos los datos!",
            icon: "error"
        });
    </script>
@endif

</html>
