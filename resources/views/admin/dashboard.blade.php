<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Welcome🙋‍♂️, Website Payroll PT TeenagerTech Indonesia
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- statistik 3 data --}}
                    <section class="container mx-auto mb-8">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            {{-- total karyawan --}}
                            <div class="bg-green-300 shadow rounded p-6 text-center border border-blue-500">
                                <h2 class="text-xl font-bold text-gray-800">Total Karyawan</h2>
                                <p class="text-4xl font-extrabold text-blue-800">{{ $data['datakaryawan'] }}</p>
                            </div>
                            {{-- total pengajuan --}}
                            <div class="bg-red-300 shadow rounded p-6 text-center border border-blue-500">
                                <h2 class="text-xl font-bold text-gray-800">Total Pengajuan</h2>
                                <p class="text-4xl font-extrabold text-blue-800">{{ $data['pengajuan'] }}</p>
                            </div>
                            {{-- total user login --}}
                            <div class="bg-purple-300 shadow rounded p-6 text-center border border-blue-500">
                                <h2 class="text-xl font-bold text-gray-800">Total User Login</h2>
                                <p class="text-4xl font-extrabold text-blue-800">{{ $data['userlogin'] }}</p>
                            </div>
                        </div>
                    </section>
                    {{-- chart data karyawan --}}
                    <section class="container mx-auto mb-8">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Chart Data Karyawan</h2>
                        <canvas id="chartdatakaryawan" width="400" height="100"></canvas>
                    </section>
                </div>
            </div>
        </div>
    </div>

    {{-- taruh script di bawah --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('chartdatakaryawan');
    
        const bulanLabels = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
    
        // Data dari PHP
        const dataKaryawan = @json($data['karyawanPerBulan']);
    
        // Bikin array 12 bulan, default 0 semua
        const dataJumlah = Array(12).fill(0);
        
        // Isi dataJumlah sesuai data dari backend
        for (const bulan in dataKaryawan) {
            dataJumlah[bulan - 1] = dataKaryawan[bulan];
        }
    
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: bulanLabels,
                datasets: [{
                    label: 'Jumlah Karyawan',
                    data: dataJumlah,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>    
</x-app-layout>