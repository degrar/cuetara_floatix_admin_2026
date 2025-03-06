/**
 * @type {import('vanilla-cookieconsent').CookieConsentConfig}
 */

/**
 * All config. options available here:
 * https://cookieconsent.orestbida.com/reference/configuration-reference.html
 */
const config = {

    // root: 'body',
    // autoShow: true,
    // disablePageInteraction: true,
    // hideFromBots: true,
    // mode: 'opt-in',
    // revision: 0,

    cookie: {
        name: 'cc_cookie',
        // domain: location.hostname,
        path: '/',
        // sameSite: "Lax",
        expiresAfterDays: 15,
    },

    // https://cookieconsent.orestbida.com/reference/configuration-reference.html#guioptions
    guiOptions: {
        consentModal: {
            layout: 'cloud',
            position: 'middle center', // bottom/middle/top + left/right/center
            equalWeightButtons: true,
            flipButtons: false
        },
        preferencesModal: {
            layout: 'box',
            equalWeightButtons: true,
            flipButtons: false
        },
        force_consent: true,
    },
    manageScriptTags: true,
    disablePageInteraction: true,

    onFirstConsent: ({cookie}) => {
        location.reload();
    },

    onConsent: ({cookie}) => {
        //console.log('onConsent fired!', cookie)
    },

    onChange: ({changedCategories, changedServices}) => {
        //console.log('onChange fired!', changedCategories, changedServices);
    },

    onModalReady: ({modalName}) => {
        //console.log('ready:', modalName);
    },

    onModalShow: ({modalName}) => {
        //console.log('visible:', modalName);
    },

    onModalHide: ({modalName}) => {
        //console.log('hidden:', modalName);
    },

    categories: {
        necessary: {
            enabled: true,  // this category is enabled by default
            readOnly: true  // this category cannot be disabled
        },
        analytics: {
            autoClear: {
                cookies: [
                    {
                        name: /^(_ga|_gid|_gat)/,
                    },
                ],
            },
            onConsent: () => {
                const script1 = document.createElement("script");
                script1.src = "https://www.googletagmanager.com/gtag/js?id=G-H25NTYLQXQ";
                script1.type = "text/plain";
                script1.setAttribute("data-category", "analytics");
                script1.setAttribute("data-service", "Google Analytics");
                document.head.appendChild(script1);

                const script2 = document.createElement("script");
                script2.type = "text/plain";
                script2.setAttribute("data-category", "analytics");
                script2.setAttribute("data-service", "Google Analytics");
                script2.innerHTML = `
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', 'G-H25NTYLQXQ');
            `;
                document.head.appendChild(script2);
            }
        },
        ads: {
            enabled: false,  // Esta categoría no se activará
            readOnly: true   // No se puede modificar
        }
    },

    language: {
        default: 'ca',
        translations: {
            ca: {
                consentModal: {
                    title: '🍪 Nuestras cookies!',
                    description: 'Hola, este sitio web utiliza cookies esenciales para garantizar su correcto funcionamiento y las otras cookies para saber como interactuar con la web.',
                    acceptAllBtn: 'Aceptar todas',
                    acceptNecessaryBtn: 'Rechazar todas',
                    showPreferencesBtn: 'Gestionar preferencias individuales',
                },
                preferencesModal: {
                    title: 'Gestionar preferencias de cookies',
                    acceptAllBtn: 'Aceptar todas',
                    acceptNecessaryBtn: 'Rechazar todas',
                    savePreferencesBtn: 'Aceptar la selección actual',
                    closeIconLabel: 'Cerrar',
                    serviceCounterLabel: 'Servicio|Servicios',
                    sections: [
                        {
                            title: 'Tus opciones de privacidad',
                            description: `En este panel puedes expresar algunas preferencias relacionadas con el tratamiento de tu información personal. Puedes revisar y cambiar las opciones expresadas en cualquier momento volviendo a este panel mediante el enlace proporcionado. Para denegar tu consentimiento a las actividades de tratamiento específicas descritas a continuación, cambia los interruptores a la posición de apagado o utiliza el botón "Rechazar todas" y confirma que deseas guardar tus elecciones.`,
                        },
                        {
                            title: 'Estríctamente necesarias',
                            description: 'Estas cookies son esenciales para el correcto funcionamiento del sitio web y no pueden ser desactivadas.',
                            linkedCategory: 'necessary'
                        },
                        {
                            title: 'Rendimiento y análisis',
                            description: 'Estas cookies recopilan información sobre cómo usas nuestro sitio web. Todos los datos están anonimizados y no se pueden utilizar para identificarte.',
                            linkedCategory: 'analytics',
                            cookieTable: {
                                caption: 'Tabla de cookies',
                                headers: {
                                    name: 'Cookie',
                                    domain: 'Dominio',
                                    desc: 'Descripción'
                                },
                                body: [
                                    {
                                        name: '_ga',
                                        domain: location.hostname,
                                        desc: 'Utilizada para recopilar datos anónimos del uso de sitio web.',
                                    },
                                    {
                                        name: '_gid',
                                        domain: location.hostname,
                                        desc: 'Utilizada para recopilar datos anónimos del uso de sitio web.',
                                    }
                                ]
                            }
                        },

                    ]
                }
            },
        }
    }
};

export default config;
