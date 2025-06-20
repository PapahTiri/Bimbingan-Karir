<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ ('Janji Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ ('Buat Janji Periksa') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ ('Atur jadwal pertemuan dengan dokter untuk mendapatkan layanan konsultasi dan pemeriksaan kesehatan sesuai kebutuhan Anda.') }}
                            </p>
                        </header>

                        <form class="mt-6 space-y-6" action="{{ route('pasien.janjiPeriksa.store') }}" method="POST">
                            @csrf

                            {{-- Nomor Rekam Medis --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="formGroupExampleInput">Nomor Rekam Medis</label>
                                <input type="text" id="formGroupExampleInput"
                                    class="block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 text-gray-700 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Example input" value="{{ $no_rm }}" readonly>
                            </div>

                            {{-- Pilih Poli --}}
                            <div class="mb-4">
                                <label for="poliSelect" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Pilih Poli</label>
                                <select id="poliSelect"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option disabled selected>Pilih Poli</option>
                                    @foreach ($polis as $poli)
                                        <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Pilih Dokter --}}
                            <div>
                                <label for="dokterSelect" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Pilih Dokter</label>
                                <select id="dokterSelect" name="id_dokter" required
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option disabled selected>Pilih Dokter</option>
                                    @foreach ($dokters as $dokter)
                                        @foreach ($dokter->jadwalPeriksas as $jadwal)
                                            <option value="{{ $dokter->id }}" data-poli="{{ $dokter->poli->id }}">
                                                {{ $dokter->nama }} - Spesialis {{ $dokter->poli->nama_poli }} |
                                                {{ $jadwal->hari }}, {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H.i') }} -
                                                {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H.i') }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>

                            {{-- Keluhan --}}
                            <div>
                                <label for="keluhan" class="block text-sm font-medium text-gray-700 mb-1">Keluhan</label>
                                <textarea id="keluhan" name="keluhan" rows="4" required
                                    class="block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Masukkan keluhan Anda..."></textarea>
                            </div>

                            {{-- Submit Button --}}
                            <div class="flex items-center gap-4">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                                    Submit
                                </button>

                                @if (session('status') === 'janji-periksa-created')
                                    <p x-data="{ show: true }" x-show="show" x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-green-600">Berhasil Dibuat.</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const poliSelect = document.getElementById('poliSelect');
        const dokterSelect = document.getElementById('dokterSelect');

        poliSelect.addEventListener('change', function () {
            const selectedPoliId = this.value;

            // Tampilkan hanya dokter yang sesuai poli
            Array.from(dokterSelect.options).forEach(option => {
                if (!option.dataset.poli) return; // skip option default
                option.hidden = option.dataset.poli !== selectedPoliId;
            });

            // Reset pilihan
            dokterSelect.selectedIndex = 0;
        });
    });
</script>

</x-app-layout>
