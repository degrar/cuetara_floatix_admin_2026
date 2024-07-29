<script setup>
    function injectFerreroFooter(){
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

        jQuery(document).ready(function () {
            jQuery('#nutella-embed-header').bdiHeader();
            jQuery('#nutella-embed-header-top').bdiTopHeader();
            jQuery('#nutella-embed-footer-pre').bdiPreFooter();
            jQuery('#nutella-embed-footer').bdiFooter();
            jQuery('#nutella-embed-copywrite').bdiCopy();
        });
    }

    document.addEventListener("DOMContentLoaded", function(event) {
        injectFerreroFooter();
    });

</script>

<template>
    <div id="nutella-footer" class="nutella-embed-container">
        <div class="container">
            <div class="region-footer" id="nutella-embed-footer"></div>
            <div class="region-copywrite" id="nutella-embed-copywrite"></div>
        </div>
    </div>

    <component is="script" src="https://www.nutella.com/es/es/header-footer.html?callback=localActivationProcessJson"></component>

    <component is="script" src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></component>

    <component is="script" src="https://www.nutella.com/es/es/header-footer.js"></component>

    <component is="script" src="https://static.addtoany.com/menu/page.js?t=1624611617" async></component>

</template>

<style scoped>

</style>