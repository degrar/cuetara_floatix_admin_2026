<!DOCTYPE html>
<html dir="ltr" lang="es-ES">
    <head>
        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <link rel="preload" href="https://www.nutella.com/es/es/header-footer.html?callback=localActivationProcessJson" as="script">

        <script src="https://unpkg.com/floating-vue@^2.0.0-beta.1"></script>
        <link rel="stylsheet" href="https://unpkg.com/floating-vue@^2.0.0-beta.1/dist/style.css" />

        <!-- Ferrero -->
        <link rel="apple-touch-icon" sizes="180x180"href='{{ asset('ferrero/images/favicon/apple-touch-icon.png') }}'>
        <link rel="icon" type="image/png" sizes="32x32" href='{{ asset('ferrero/images/favicon/favicon-32x32.png') }}'>
        <link rel="icon" type="image/png" sizes="16x16" href='{{ asset('ferrero/images/favicon/favicon-16x16.png') }}'>
        <link rel="manifest" href='{{ asset('ferrero/images/favicon/site.webmanifest') }}'>
        <link rel="mask-icon" href='{{ asset('ferrero/images/favicon/safari-pinned-tab.svg') }}' color="#5bbad5">
        <link rel="shortcut icon" href='{{ asset('ferrero/images/favicon/favicon.ico') }}'>
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-config" content='{{ asset('ferrero/images/favicon/browserconfig.xml') }}'>
        <meta name="theme-color" content="#e20019">

        <link rel="stylesheet" href='{{ asset('ferrero/css/header-footer.css') }}' >

        @routes
        @if(app()->isProduction())
            <script type='application/javascript'>
                Ziggy.url = 'https://www.nutella.com'
            </script>
        @endif
	    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead


    </head>
    <body class="font-roboto antialiased" lang="es-ES">

        @inertia
        


        <!-- Nutella -->

        <div class="region-footer-pre" id="nutella-embed-footer-pre"></div>
        <footer id="nutella-footer" class="nutella-embed-container">
            <div class="container">
                <div class="region-footer" id="nutella-embed-footer"></div>
                <div class="region-copywrite" id="nutella-embed-copywrite"></div>
            </div>
        </footer>



        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

        <script src="https://www.nutella.com/es/es/header-footer.js"></script>

        <script src="https://static.addtoany.com/menu/page.js?t=1624611617" async></script>

        <script>
            // You are allowed to override block's configuration. List here blocks which you want to attach to header and footer.
            bdiHeaderFooterConfig.header_top.blocks = [
                "headersociallinksblock"
            ];
            bdiHeaderFooterConfig.header.blocks = [
                "nutella20_theme_branding", "nutella20_theme_main_menu"
            ];
            bdiHeaderFooterConfig.footer_pre.blocks = [
                "addtoanybuttons", "newslettersubscription"
            ];

            bdiHeaderFooterConfig.footer.blocks = [
                "nutella20_theme_footer", "mainnavigation", //scripts,
            ];
            bdiHeaderFooterConfig.copywrite.blocks = [
                "changecountryblock", "headersociallinksblock_2", "copyright", "badges"
            ];

            window.addEventListener('load', function () {
                jQuery('#nutella-embed-header').bdiHeader();
                jQuery('#nutella-embed-header-top').bdiTopHeader();
                jQuery('#nutella-embed-footer-pre').bdiPreFooter();
                jQuery('#nutella-embed-footer').bdiFooter();
                jQuery('#nutella-embed-copywrite').bdiCopy();
            });
        </script>

        <script type="application/javascript" src="https://www.nutella.com/es/es/header-footer.html?callback=localActivationProcessJson"></script>


    </body>
</html>
