<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Riwayat Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:rounded-lg">
                <section>
                    <header class="mb-4">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Riwayat Janji Periksa') }}
                        </h2>
                    </header>

                    {{-- Tabel Responsif --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 rounded-lg overflow-hidden">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">No</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Poliklinik</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Dokter</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Hari</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Mulai</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Selesai</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Antrian</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($janji_periksas as $janjiPeriksa)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">
                                            {{ $janjiPeriksa->jadwalPeriksa->dokter->poli->nama_poli }}
                                        </td>
                                        <td class="px-4 py-2 text-sm text-gray-700">
                                            {{ $janjiPeriksa->jadwalPeriksa->dokter->nama }}
                                        </td>
                                        <td class="px-4 py-2 text-sm text-gray-700">
                                            {{ $janjiPeriksa->jadwalPeriksa->hari }}
                                        </td>
                                        <td class="px-4 py-2 text-sm text-gray-700">
                                            {{ \Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_mulai)->format('H.i') }}
                                        </td>
                                        <td class="px-4 py-2 text-sm text-gray-700">
                                            {{ \Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_selesai)->format('H.i') }}
                                        </td>
                                        <td class="px-4 py-2 text-sm text-gray-700">
                                            {{ $janjiPeriksa->no_antrian }}
                                        </td>
                                        <td class="px-4 py-2 text-sm">
                                            @if (is_null($janjiPeriksa->periksa))
                                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                                    Belum Diperiksa
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                                    Sudah Diperiksa
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2 text-sm">
                                            @if (is_null($janjiPeriksa->periksa))
                                                <a href="{{ route('pasien.riwayatPeriksa.detail', $janjiPeriksa->id) }}"
                                                   class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                                                    Detail
                                                </a>
                                            @else
                                                <a href="{{ route('pasien.riwayatPeriksa.riwayat', $janjiPeriksa->id) }}"
                                                   class="inline-flex items-center px-3 py-1.5 bg-gray-600 text-white text-sm font-medium rounded hover:bg-gray-700 transition">
                                                    Riwayat
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
