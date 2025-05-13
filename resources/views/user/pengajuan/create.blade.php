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

    <div class=" max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md mt-10">
    
        {{-- Judul --}}
        <h2 class="text-2xl font-bold mb-6 text-center">Form Pengajuan baru</h2>
    
        {{-- Form Pengajuan --}}
        <form action="{{ route('pengajuanstore') }}" method="post" class="">
            @csrf
            <div>
                <label for="namapengaju" class="block font-medium">Nama Karyawan</label>
                <input type="text" name="namapengaju" id="namapengaju" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div>
                <label for="judul" class="block font-medium">Judul Pengajuan</label>
                <input type="text" name="judul" id="judul" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div>
                <label for="deskripsi" class="block font-medium">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="w-full border border-gray-300 p-2 rounded" rows="3" required></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4  py-2 rounded hover:bg-blue-700 transition">
                Kirim Pengajuan
            </button>
        </form>
    
        {{-- Riwayat Pengajuan --}}
        <h2 class="text-xl font-semibold mt-10 mb-4 text-center">Riwayat Pengajuan Karyawan</h2>
        <table class="min-w-full table-auto border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <td class="px-4 py-2 border">Nama Karyawan</td>
                    <td class="px-4 py-2 border">Judul</td>
                    <td class="px-4 py-2 border">Deskripsi</td>
                    <td class="px-4 py-2 border">Status</td>
                    <td class="px-4 py-2 border">Tanggal</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengajuan as $pengajuans)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $pengajuans->nama_pengaju }}</td>
                        <td class="px-4 py-2 border">{{ $pengajuans->judul }}</td>
                        <td class="px-4 py-2 border">{{ $pengajuans->deskripsi }}</td>
                        <td class="px-4 py-2 border font-semibold text-center 
                            {{ 
                                $pengajuans->status == 'diterima' ? 'text-green-600' :
                                ($pengajuans->status == 'ditolak' ? 'text-red-600' : 'text-yellow-500')
                            }}">
                            {{ $pengajuans->status }}
                        </td>
                        <td class="px-4 py-2 border">{{ $pengajuans->tanggal_pengajuan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>

</x-app-layout>