<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ ('Riwayat Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow rounded-lg">
                <section>
                    <header class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ ('Riwayat Pemeriksaan') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ ('Informasi lengkap mengenai jadwal dan hasil pemeriksaan Anda.') }}
                        </p>
                    </header>

                    <!-- Detail Pemeriksaan -->
                    <div class="border border-gray-200 rounded-lg mb-6">
                        <div class="bg-gray-50 border-b border-gray-200 px-4 py-3 rounded-t-lg">
                            <h3 class="text-md font-semibold text-gray-800">Detail Pemeriksaan</h3>
                        </div>
                        <div class="p-4 sm:grid sm:grid-cols-2 sm:gap-6">
                            <div>
                                <p class="text-sm text-gray-500">Tanggal Periksa</p>
                                <p class="text-base font-medium text-gray-800 mt-1">
                                    {{ \Carbon\Carbon::parse($janji_periksa->periksa->tgl_periksa)->translatedFormat('d F Y H.i') }}
                                </p>
                            </div>
                            <div class="mt-4 sm:mt-0">
                                <p class="text-sm text-gray-500">Catatan</p>
                                <p class="text-base font-medium text-gray-800 mt-1">
                                    {{ $janji_periksa->periksa->catatan ?: 'Tidak ada catatan' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Daftar Obat -->
                    <div class="border border-gray-200 rounded-lg mb-6">
                        <div class="bg-gray-50 border-b border-gray-200 px-4 py-3 rounded-t-lg">
                            <h3 class="text-md font-semibold text-gray-800">Daftar Obat Diresepkan</h3>
                        </div>
                        <div class="p-4">
                            @if (count($janji_periksa->periksa->detailPeriksas) > 0)
                                <ul class="divide-y divide-gray-100">
                                    @foreach ($janji_periksa->periksa->detailPeriksas as $detailPeriksa)
                                        <li class="flex justify-between py-2 text-gray-700">
                                            <span>{{ $detailPeriksa->obat->nama_obat }}</span>
                                            <span class="text-sm text-gray-500">{{ $detailPeriksa->obat->kemasan }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-sm text-gray-500">Tidak ada obat yang diresepkan.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Biaya Periksa -->
                    <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg flex justify-between items-center mb-6">
                        <span class="font-semibold text-blue-800">Biaya Periksa</span>
                        <span class="text-xl font-bold text-blue-600">
                            {{ 'Rp' . number_format($janji_periksa->periksa->biaya_periksa, 0, ',', '.') }}
                        </span>
                    </div>

                    <!-- Tombol Kembali -->
                    <div class="mt-4">
                        <a href="{{ route('pasien.riwayatPeriksa.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md transition">
                            <i class="bi bi-arrow-left me-1"></i> {{ ('Kembali') }}
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
