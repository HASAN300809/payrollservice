<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Show Gaji</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <h2 class="text-2xl font-bold mb-4 text-gray-800 text-center mt-10">Detail Gaji</h2>

        <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
            <p class="text-gray-700"><span class="font-medium">Nama:</span>{{ $gaji->user->name }}</p>
            <p class="text-gray-700"><span class="font-medium">Bulan:</span>{{ $gaji->bulan }}</p>
            <p class="text-gray-700"><span class="font-medium">Gaji Pokok:</span>{{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</p>
            <p class="text-gray-700"><span class="font-medium">Tunjangan:</span>{{ number_format($gaji->tunjangan, 0, ',', '.') }}</p>
            <p class="text-gray-700"><span class="font-medium">Potongan:</span>{{ number_format($gaji->potongan, 0, ',', '.') }}</p>
            <p class="text-gray-700"><span class="font-medium">Total:</span>{{ number_format($gaji->total_gaji, 0, ',', '.') }}</p>
            <p class="text-gray-700"><span class="font-medium">Nama:</span>{{ $gaji->user->name }}</p>
            <p class="text-gray-700"><span class="font-medium">status:</span>
                <span class="px-2 py-1 rounded text-sm {{ $gaji->status == 'Lunas' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ $gaji->status }}
                </span>
            </p>
        </div>

        <div class="mt-6">
            <a href="{{ route('gaji') }}" class=" py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-center">
                Kembali ke Daftar Gaji
            </a>
        </div>
    </body>
</html>