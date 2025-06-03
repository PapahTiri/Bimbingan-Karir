<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Obat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white shadow rounded-lg">
                <section>
                    <header class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">
                            {{ __('Daftar Obat') }}
                        </h2>
                        <a href="{{ route('dokter.obat.create') }}"
                           class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                            Tambah Obat
                        </a>
                    </header>

                    @if (session('status') === 'obat-created')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-green-600 mb-4"
                        >
                            {{ __('Created.') }}
                        </p>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-700 border border-gray-200 rounded">
                            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                                <tr>
                                    <th scope="col" class="px-4 py-3">No</th>
                                    <th scope="col" class="px-4 py-3">Nama Obat</th>
                                    <th scope="col" class="px-4 py-3">Kemasan</th>
                                    <th scope="col" class="px-4 py-3">Harga</th>
                                    <th scope="col" class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($obats as $obat)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3">{{ $obat->nama_obat }}</td>
                                        <td class="px-4 py-3">{{ $obat->kemasan }}</td>
                                        <td class="px-4 py-3">Rp{{ number_format($obat->harga, 0, ',', '.') }}</td>
                                        <td class="px-4 py-3 flex gap-2">
                                            <a href="{{ route('dokter.obat.edit', $obat->id) }}"
                                               class="px-3 py-1 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600 transition">
                                                Edit
                                            </a>
                                            <form action="{{ route('dokter.obat.destroy', $obat->id) }}" method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 text-sm text-white bg-red-600 rounded hover:bg-red-700 transition">
                                                    Delete
                                                </button>
                                            </form>
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
