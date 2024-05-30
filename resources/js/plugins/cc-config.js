/**
 * @type {import('vanilla-cookieconsent').CookieConsentConfig}
 */
const config = {
    guiOptions: {
        consentModal: {
            layout: 'cloud', // box/cloud/bar
            position: 'middle center', // bottom/middle/top + left/right/center
        },
        preferencesModal: {
            layout: 'box',
        },
        force_consent: true,
    },
    manageScriptTags: true,
    disablePageInteraction: true,
    onFirstConsent: () => {
        location.reload();
    },

    categories: {
        necessary: {
            readOnly: true,
            enabled: true,
        },
        analytics: {
            autoClear: {
                cookies: [
                    {
                        name: /^(_ga|_gid|_gat)/,
                    },
                ],
            },
        },
    },

    language: {
        default: 'es',
        translations: {
            es: {
                consentModal: {
                    title: "🍪 Nuestras cookies!",
                    description:
                        'Hola, este sitio web utiliza cookies esenciales para garantizar su correcto funcionamiento y las otras cookies para saber como interactuar con la web.',
                    acceptAllBtn: 'Aceptar todas',
                    acceptNecessaryBtn: 'Aceptar necesarias',
                    // acceptNecessaryBtn: 'Reject',
                    showPreferencesBtn: 'Configuración',
                    closeIconLabel: 'Reject all and close',
                  //   footer: `
                  //     <a href="#link">Privacy Policy</a>
                  //     <a href="#link">Impressum</a>
                  // `,
                },
                preferencesModal: {
                    title: 'Cookie preferences',
                    acceptAllBtn: 'Aceptar todas',
                    acceptNecessaryBtn: 'Rechazar todas',
                    savePreferencesBtn: 'Guardar configuración',
                    sections: [
                        {
                            title : "Esta página web usa cookies 📢",
                            description: 'Las cookies de este sitio web se usan para personalizar el contenido y los anuncios, ofrecer funciones de redes sociales y analizar el tráfico. Además, compartimos información sobre el uso que haga del sitio web con nuestros partners de redes sociales, publicidad y análisis web, quienes pueden combinarla con otra información que les haya proporcionado o que hayan recopilado a partir del uso que haya hecho de sus servicios.'
                        },
                        {
                            title: "Cookies necesarias",
                            description: 'Las cookies necesarias ayudan a hacer una página web utilizable activando funciones básicas como la navegación en la página y el acceso a áreas seguras de la página web. La página web no puede funcionar adecuadamente sin estas cookies.',
                            linkedCategory: 'necessary',
                            cookieTable: {
                                headers: {
                                    name: 'Cookie',
                                    domain: 'Domain',
                                    desc: 'Description',
                                },
                                body: [
                                    {
                                        name: GlobalAppInfo.name + '_session',
                                        domain: '/',
                                        desc: 'Esta cookie encriptada que sirve para controlar que todos los envíos de formularios son realizados por el usuario actualmente en sesión, evitando ataques CSRF (Cross-Site Request Forgery).',
                                    },
                                    {
                                        name: `XSRF-TOKEN`,
                                        domain: '/',
                                        desc: 'Esta cookie se utiliza para distinguir entre humanos y bots. Esto es beneficioso para la web con el objeto de elaborar informes válidos sobre el uso de su web.',
                                    },
                                    {
                                        name: 'rc::a',
                                        domain: 'google.com',
                                        desc: 'Esta cookie se utiliza para distinguir entre humanos y bots. Esto es beneficioso para la web con el objeto de elaborar informes válidos sobre el uso de su web.',
                                    },
                                    {
                                        name: 'rc::c',
                                        domain: 'google.com',
                                        desc: 'Esta cookie se utiliza para distinguir entre humanos y bots.',
                                    },
                                    {
                                        name: 'cc_cookie',
                                        domain: '/',
                                        desc: 'Almacena el estado de consentimiento de cookies del usuario para el dominio actual',
                                    },
                                ]
                            }
                        },
                        {
                            title: "Cookies estadísticas",
                            description: 'Las cookies estadísticas ayudan a los propietarios de páginas web a comprender cómo interactúan los visitantes con las páginas web reuniendo y proporcionando información de forma anónima.',
                            linkedCategory: 'analytics',
                            cookieTable: {
                                headers: {
                                    name: 'Cookie',
                                    domain: 'Domain',
                                    desc: 'Description',
                                },
                                body: [
                                    {
                                        name: '_ga',
                                        domain: 'google.com',
                                        desc: 'Registra una identificación única que se utiliza para generar datos estadísticos acerca de cómo utiliza el visitante el sitio web.',
                                    },
                                    {
                                        name: '_gid',
                                        domain: 'google.com',
                                        desc: 'Utilizado por Google Analytics para controlar la tasa de peticiones',
                                    },
                                    {
                                        name: '_gat',
                                        domain: 'google.com',
                                        desc: 'Utilizado por Google Analytics para controlar la tasa de peticiones.',
                                    },
                                ],
                            },
                        },
                    ],
                },
            },
        },
    },
};

export default config;
