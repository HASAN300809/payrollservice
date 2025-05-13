<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Karyawan</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class=" bg-gray-100 text-gray-800">
        
        <div class=" max-w-7xl mx-auto px-4 py-8">
            <h1 class=" text-3xl font-bold mb-6 text-center">Data Karyawan</h1>

            <!-- Form Tambah Karyawan -->
            <div class=" bg-white shadow-md rounded-lg p-6 mb-10">
                <form action="{{ route('datakaryawan.store') }}" method="POST" class=" grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf
                    <div>
                        <label class=" block text-sm font-medium">Nama</label>
                        <input type="text" name="nama" class=" mt-1 w-full border-gray-300 rounded-md shadow-sm">

                        @error('nama')
                            <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div>
                        <label class=" block text-sm font-medium">NIK</label>
                        <input type="text" name="nik" class=" mt-1 w-full border-gray-300 rounded-md shadow-sm">

                        @error('nik')
                            <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div>
                        <label class=" block text-sm font-medium">Email</label>
                        <input type="text" name="email" class=" mt-1 w-full border-gray-300 rounded-md shadow-sm">

                        @error('email')
                            <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div>
                        <label class=" block text-sm font-medium">No Hp</label>
                        <input type="text" name="no_hp" class=" mt-1 w-full border-gray-300 rounded-md shadow-sm">

                        @error('no_hp')
                            <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div>
                        <label class=" block text-sm font-medium">Alamat</label>
                        <input type="text" name="alamat" class=" mt-1 w-full border-gray-300 rounded-md shadow-sm">

                        @error('alamat')
                            <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div>
                        <label class=" block text-sm font-medium">Jabatan</label>
                        <input type="text" name="jabatan" class=" mt-1 w-full border-gray-300 rounded-md shadow-sm">

                        @error('jabatan')
                            <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div>
                        <label class=" block text-sm font-medium">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" class=" mt-1 w-full border-gray-300 rounded-md shadow-sm">

                        @error('tanggal_masuk')
                            <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div>
                        <label class=" block text-sm font-medium">Gaji Pokok</label>
                        <input type="text" name="gaji_pokok" class=" mt-1 w-full border-gray-300 rounded-md shadow-sm">

                        @error('gaji_pokok')
                            <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div>
                        <label class=" block text-sm font-medium">Status</label>
                        <select name="status" class=" mt-1 w-full border-gray-300 rounded-md shadow-sm p-2">
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
                        </select>

                        @error('status')
                            <div class="mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class=" md:col-span-2">
                        <button type="submit" class=" bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition font-medium">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabel Data Karyawan -->
            <div class=" bg-white shadow-md rounded-lg overflow-x-auto">
                <h1 class=" text-3xl font-bold mb-6 text-center mt-2">Data Karyawan</h1>
                <table class=" min-w-full divide-y divide-gray-200 text-sm">
                    <thead class=" bg-gray-100">
                        <th class=" px-6 py-3 text-left font-medium text-gray-700">#</th>
                        <th class=" px-6 py-3 text-left font-medium text-gray-700">Nama</th>
                        <th class=" px-6 py-3 text-left font-medium text-gray-700">NIK</th>
                        <th class=" px-6 py-3 text-left font-medium text-gray-700">Email</th>
                        <th class=" px-6 py-3 text-left font-medium text-gray-700">No Hp</th>
                        <th class=" px-6 py-3 text-left font-medium text-gray-700">Alamat</th>
                        <th class=" px-6 py-3 text-left font-medium text-gray-700">Jabatan</th>
                        <th class=" px-6 py-3 text-left font-medium text-gray-700">Tgl Masuk</th>
                        <th class=" px-6 py-3 text-left font-medium text-gray-700">Gaji Pokok</th>
                        <th class=" px-6 py-3 text-left font-medium text-gray-700">Status</th>
                        <th class=" px-6 py-3 text-left font-medium text-gray-700">Action</th>
                    </thead>

                    <tbody class=" bg-white divide-y divide-gray-200">
                        @foreach ($karyawan as $karyawans)
                            <tr>
                                <td class=" px-6 py-4">{{ $loop->iteration }}</td>
                                <td class=" px-6 py-4 font-medium">{{ $karyawans->nama }}</td>
                                <td class=" px-6 py-4">{{ $karyawans->nik }}</td>
                                <td class=" px-6 py-4">{{ $karyawans->email }}</td>
                                <td class=" px-6 py-4">{{ $karyawans->no_hp }}</td>
                                <td class=" px-6 py-4">{{ $karyawans->alamat }}</td>
                                <td class=" px-6 py-4">{{ $karyawans->jabatan }}</td>
                                <td class=" px-6 py-4">{{ $karyawans->tanggal_masuk }}</td>
                                <td class=" px-6 py-4">{{ $karyawans->gaji_pokok }}</td>
                                <td class="px-6 py-4">
                                    <span class="{{ $karyawans->status == 'aktif' ? 'bg-green-100 text-green-800 text-xs font-semibold px-3 py-2 rounded-md' : 'bg-red-100 text-red-800 text-xs font-semibold px-3 py-2 rounded-md whitespace-nowrap' }}">
                                        {{ $karyawans->status }}
                                    </span>                                
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('datakaryawan.destroy', $karyawans->id) }}" method="post" class="flex space-x-2">
                                        <a href="{{ route('datakaryawan.edit', $karyawans->id) }}"
                                           class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm transition">
                                            Edit
                                        </a>
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm transition">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <!-- script alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                });
            @elseif (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: '{{ session('error') }}',
                });
            @endif
        </script>

    </body>
    </html>
</x-app-layout>