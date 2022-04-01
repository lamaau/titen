<x-print-layout :title="'PACKING-LIST___' . now()">
    <div class="container">
        <x-print.cop
            title="PACKING LIST"
            :description="'TUJIAN ' . strtoupper($delivery->necessity->name)"
        />

        <x-print.table>
            <x-slot name="heading">
                <tr>
                    <th>NO</th>
                    <th>NAMA BARANG</th>
                    <th>VOL</th>
                    <th>SAT</th>
                    <th>KETERANGAN</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @forelse ($items as $index => $item)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->commodity_product?->unit->name }}</td>
                        <td>{{ $item->description }}</td>
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
