<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Daftar Pasien yang Sudah Diperiksa
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">Tanggal Periksa</th>
                            <th class="px-4 py-2 text-left">Nama Pasien</th>
                            <th class="px-4 py-2 text-left">No RM</th>
                            <th class="px-4 py-2 text-left">Keluhan</th>
                            <th class="px-4 py-2 text-left">Catatan</th>
                            <th class="px-4 py-2 text-left">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($janjiperiksas as $periksa)
                            <tr>
                                <td class="px-4 py-2">
                                    {{ optional($periksa->tgl_periksa)->format('d-m-Y H:i') }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ $periksa->janjiPeriksas?->pasien?->nama ?? '-' }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ $periksa->janjiPeriksas?->pasien?->no_rm ?? '-' }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ $periksa->janjiPeriksas?->keluhan ?? '-' }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ $periksa->catatan }}
                                </td>
                                <td class="px-4 py-2">
                                    Rp{{ number_format($periksa->biaya_periksa, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-gray-500">Belum ada pemeriksaan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
