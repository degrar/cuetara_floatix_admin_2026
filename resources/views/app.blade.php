<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Ferrero -->
        <link rel='stylesheet' href='{{ asset('ferrero/css/header-footer.css') }}' media='all'>

        <meta name="theme-color" content="#e20019">

        <link href='https://www.kinder.com/es/header-footer.html?callback=localActivationProcessJson' rel='preload' as='script'>
        <script src='https://www.kinder.com/es/sites/kinder_es/files/google_tag/primary/google_tag.script.js'></script>
        <noscript aria-hidden="true"><iframe src=https://www.googletagmanager.com/ns.html?id=GTM-PQNTV62 height="0" width="0" title="Google Tag Manager">Google Tag Manager</iframe></noscript>

        @routes
{{--        <script type='application/javascript'>--}}
{{--            Ziggy.url = 'https://www.kinder.com'--}}
{{--        </script>--}}
	    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-roboto antialiased" lang="es-ES">

        @inertia


        <!-- Ferrero -->
        <div class="footer-wrapper"><div id='footer'></div></div>
        <!-- This is external library needed for the Menu and footer. -->
        <script src="//code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!-- The src should be changed with your domain for example. -->
        <script src='//www.kinder.com/es/header-footer.js'></script>
        <script>
            // You are allowed to override block's configuration. List here blocks which you want to attach to header and footer.
            bdiHeaderFooterConfig.header.blocks = [
                "kinder_theme_branding", "mainnavigation"
            ];

            // If you use only one language remove "kinder_theme_languageswitchercontent"
            bdiHeaderFooterConfig.footer.blocks = [
                "kinder_theme_footer_copyright", "kinder_theme_footer", "kinder_theme_languageswitchercontent", "internationalglobe"
            ];
            jQuery(document).ready(function () {
                jQuery('#header').bdiHeader();
                jQuery('#footer').bdiFooter();
            });

        </script>

        <script type='application/javascript' src='//www.kinder.com/es/header-footer.html?callback=localActivationProcessJson'></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js'></script>

        <!-- This js file contains Menu and Footer JS. -->
{{--        <script src='/ferrero/js/header-footer.js'></script>--}}
        <script async src="https://static.addtoany.com/menu/page.js"></script>

    </body>
</html>
