@inject('carbon', \Carbon\Carbon::class)

<!DOCTYPE html>
<html lang="id">

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

    <title>{{ $commodity['code'] . '-' . $carbon::now()->translatedFormat('dd-mm-yyyy-his') }}</title>
    <style type="text/css">
        @media print {
            @page {
                margin: 0;
                padding: 0;
                margin-top: 30px;
            }
        }

        .container {
            width: 100%;
            margin: auto;
        }

        .table-container {
            display: flex;
            justify-content: space-evenly
        }

        .table {
            margin-bottom: 18px;
        }

        .table,
        .table td,
        .table th {
            padding: 3px;
            border: 1.7px solid black;
        }

        .table {
            margin: 0;
            border-collapse: collapse;
        }

        .text-center {
            text-align: center;
        }

        .cop-container {
            display: flex;
            justify-content: space-between;
        }

        .cop-text {
            font-size: 12px;
        }

        .text-md {
            font-size: 13px;
        }

        .text-desc {
            font-size: 15px;
            text-decoration: underline;
        }

        .text-underline {
            text-decoration: underline;
        }

        .dep-ttd {
            display: flex;
            justify-content: space-around;
        }

        .dir-ttd {
            margin-top: 10%;
            text-align: center
        }

    </style>
</head>

<body onload="window.print()">
    <div class="container">
        <div class="table-container">
            @for ($i = 0; $i < 2; $i++)
                <div>
                    <div class="cop-container">
                        <h1 class="cop-text">PT. TAMAEL GRUP</h1>
                        <h1 class="cop-text">No: {{ $commodity['code'] }}</h1>
                    </div>
                    <div class="text-center">
                        <h1 class="text-desc">ORDER PEMBELIAN</h1>
                    </div>
                    <div>
                        <p style="margin-bottom: 5px;">
                            <span>Kepada Yth.</span>
                            <span style="display: block; font-weight: bold;margin-bottom: 3px;">Tk.
                                {{ $commodity['supplier'] }}</span>
                            Bersama ini kami kirimkan Order Pembelian, dengan rincian <br />
                            sebagai berikut:
                        </p>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Vol</th>
                                <th>Sat</th>
                                <th style="min-width: 3rem;">Harga</th>
                                <th style="min-width: 3rem;">Jumlah</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPrice = [];
                                $totalCalculatedPrice = [];
                            @endphp
                            @foreach ($commodity['items'] as $item)
                                <tr>
                                    <td class="text-md text-center">{{ $loop->iteration }}</td>
                                    <td class="text-md">{{ $item->product->product->name }}</td>
                                    <td class="text-md text-center">{{ $item->stock }}</td>
                                    <td class="text-md text-center">{{ $item->product->unit->name }}</td>
                                    <td class="text-md text-center">
                                        @php
                                            $totalPrice[] = $item->price;
                                        @endphp
                                        {{ $item->price == 0 ? '' : format_number($item->price) }}
                                    </td>
                                    <td class="text-md text-center">
                                        @php
                                            $totalCalculatedPrice[] = $calc = clean_number($item->price) * clean_number($item->stock);
                                        @endphp
                                        {{ $calc == 0 ? '' : format_number($calc) }}
                                    </td>
                                    <td class="text-md">
                                        {{ strlen($item->description) ? $item->description : '' }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td
                                    class="text-center text-md"
                                    colspan="5"
                                >Total</td>
                                <td class="text-center text-md">
                                    {{ array_sum($totalCalculatedPrice) == 0 ? '' : format_number(array_sum($totalCalculatedPrice)) }}
                                </td>
                                <td class="text-center text-md">-</td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="display: flex; width: 100%; text-align: center;margin-top: .8rem;">
                        <p style="line-height: 1.4rem;margin-top: 0;max-width: 13rem;">
                            Order ini untuk keperluan:
                            <span style="display: block; text-align: center;font-weight: bold">
                                {{ $commodity['necessity'] }}
                                @isset($commodity['requester'])
                                    / {{ $commodity['requester'] }}
                                @endisset
                            </span>
                            <span>Ternate, {{ $carbon::now()->translatedFormat('d F Y') }}</span>
                        </p>
                    </div>
                    <div class="dep-ttd">
                        <div class="text-center">
                            <p class="text-underline">Logistik</p>
                        </div>
                        <div style="align-self: flex-end;">
                            <p class="text-underline">Keuangan</p>
                        </div>
                    </div>
                    <div class="dir-ttd">
                        <p style="display: flex; flex-direction: column">
                            <span class="text-underline">
                                {{ $commodity['director'] }}
                            </span>
                            <span>Direktur</span>
                        </p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</body>

</html>
