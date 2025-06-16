<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Riwayat Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow-sm sm:rounded-lg">
                <section>
                    <header class="mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">
                            {{ __('Detail Riwayat Pemeriksaan') }}
                        </h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Informasi lengkap mengenai jadwal pemeriksaan Anda.
                        </p>
                    </header>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Info Pemeriksaan -->
                        <div class="md:col-span-2 space-y-4">
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Poliklinik</span>
                                    <span class="font-medium text-gray-800">{{ $janji_periksa->jadwalPeriksa->dokter->poli->nama_poli }}</span>
                                </div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Nama Dokter</span>
                                    <span class="font-medium text-gray-800">{{ $janji_periksa->jadwalPeriksa->dokter->nama }}</span>
                                </div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Hari Pemeriksaan</span>
                                    <span class="font-medium text-gray-800">{{ $janji_periksa->jadwalPeriksa->hari }}</span>
                                </div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jam Mulai</span>
                                    <span class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($janji_periksa->jadwalPeriksa->jam_mulai)->format('H.i') }}</span>
                                </div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jam Selesai</span>
                                    <span class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($janji_periksa->jadwalPeriksa->jam_selesai)->format('H.i') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Nomor Antrian -->
                        <div class="flex items-center justify-center p-6 bg-blue-50 rounded-lg shadow-sm flex-col text-center">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Nomor Antrian Anda</h3>
                            <div class="w-24 h-24 rounded-full bg-blue-600 text-white flex items-center justify-center text-3xl font-bold shadow-lg">
                                {{ $janji_periksa->no_antrian }}
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Kembali -->
                    <div class="mt-8">
                        <a href="{{ route('pasien.riwayatPeriksa.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-md transition">
                            ← Kembali
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
