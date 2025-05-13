<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Data Pengajuan</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class=" bg-gray-100 p-8">
        <div class=" max-w-6xl mx-auto bg-white p-6 rounded-xl shadow mt-10">
            <h2 class=" text-2xl font-bold mb-4 text-center">Tabel Pengajuan</h2>
            <table class=" min-w-full table-auto border border-gray-300">
                <thead>
                    <tr class=" bg-gray-200 text-left">
                        <th class=" px-4 py-2 border">Nama Karyawan</th>
                        <th class=" px-4 py-2 border">Judul</th>
                        <th class=" px-4 py-2 border">Deskripsi</th>
                        <th class=" px-4 py-2 border">Status</th>
                        <th class=" px-4 py-2 border text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- contoh Data --}}
                    @forelse ($pengajuan as $pengajuans)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-2 border">{{ $pengajuans->nama_pengaju }}</td>
                            <td class="px-4 py-2 border">{{ $pengajuans->judul }}</td>
                            <td class="px-4 py-2 border">{{ $pengajuans->deskripsi }}</td>
                            <td class="px-4 py-2 border font-semibold">{{ $pengajuans->status }}</td>
                            <td class="px-4 py-2 border text-center space-x-2">
                                <form action="{{ route('konfirmasi', $pengajuans->id ) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 transition rounded">Yes</button>
                                </form>
                                <form action="{{ route('tolak', $pengajuans->id ) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 transition rounded">Tolak</button>
                                </form>
                                <form action="{{ route('hapus', $pengajuans->id ) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 transition rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="flex items-center justify-center h-10 bg-red-100 rounded-lg shadow-md">
                            <p class="text-gray-600 text-lg font-semibold">
                                Data Products Belum Tersedia
                            </p>
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </body>
    </html>
</x-app-layout>