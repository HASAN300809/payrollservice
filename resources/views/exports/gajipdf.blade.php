<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Gaji</title>
    <style>
        body { font-family: sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f3f4f6;
        }
        .status-lunas {
            background-color: #d1fae5;
            color: #064e3b;
        }
        .status-belum {
            background-color: #fef08a;
            color: #ca8a04;
        }
        h1{
            text-align: center
        }
    </style>
</head>
<body>
    <h1>Riwayat Gaji {{ Auth::user()->name }}</h1>

    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gajis as $gaji)
                <tr>
                    <td>{{ $gaji->bulan }}</td>
                    <td>{{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                    <td class="{{ $gaji->status == 'Lunas' ? 'status-lunas' : 'status-belum' }}">
                        {{ $gaji->status }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>