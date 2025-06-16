<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Pemeriksaan Pasien
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow-md space-y-6">
                
                <!-- Data Pasien -->
                <section class="bg-gray-50 border border-gray-200 rounded-md p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A3 3 0 007 21h10a3 3 0 002.879-3.803l-1.358-5.434A4.992 4.992 0 0015.5 8h-7a4.992 4.992 0 00-3.021 3.763l-1.358 5.434z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 11v.01M12 17h.01M9 21h6" />
                        </svg>
                        Informasi Pasien
                    </h3>

                    <dl class="text-sm text-gray-700 space-y-2">
                        <div>
                            <dt class="font-medium inline">Nama:</dt>
                            <dd class="inline ml-1">{{ $janji_periksa->pasien->nama }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium inline">No Rekam Medis:</dt>
                            <dd class="inline ml-1">{{ $janji_periksa->pasien->no_rm }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium inline">Keluhan:</dt>
                            <dd class="inline ml-1">{{ $janji_periksa->keluhan }}</dd>
                        </div>
                    </dl>
                </section>

                <!-- Form Pemeriksaan -->
                <form method="POST" action="{{ route('dokter.periksa.store') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="id_janji_periksa" value="{{ $janji_periksa->id }}">

                    <!-- Tanggal Periksa -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Periksa</label>
                        <input type="datetime-local" name="tgl_periksa"
                            class="mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>

                    <!-- Catatan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Catatan</label>
                        <textarea name="catatan" rows="4"
                            class="mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required></textarea>
                    </div>

                    <!-- Obat -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Obat</label>
                        <div id="obat-container" class="space-y-2">
                            <div class="flex gap-2">
                                <select name="obats[0][id]" onchange="hitungTotal()" required
                                    class="w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Pilih Obat</option>
                                    @foreach($obats as $obat)
                                        <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}">
                                            {{ $obat->nama_obat }} ({{ $obat->kemasan }}) - Rp{{ number_format($obat->harga, 0, ',', '.') }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="number" name="obats[0][jumlah]" value="1" min="1" onchange="hitungTotal()" required
                                    class="w-24 rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        <button type="button" onclick="tambahObat()" class="mt-2 text-sm text-blue-600 hover:underline">
                            + Tambah Obat
                        </button>
                    </div>

                    <!-- Estimasi Biaya -->
                    <div class="pt-4 border-t border-gray-200 text-sm text-gray-800 space-y-1">
                        <p>Biaya Periksa: <strong>Rp30.000</strong></p>
                        <p>Total Obat: <strong id="total-obat">Rp0</strong></p>
                        <p>Total Semua: <strong id="total-semua">Rp30.000</strong></p>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                        <a href="{{ route('dokter.periksa.index') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-800 bg-gray-200 rounded-md hover:bg-gray-300 transition">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script Obat Dinamis -->
    <script>
        window.obatOptionsHTML = `
            <select name="obats[__INDEX__][id]" class="w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" onchange="hitungTotal()" required>
                <option value="">Pilih Obat</option>
                @foreach($obats as $obat)
                    <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}">
                        {{ $obat->nama_obat }} ({{ $obat->kemasan }}) - Rp{{ number_format($obat->harga, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
            <input type="number" name="obats[__INDEX__][jumlah]" class="w-24 rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Jumlah" min="1" value="1" onchange="hitungTotal()" required>
        `;
    </script>

    @vite('resources/js/periksa.js')
</x-app-layout>
