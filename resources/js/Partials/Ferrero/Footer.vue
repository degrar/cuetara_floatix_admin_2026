<script setup>
    function injectFerreroFooter(){
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
    }

    document.addEventListener("DOMContentLoaded", function(event) {
        injectFerreroFooter();
    });

</script>

<template>
    <div id='footer'></div>


<!--    <component is="script" src='/ferrero/js/header-footer.js'></component>-->
    <component is="script" src='https://www.kinder.com/es/header-footer.js'></component>

    <component is="script" type='application/javascript' src='//www.kinder.com/es/header-footer.html?callback=localActivationProcessJson'></component>
    <component is="script" src='//cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js'></component>

    <component is="script" async src="//static.addtoany.com/menu/page.js"></component>
</template>

<style scoped>

</style>