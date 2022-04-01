<x-print-layout :title="Str::slug($necessity->name) . '___' . now()">
    <div class="container">
        <x-print.cop
            :title="'DAFTAR BARANG BERDASARKAN KEBUTUHAN'"
            :description="'KEBUTUHAN: ' . $necessity->name"
        />

        <x-print.table>
            <x-slot name="heading">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Pemasok</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Keterangan</th>
                    <th>Pembuat</th>
                    <th>Tanggal</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @forelse ($rows as $index => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td align="left">{{ $item->product->product->name }}</td>
                        <td>{{ $item->commodity->supplier->name }}</td>
                        <td align="center">{{ $item->price }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->description ?: '-' }}</td>
                        <td>{{ $item->author->username }}</td>
                        <td>{{ $item->created_at->format('d/m/y') }}</td>
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
        </x-print.table>
    </div>
</x-print-layout>
