<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Jadwal Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white shadow rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Edit Jadwal Periksa') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                Silakan perbarui informasi jadwal periksa sesuai kebutuhan.
                            </p>
                        </header>

                        <form class="mt-6 space-y-4" action="{{ route('dokter.jadwalPeriksa.update', $jadwalPeriksa->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            {{-- Hari --}}
                            <div>
                                <label for="editHariInput" class="block text-sm font-medium text-gray-700">Hari</label>
                                <select id="editHariInput" name="hari" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                                    <option value="">Pilih Hari</option>
                                    @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                                        <option value="{{ $hari }}" {{ old('hari', $jadwalPeriksa->hari) == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                                    @endforeach
                                </select>
                                @error('hari')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Jam Mulai --}}
                            <div>
                                <label for="editJamMulaiInput" class="block text-sm font-medium text-gray-700">Jam Mulai</label>
                                <input
                                    type="time"
                                    id="editJamMulaiInput"
                                    name="jam_mulai"
                                    value="{{ old('jam_mulai', $jadwalPeriksa->jam_mulai) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    required
                                >
                                @error('jam_mulai')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Jam Selesai --}}
                            <div>
                                <label for="editJamSelesaiInput" class="block text-sm font-medium text-gray-700">Jam Selesai</label>
                                <input
                                    type="time"
                                    id="editJamSelesaiInput"
                                    name="jam_selesai"
                                    value="{{ old('jam_selesai', $jadwalPeriksa->jam_selesai) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    required
                                >
                                @error('jam_selesai')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300" required>
                                    <option value="1" {{ old('status', $jadwalPeriksa->status ?? 1) == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ old('status', $jadwalPeriksa->status ?? 1) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- id_dokter (hidden) --}}
                            <input type="hidden" name="id_dokter" value="{{ $jadwalPeriksa->id_dokter }}">

                            {{-- Tombol --}}
                            <div class="flex items-center gap-4">
                                <a href="{{ route('dokter.jadwalPeriksa.index') }}"
                                   class="px-4 py-2 text-sm bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">
                                    Batal
                                </a>
                                <button type="submit"
                                        class="px-4 py-2 text-sm text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                                    Update
                                </button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>