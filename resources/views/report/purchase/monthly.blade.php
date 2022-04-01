<x-print-layout :title="'LAPORAN BULANAN___' . now()">
    <div class="container">
        <x-print.cop
            title="LAPORAN PEMBELIAN BARANG"
            :description="'BULAN ' . strtoupper($params['month']) . ' TAHUN ' . $params['year']"
        />

        <x-print.table>
            <x-slot name="heading">
                <tr>
                    <th>Tanggal</th>
                    <th>Volume Transaksi</th>
                    <th>Volume Barang</th>
                    <th>Total Biaya</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @forelse ($items['data'] as $index => $item)
                    <tr>
                        <td>{{ $item['c_created_at_text'] }}</td>
                        @if (!is_null($item))
                            <td>{{ format_number($item['times']) }}</td>
                            <td>{{ format_number($item['stocks']) }}</td>
                            <td>Rp {{ format_number($item['prices']) }}</td>
                        @else
                            <td>0</td>
                            <td>0</td>
                            <td>Rp 0</td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td
                            colspan="6"
                            style="color: lightgray;text-align: center"
                        >
                            {{ __('Tidak menemukan data untuk ditampilkan') }}
                        </td>
                    </tr>
                @endforelse
            </x-slot>
            <x-slot name="tfoot">
                <tr style="font-weight: bold">
                    <td>Total</td>
                    @foreach ($items['meta'] as $key => $item)
                        <td>{{ $key === 'prices' ? 'Rp' : '' }} {{ format_number($item) }}</td>
                    @endforeach
                </tr>
            </x-slot>
        </x-print.table>
    </div>
</x-print-layout>
