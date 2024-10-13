<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/app.css">
    <script>
        window.Laravel ={
            csrfToken: "{{ csrf_token() }}"
        }
    </script>
    <title>Mi sitio</title>
</head>
<body>

  <h1>{{ activeMenu('/') ? 'Esta en el home' : 'NO esta en el home' }}</h1>

    <header>
        <nav>
            <a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Inicio</a>
            <a class="{{ activeMenu('saludos/*')  }}" href="{{ route('saludos', 'Jorge') }}">Saludos</a>
            <a class="{{ activeMenu('messages/create') }}" href="{{ route('messages.create') }}">Contacto</a>
            <a class="{{ activeMenu('messages') }}" href="{{ route('messages.index') }}">Mostrar mensajes</a>

        </nav>
    </header>

    <div class="container">
        @yield('contenido')

        <footer>Copyright ® {{ date('Y') }}</footer>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>