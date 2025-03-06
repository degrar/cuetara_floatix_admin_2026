<template>
    <component v-if="this.$CookieConsent.acceptedCategory('analytics')" is="script" async
               src="https://www.googletagmanager.com/gtag/js?id=G-H25NTYLQXQ"
    />
    <component v-if="this.$CookieConsent.acceptedCategory('analytics')" is="script">
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-H25NTYLQXQ');
    </component>
</template>