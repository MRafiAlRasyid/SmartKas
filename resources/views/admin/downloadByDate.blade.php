<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans; }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tfoot td {
            font-weight: bold;
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center; line-height: 10px;">Laporan Keuangan</h2>
    <h2 style="text-align: center; line-height: 10px;">RW 03 Desa Citeureup</h2>
    <h2 style="text-align: center; line-height: 10px;">{{ $startDate }} sampai {{ $endDate }}</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Perincian</th>
                <th>Pemasukan (Rp)</th>
                <th>Pengeluaran (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mergeData as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->tanggal }}</td>
                <td>{{ $data->perincian }}</td>
                <td>{{ number_format($data->pemasukan) }}</td>
                <td>{{ number_format($data->pengeluaran) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right;">Total Pemasukan:</td>
                <td>{{ number_format($totalPemasukan) }}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;">Total Pengeluaran:</td>
                <td></td>
                <td>{{ number_format($totalPengeluaran) }}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;">Total Saldo:</td>
                <td colspan="2">{{ number_format($totalSaldo) }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
