<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Data Karyawan</h1>

        <form action="{{ route('datakaryawan.update', $karyawan->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf
            @method('PUT')
        
            <div>
                <label class="block text-sm font-medium">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $karyawan->nama) }}" class="mt-1 w-full border-gray-300 rounded-md shadow-sm">

                @error('nama')
                    <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <div>
                <label class="block text-sm font-medium">NIK</label>
                <input type="text" name="nik" value="{{ old('nik', $karyawan->nik) }}" class="mt-1 w-full border-gray-300 rounded-md shadow-sm">

                @error('nik')
                    <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', $karyawan->email) }}" class="mt-1 w-full border-gray-300 rounded-md shadow-sm">

                @error('email')
                    <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <div>
                <label class="block text-sm font-medium">No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $karyawan->no_hp) }}" class="mt-1 w-full border-gray-300 rounded-md shadow-sm">

                @error('no_hp')
                    <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <div>
                <label class="block text-sm font-medium">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat', $karyawan->alamat) }}" class="mt-1 w-full border-gray-300 rounded-md shadow-sm">

                @error('alamat')
                    <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <div>
                <label class="block text-sm font-medium">Jabatan</label>
                <input type="text" name="jabatan" value="{{ old('jabatan', $karyawan->jabatan) }}" class="mt-1 w-full border-gray-300 rounded-md shadow-sm">

                @error('jabatan')
                    <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <div>
                <label class="block text-sm font-medium">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $karyawan->tanggal_masuk) }}" class="mt-1 w-full border-gray-300 rounded-md shadow-sm">

                @error('tanggal_masuk')
                    <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <div>
                <label class="block text-sm font-medium">Gaji Pokok</label>
                <input type="number" name="gaji_pokok" value="{{ old('gaji_pokok', $karyawan->gaji_pokok) }}" class="mt-1 w-full border-gray-300 rounded-md shadow-sm">

                @error('gaji_pokok')
                    <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <div>
                <label class="block text-sm font-medium">Status</label>
                <select name="status" class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
                    <option value="Aktif" {{ $karyawan->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Tidak Aktif" {{ $karyawan->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>

                @error('status')
                    <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <div class="md:col-span-2 flex justify-between items-center">
                <a href="{{ route('datakaryawan.index') }}" class="text-blue-600 hover:underline">Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                    Update
                </button>
            </div>
        </form>        
    </div>
</body>
</html>