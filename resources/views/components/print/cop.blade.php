@props(['title', 'description', 'separatorBorderHeight' => 2, 'separatorBorderWidth' => 100, 'titleBorderHeight' => 2, 'titleBorderWidth' => 100])

<div class="cop-container">
    <div style="width: 100%">
        <img
            width="80"
            alt="Tamael Grup Ternate"
            src="{{ asset('images/tamael.jpg') }}"
        />
        <h1 class="cop-text">PT. TAMAEL GRUP</h1>
    </div>
    <div style="width: 100%; text-align: center;">
        <h1 style="font-size: 14px;">
            {{ $title }}
        </h1>
        <div style="margin-top: -6px;">
            <x-print.border :height="$titleBorderHeight" />
            <x-print.border :height="$titleBorderHeight - 1" />
        </div>
        <h2 style="font-size: 10px;margin-top: 4px;">{{ $description }}</h2>
    </div>
    <div style="position: relative; width: 100%;">
        <h1
            class="cop-text uppercase"
            style="text-align: right;"
        >
            <span style="display: block;">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </span>
            <span style="font-size: 10px;">TERNATE, MALUKU UTARA</span>
        </h1>
    </div>
</div>

<x-print.border :height="$separatorBorderHeight" />
<x-print.border :height="$separatorBorderHeight - 1" />

@push('styles')
    <style>
        .cop-container {
            display: flex;
            justify-content: space-between;
        }

        .cop-text {
            font-size: 12px;
        }

    </style>
@endpush
