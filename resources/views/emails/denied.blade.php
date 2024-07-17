<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: inherit !important;
        }

        #MessageViewBody a {
            color: inherit;
            text-decoration: none;
        }

        p {
            line-height: inherit
        }

        .desktop_hide,
        .desktop_hide table {
            mso-hide: all;
            display: none;
            max-height: 0px;
            overflow: hidden;
        }

        .image_block img+div {
            display: none;
        }

        @media (max-width:770px) {
            .desktop_hide table.icons-inner {
                display: inline-block !important;
            }

            .icons-inner {
                text-align: center;
            }

            .icons-inner td {
                margin: 0 auto;
            }

            .image_block img.big,
            .row-content {
                width: 100% !important;
            }

            .mobile_hide {
                display: none;
            }

            .stack .column {
                width: 100%;
                display: block;
            }

            .mobile_hide {
                min-height: 0;
                max-height: 0;
                max-width: 0;
                overflow: hidden;
                font-size: 0px;
            }

            .desktop_hide,
            .desktop_hide table {
                display: table !important;
                max-height: none !important;
            }
        }
    </style>
</head>

<body style="margin: 0; background-color: #000000; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
<table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #000000;">
    <tbody>
    <tr>
        <td>
            <table class="row row-1" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #000000;">
                <tbody>
                <tr>
                    <td>
                        <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFEA01; color: #7D2A25; width: 600px;" width="750">
                            <tbody>
                            <tr>
                                <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
                                    <table class="image_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                        <tr>
                                            <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                                                <img align="center" border="0" src="{{ asset('assets/email/header.png') }}" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 600px;" width="600" height="278">
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="paragraph_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                        <tr>
                                            <td class="pad" style="padding-top:20px;padding-right:60px;padding-bottom:20px;padding-left:60px;">
                                                <p style="color: #7D2A25;text-align: left;font-family: Arial, 'sans-serif';font-size: 18px;">
                                                    ¡Hola de nuevo!
                                                    <br>
                                                    <br>
                                                    Lamentamos mucho comunicarte que tu participación no se ha validado correctamente porque no cumple con las condiciones especificadas en las bases de la promoción y que puedes
                                                    <a href="{{ route('legal') }}" style="text-decoration: underline;color: #7D2A25"><strong>consultar aquí</strong></a>.
                                                </p>
                                                <p style="color: #7D2A25;text-align: left;font-family: Arial, 'sans-serif';font-size: 18px;">
                                                    <strong>Tu premio se ha descartado por esta razón:</strong>
                                                </p>
                                                <p style="color: #7D2A25;text-align: left;font-family: Arial, 'sans-serif';font-size: 18px;font-weight: bold">
                                                    {{ $declineReason }}
                                                </p>
                                                <br>
                                                <br>
                                                <div>
                                                    <a href="{{ route('home') }}">
                                                        <img src="{{ asset('assets/email/footer.png') }}" alt="Equipo Kinder" style="height: 38px; width: 204px;" height="38" width="204">
                                                    </a>
                                                </div>
                                                <p style="color: #7D2A25;text-align: left;font-family: Arial, 'sans-serif';font-size: 12px">
                                                    Promoción válida en España para mayores de 18 años del 9/9/2024 al 9/11/2024. Máximo 1 participación por persona durante la promoción.
                                                    Se entregan por momento ganador 2 premios cada semana. Limitada a 1 premio por persona. Consulta bases legales y detalles de la promoción
                                                    <a href="{{ route('legal') }}" style="font-size: 12px;font-weight: bold;text-decoration: underline;color: #6B330F">aquí</a>.
                                                </p>
                                                <br>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table><!-- End -->
</body>

</html>
