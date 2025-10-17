<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/light-bootstrap-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow border-0" >
        <div class="card-body">
            <div class="text-center mb-4">
                <h1 class="text-gray-900">Bienvenido</h1>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="user" action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <input type="email" name="email" id="email"
                        class="form-control form-control-user"
                        placeholder="Correo electrónico"
                        value="{{ old('email') }}" required>
                </div>
                <div class="form-group mb-4">
                    <input type="password" name="password" id="password"
                        class="form-control form-control-user"
                        placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Ingresar
                </button>
            </form>
        </div>
    </div>

</body>
</html>