<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mantenedores</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>

    <style>
        body {
            font-family: 'Raleway';
            margin-top: 25px;
        }

        button .fa {
            margin-right: 6px;
        }

        .table-text div {
            padding-top: 6px;
        }
    </style>

    <script>
        $(function () {
            $('#task-name').focus();
        });
    </script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{ url('/') }}">Inicio</a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('clientes') }}">Clientes</a></li>
                        <li><a href="{{ url('proveedores') }}">Proveedores</a></li>
                        <li><a href="{{ url('almacenes') }}">Almacenes</a></li>
                        <li><a href="{{ url('materiales') }}">Materiales</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    @yield('content')
</body>
</html>