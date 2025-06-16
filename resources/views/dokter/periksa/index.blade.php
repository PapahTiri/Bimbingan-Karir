<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Daftar Pasien Belum Diperiksa
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama Pasien</th>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Keluhan</th>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Hari</th>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jam</th>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($janji_periksas as $janji)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-800">{{ $janji->pasien->nama }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-800">{{ $janji->keluhan }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-800">{{ $janji->jadwalPeriksa->hari }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-800">
                                        {{ \Carbon\Carbon::parse($janji->jadwalPeriksa->jam_mulai)->format('H:i') }} - 
                                        {{ \Carbon\Carbon::parse($janji->jadwalPeriksa->jam_selesai)->format('H:i') }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <a href="{{ route('dokter.periksa.create', $janji->id) }}"
                                           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition">
                                            Periksa
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-6 text-center text-sm text-gray-500">
                                        Tidak ada pasien yang menunggu pemeriksaan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
