<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    >
    <title>{{ $title }}</title>

    <style type="text/css">
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        @media screen {
            div.divFooter {
                display: none;
            }
        }

        @media print {
            * {
                color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            @page {
                margin: 20px;
            }

            .container {
                width: 100% !important;
            }

            div.divFooter {
                bottom: 0;
                position: fixed;
            }
        }

        .container {
            width: 80%;
            margin: auto;
        }

        .text-center {
            text-align: center !important;
        }

        .text-md {
            font-size: 13px;
        }

        .uppercase {
            text-transform: uppercase !important;
        }

        .header,
        .header-space,
        .footer,
        .footer-space {
            height: 20px;
        }

    </style>

    @stack('styles')
</head>

<body onload="window.print();">
    {{ $slot }}
</body>

@stack('scripts')

</html>
