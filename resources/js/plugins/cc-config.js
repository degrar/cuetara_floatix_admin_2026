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
        name: 'cc_cookie_text',
        // domain: location.hostname,
        // path: '/',
        // sameSite: "Lax",
        // expiresAfterDays: 365,
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
        console.log('onConsent fired!', cookie)
    },

    onChange: ({changedCategories, changedServices}) => {
        console.log('onChange fired!', changedCategories, changedServices);
    },

    onModalReady: ({modalName}) => {
        console.log('ready:', modalName);
    },

    onModalShow: ({modalName}) => {
        console.log('visible:', modalName);
    },

    onModalHide: ({modalName}) => {
        console.log('hidden:', modalName);
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
                        name: /^_ga/,   // regex: match all cookies starting with '_ga'
                    },
                    {
                        name: '_gid',   // string: exact cookie name
                    }
                ]
            },

            // https://cookieconsent.orestbida.com/reference/configuration-reference.html#category-services
            services: {
                ga: {
                    label: 'Google Analytics',
                    onAccept: () => {},
                    onReject: () => {}
                },
                youtube: {
                    label: 'Youtube Embed',
                    onAccept: () => {},
                    onReject: () => {}
                },
            }
        },
        ads: {}
    },

    language: {
        default: 'es',
        translations: {
            en: {
                consentModal: {
                    title: 'We use cookies',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
                    acceptAllBtn: 'Accept all',
                    acceptNecessaryBtn: 'Reject all',
                    showPreferencesBtn: 'Manage Individual preferences',
                    // closeIconLabel: 'Reject all and close modal',
                    footer: `
                        <a href="#path-to-impressum.html" target="_blank">Impressum</a>
                        <a href="#path-to-privacy-policy.html" target="_blank">Privacy Policy</a>
                    `,
                },
                preferencesModal: {
                    title: 'Manage cookie preferences',
                    acceptAllBtn: 'Accept all',
                    acceptNecessaryBtn: 'Reject all',
                    savePreferencesBtn: 'Accept current selection',
                    closeIconLabel: 'Close modal',
                    serviceCounterLabel: 'Service|Services',
                    sections: [
                        {
                            title: 'Your Privacy Choices',
                            description: `In this panel you can express some preferences related to the processing of your personal information. You may review and change expressed choices at any time by resurfacing this panel via the provided link. To deny your consent to the specific processing activities described below, switch the toggles to off or use the “Reject all” button and confirm you want to save your choices.`,
                        },
                        {
                            title: 'Strictly Necessary',
                            description: 'These cookies are essential for the proper functioning of the website and cannot be disabled.',

                            //this field will generate a toggle linked to the 'necessary' category
                            linkedCategory: 'necessary'
                        },
                        {
                            title: 'Performance and Analytics',
                            description: 'These cookies collect information about how you use our website. All of the data is anonymized and cannot be used to identify you.',
                            linkedCategory: 'analytics',
                            cookieTable: {
                                caption: 'Cookie table',
                                headers: {
                                    name: 'Cookie',
                                    domain: 'Domain',
                                    desc: 'Description'
                                },
                                body: [
                                    {
                                        name: '_ga',
                                        domain: location.hostname,
                                        desc: 'Description 1',
                                    },
                                    {
                                        name: '_gid',
                                        domain: location.hostname,
                                        desc: 'Description 2',
                                    }
                                ]
                            }
                        },
                        {
                            title: 'Targeting and Advertising',
                            description: 'These cookies are used to make advertising messages more relevant to you and your interests. The intention is to display ads that are relevant and engaging for the individual user and thereby more valuable for publishers and third party advertisers.',
                            linkedCategory: 'ads',
                        },
                        {
                            title: 'More information',
                            description: 'For any queries in relation to my policy on cookies and your choices, please <a href="#contact-page">contact us</a>'
                        }
                    ]
                }
            },
            es: {
                consentModal: {
                    title: '🍪 Nuestras cookies!',
                    description: 'Hola, este sitio web utiliza cookies esenciales para garantizar su correcto funcionamiento y las otras cookies para saber como interactuar con la web.',
                    acceptAllBtn: 'Aceptar todas',
                    acceptNecessaryBtn: 'Rechazar todas',
                    showPreferencesBtn: 'Gestionar preferencias individuales',
                    // closeIconLabel: 'Rechazar todas y cerrar el modal',
                    // footer: `
                    //     <a href="#path-to-impressum.html" target="_blank">Aviso legal</a>
                    //     <a href="#path-to-privacy-policy.html" target="_blank">Política de privacidad</a>
                    // `,
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
                                        desc: 'Descripción 1',
                                    },
                                    {
                                        name: '_gid',
                                        domain: location.hostname,
                                        desc: 'Descripción 2',
                                    }
                                ]
                            }
                        },
                        {
                            title: 'Segmentación y publicidad',
                            description: 'Estas cookies se utilizan para que los mensajes publicitarios sean más relevantes para ti y tus intereses. La intención es mostrar anuncios que sean relevantes y atractivos para el usuario individual y, por lo tanto, más valiosos para los editores y anunciantes de terceros.',
                            linkedCategory: 'ads',
                        },
                        {
                            title: 'Más información',
                            description: 'Para cualquier consulta relacionada con mi política de cookies y tus elecciones, por favor <a href="contacto">contáctanos</a>'
                        }
                    ]
                }
            }
        }
    }
};

export default config;

