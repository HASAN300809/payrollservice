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
        <h2 class="text-2xl font-bold mb-4 text-gray-800 text-center mt-8">Daftar Gaji Karyawan</h2>
    <a href="{{ route('gaji.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition ml-5">
        Tambah Gaji
    </a>

    <div class="overflow-x-auto p-4 rounded-md">
        <table class="min-w-full bg-white shadow-lg rounded-md border border-gray-400 overflow-hidden">
            <thead class="bg-gray-100 text-gray-700 text-left text-sm uppercase border-b-2 border-gray-400">
                <tr>
                    <th class="px-6 py-3 border-r-2 border-gray-400">Nama</th>
                    <th class="px-6 py-3 border-r-2 border-gray-400">Bulan</th>
                    <th class="px-6 py-3 border-r-2 border-gray-400">Total</th>
                    <th class="px-6 py-3 border-r-2 border-gray-400">Status</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 divide-y divide-gray-400">
                @foreach($gajis as $gaji)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-400">{{ $gaji->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-400">{{ $gaji->bulan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-400">{{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-400">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $gaji->status == 'Lunas' ? 'bg-green-100 text-green-700 text-xs font-semibold px-3 py-2 rounded-md' : 'bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-2 rounded-md' }}">
                                {{ $gaji->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('gaji.show', $gaji) }}" class="bg-green-500 text-white text-sm px-3 py-1 rounded hover:underline">
                                    Detail
                                </a>
                                <form action="{{ route('gaji.bayar', $gaji->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white text-sm px-3 py-1 rounded">
                                        Sudah Dibayar
                                    </button>
                                </form>
                                <form action="{{ route('gaji.destroy', $gaji->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white text-sm px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </body>
    </html>
</x-app-layout>
    