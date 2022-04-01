<div
    class="table-container"
    style="margin-top: 8px;"
>
    <table class="table">
        <thead class="table-heading">
            {{ $heading }}
        </thead>
        <tbody>
            {{ $body }}
        </tbody>
        @isset($tfoot)
            <tfoot>
                {{ $tfoot }}
            </tfoot>
        @endisset
    </table>
</div>

@push('styles')
    <style>
        .table-container {
            display: flex;
            justify-content: space-evenly
        }

        .table {
            margin-bottom: 18px;
        }

        .table th {
            padding: 10px;
            border: 1.7px solid black;
        }

        .table,
        .table td {
            padding: 3px;
            border: 1.7px solid black;
        }

        .table {
            margin: 0;
            width: 100%;
            border-collapse: collapse;
        }

        .table .table-heading {
            height: 3rem !important;
            background-color: rgb(248, 229, 229);
        }

        .table tbody,
        .table tfoot {
            text-align: center;
        }

    </style>
@endpush
