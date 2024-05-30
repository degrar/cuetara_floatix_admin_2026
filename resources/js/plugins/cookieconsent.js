import 'vanilla-cookieconsent/dist/cookieconsent.css';
import * as CookieConsent from 'vanilla-cookieconsent';
import config from './cc-config';

export default {
    install: (app) => {
        app.config.globalProperties.$CC = CookieConsent;
        app.config.globalProperties.$CC.run(config);
        window.cc = app.config.globalProperties.$CC;
    },
};
