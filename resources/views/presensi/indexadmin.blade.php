<x-app-layout>
    <div class="max-w-6xl mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4 text-center">Data Presensi Seluruh Karyawan</h2>

        {{-- Tabel Presensi --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-200 text-left text-sm text-gray-700">
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Jam Masuk</th>
                        <th class="px-4 py-2">Jam Keluar</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($presensis as $presensi)
                        <tr class="border-b hover:bg-gray-50 text-sm">
                            <td class="px-4 py-2">{{ $presensi->username ?? $presensi->user->name ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $presensi->tanggal }}</td>
                            <td class="px-4 py-2">{{ $presensi->jam_masuk }}</td>
                            <td class="px-4 py-2">{{ $presensi->jam_keluar ?? '-' }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('admin.presensihapus', $presensi->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data absensi ini?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-gray-500">Tidak ada data presensi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>