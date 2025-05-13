<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Tambah Gaji</title>
</head>
<body>
    <h2 class="text-2xl font-bold mb-4 text-gray-800 text-center mt-4">Tambah Data Gaji</h2>

    <form action="{{ route('gaji.store') }}" method="POST" class="space-y-4 p-4">
        @csrf
        <div>
            <label for="user_id" class="block text-gray-700 font-medium">Pilih Karyawan</label>
            <select name="user_id" id="user_id" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="bulan" class="block text-gray-700 font-medium">Bulan</label>
            <input type="text" name="bulan" placeholder="Contoh: April 2025" id="bulan" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

            @error('bulan')
                <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ $message }}
                </div>
            @enderror
        </div>
        </div>

        <div>
            <label for="gaji_pokok" class="block text-gray-700 font-medium">Gaji Pokok</label>
            <input type="number" name="gaji_pokok" placeholder="Gaji Pokok" id="gaji_pokok" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

            @error('gaji_pokok')
                <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ $message }}
                </div>
            @enderror
        </div>
        </div>

        <div>
            <label for="tunjangan" class="block text-gray-700 font-medium">Tunjangan</label>
            <input type="number" name="tunjangan" placeholder="Tunjangan" id="tunjangan" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

            @error('tunjangan')
                <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ $message }}
                </div>
            @enderror
        </div>
        </div>

        <div>
            <label for="potongan" class="block text-gray-700 font-medium">Potongan</label>
            <input type="number" name="potongan" placeholder="Potongan" id="potongan" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

            @error('potongan')
                <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ $message }}
                </div>
            @enderror
        </div>
        </div>

        <div>
            <button type="submit" class=" py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Simpan
            </button>
        </div>
        <div class="mt-6">
            <a href="{{ route('gaji') }}" class=" py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-center">
                Kembali ke Daftar Gaji
            </a>
        </div> 
    </form>
</body>
</html>