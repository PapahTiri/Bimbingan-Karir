<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Obat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white shadow rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Tambah Data Obat') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                Silakan isi form di bawah ini untuk menambahkan data obat ke dalam sistem.
                            </p>
                        </header>

                        <form class="mt-6 space-y-4" action="{{ route('dokter.obat.store') }}" method="POST">
                            @csrf

                            {{-- Nama Obat --}}
                            <div>
                                <label for="namaObat" class="block text-sm font-medium text-gray-700">Nama Obat</label>
                                <input
                                    type="text"
                                    id="namaObat"
                                    name="nama_obat"
                                    value="{{ old('nama_obat') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    required
                                >
                                @error('nama_obat')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Kemasan --}}
                            <div>
                                <label for="kemasan" class="block text-sm font-medium text-gray-700">Kemasan</label>
                                <input
                                    type="text"
                                    id="kemasan"
                                    name="kemasan"
                                    value="{{ old('kemasan') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    required
                                >
                                @error('kemasan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Harga --}}
                            <div>
                                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                                <input
                                    type="number"
                                    id="harga"
                                    name="harga"
                                    value="{{ old('harga') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    required
                                >
                                @error('harga')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Tombol --}}
                            <div class="flex items-center gap-4">
                                <a href="{{ route('dokter.obat.index') }}"
                                   class="px-4 py-2 text-sm bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">
                                    Batal
                                </a>
                                <button type="submit"
                                        class="px-4 py-2 text-sm text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
