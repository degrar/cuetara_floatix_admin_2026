<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title inertia>Gana un viaje a Japón y fantásticos regalos cada día.</title>
    <meta name="robots" content="noindex,nofollow">
    <meta name="keywords" content="Participa con cada Yatekomo. Sorteamos <sup>©</sup>NINTENDOS SWITCH o suscripciones a plataformas de streaming cada día. Además, entre todos los participantes regalamos ¡un viaje a Japón!">
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

    <script>
        (function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="Xq47mWRB1Usl94Hqt0mVh";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
    </script>

    <!-- OneTrust Cookies Consent Notice start for promo.yatekomo.es -->
    <script src=https://cdn.cookielaw.org/scripttemplates/otSDKStub.js  type="text/javascript" charset="UTF-8" data-domain-script="0194f5f2-e81a-723c-9c0e-49541f66e5ba" ></script>

    <script type="text/javascript">
        function OptanonWrapper() { }
    </script>
    <!-- OneTrust Cookies Consent Notice end for promo.yatekomo.es -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-H25NTYLQXQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-H25NTYLQXQ');
    </script>

    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead

</head>
<body class="font-rubik font-normal text-brown antialiased " lang="es-ES">

@inertia

</body>
</html>
