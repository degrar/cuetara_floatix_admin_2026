<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title inertia>Gana un viaje a Japón y fantásticos regalos cada día.</title>
    <meta name="robots" content="noindex,nofollow">
    <meta name="keywords" content="Participa con cada Yatekomo. Sorteamos NINTENDOS SWITCH o suscripciones a plataformas de streaming cada día. Además, entre todos los participantes regalamos ¡un viaje a Japón!">
    <meta name="description" content="Yatekomo, sorteo, momento ganador, Nintendo, premio, Japón, Netflix.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('assets/images/favicon/site.webmanifest') }}" />

    <script>
        const GlobalAppInfo = {
            name: '{{ Str::lower(config('app.name')) }}'
        };
    </script>

    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead

</head>
<body class="font-rubik font-normal text-brown antialiased " lang="es-ES">

@inertia

</body>
</html>
