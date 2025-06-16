<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Obat yang Telah Dihapus
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto bg-white p-6 shadow rounded-lg space-y-4">

            {{-- Pesan Status --}}
            @if (session('status'))
                <div class="p-3 bg-green-100 text-green-800 rounded">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Tabel Obat Terhapus --}}
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700 border border-gray-200 rounded">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3">Nama Obat</th>
                            <th class="px-4 py-3">Kemasan</th>
                            <th class="px-4 py-3">Harga</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($obat as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $item->nama_obat }}</td>
                                <td class="px-4 py-2">{{ $item->kemasan }}</td>
                                <td class="px-4 py-2">Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td class="px-4 py-2 flex gap-2">
                                    {{-- Tombol Restore --}}
                                    <form action="{{ route('dokter.obat.restore', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                                            Restore
                                        </button>
                                    </form>

                                    {{-- Tombol Hapus Permanen --}}
                                    <form action="{{ route('dokter.obat.forceDelete', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus permanen obat ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm text-white bg-red-600 rounded hover:bg-red-700 transition">
                                            Hapus Permanen
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">
                                    Tidak ada data obat yang dihapus.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Tombol Kembali --}}
            <div class="pt-4">
                <a href="{{ route('dokter.obat.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-sm text-gray-800 rounded transition">
                    ← Kembali ke daftar obat
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
