<x-print-layout :title="'LAPORAN HARIAN___' . now()">
    <div class="container">
        <x-print.cop
            title="LAPORAN PEMBELIAN BARANG"
            :description="'TANGGAL ' . \Carbon\Carbon::parse($date)->translatedFormat('d F Y')"
        />

        <x-print.table>
            <x-slot name="heading">
                <tr style="padding: 10em 2px;">
                    <th>Kode Pembelian</th>
                    <th>Kebutuhan</th>
                    <th>Pemasok</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Catatan</th>
                    <th>Tanggal</th>
                    <th>Pembuat</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @forelse ($items as $index => $item)
                    <tr style="background-color: floralwhite">
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->necessity->name }}</td>
                        <td>{{ $item->supplier->name }}</td>
                        <td>{{ $item->description ?? '-' }}</td>
                        <td>{{ $item->commodity_items_count }}</td>
                        <td>{{ $item->employe?->name ?? '-' }}</td>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        <td>{{ $item->author->username }}</td>
                    </tr>
                    <tr style="background-color: aliceblue">
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Pembuat</th>
                    </tr>
                    @foreach ($item->commodity_items as $item)
                        <tr>
                            <td>{{ $item->product->product->name }}</td>
                            <td>{{ $item->price ?? '-' }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->product->category->name }}</td>
                            <td>{{ $item->product->unit->name }}</td>
                            <td>{{ $item->description ?? '-' }}</td>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            <td>{{ $item->author->username }}</td>
                        </tr>
                    @endforeach
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
            {{-- <x-slot name="tfoot">
                <tr style="font-weight: bold">
                    <td>Total</td>
                    @foreach ($items['meta'] as $key => $item)
                        <td>{{ $key === 'prices' ? 'Rp' : '' }} {{ format_number($item) }}</td>
                    @endforeach
                </tr>
            </x-slot> --}}
        </x-print.table>
    </div>
</x-print-layout>
