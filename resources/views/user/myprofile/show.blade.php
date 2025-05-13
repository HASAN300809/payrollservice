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
    <body>
        <div class="container mx-auto p-4">
            <h1 class="text-3xl font-semibold text-center mb-6">My Profile</h1>
            <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
                <div class="text-xl font-medium text-gray-700 mb-4">
                    Informasi Akun User
                </div>
                <div class="space-y-4">
                    <p><span class="font-bold">Name:</span> {{ $user->name }}</p>
                    <p><span class="font-bold">Email:</span> {{ $user->email }}</p>
                    <p><span class="font-bold">Dibuat :</span> {{ $user->created_at->format('d M Y') }}</p>
                    <!-- Kamu bisa menambahkan field lain jika ada -->
                </div>
            </div>
        </div>
    </body>
    </html>
</x-app-layout>