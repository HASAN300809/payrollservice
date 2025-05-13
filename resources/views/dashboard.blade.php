<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class=" mb-4 text-center mt-8">
        <p class=" text-3xl text-gray-700">
            Hello, <span class=" font-semibold text-blue-600">{{ Auth::user()->name }}</span> Selamat Datang di <span class=" font-semibold text-blue-600">Payroll Service</span>
        </p>
    </div>

    <h2 class=" text-2xl font-bold mb-6 text-gray-800 text-center">Riwayat Gaji Saya</h2>

    <div class=" overflow-x-auto bg-white shadow-md rounded-lg">
        <table class=" min-w-full table-auto text-left border-collapse">
            <thead class=" bg-gray-100 text-gray-700 text-sm uppercase">
                <tr>
                    <th class=" px-6 py-3 border-b">Bulan</th>
                    <th class=" px-6 py-3 border-b">Total</th>
                    <th class=" px-6 py-3 border-b">Status</th>
                </tr>
            </thead>

            <tbody class=" text-gray-600 divide-y divide-gray-100">
                @foreach ($gajis as $gaji)
                    <tr class=" hover:bg-gray-50 transition">
                        <td class=" px-6 py-3 whitespace-nowrap">{{ $gaji->bulan }}</td>
                        <td class=" px-6 py-3 whitespace-nowrap">{{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                        <td class=" px-6 py-3 whitespace-nowrap">
                            <span class=" px-2 py-1 rounded text-sm {{ $gaji->status == 'Lunas' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ $gaji->status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class=" text-center mt-6">
        <a href="{{ route('user.export.pdf') }}" class=" px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Download PDF
        </a>
    </div>
</body>
</html>
</x-app-layout>
