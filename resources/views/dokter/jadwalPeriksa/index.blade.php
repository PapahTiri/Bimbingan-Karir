<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ ('Jadwal Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white shadow rounded-lg">
                <section>
                    <header class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">
                            {{ ('Daftar Jadwal Periksa') }}
                        </h2>
                        <a href="{{ route('dokter.jadwalPeriksa.create') }}"
                           class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                            Tambah Jadwal
                        </a>
                    </header>

                    @if (session('success'))
                        <p class="text-sm text-green-600 mb-4">
                            {{ session('success') }}
                        </p>
                    @endif
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-700 border border-gray-200 rounded">
                            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                                <tr>
                                    <th class="px-4 py-3">No</th>
                                    <th class="px-4 py-3">Dokter</th>
                                    <th class="px-4 py-3">Hari</th>
                                    <th class="px-4 py-3">Jam Mulai</th>
                                    <th class="px-4 py-3">Jam Selesai</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($jadwalPeriksas as $jadwal)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3">{{ $jadwal->dokter->nama ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $jadwal->hari }}</td>
                                        <td class="px-4 py-3">{{ $jadwal->jam_mulai }}</td>
                                        <td class="px-4 py-3">{{ $jadwal->jam_selesai }}</td>
                                        <td class="px-4 py-3">
                                            <form action="{{ route('dokter.jadwalPeriksa.toggle-status', $jadwal->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="px-3 py-1 text-xs rounded 
                                                        {{ $jadwal->status ? 'bg-green-500 text-white hover:bg-green-700' : 'bg-gray-400 text-white hover:bg-gray-600' }}">
                                                    {{ $jadwal->status ? 'Aktif' : 'Tidak Aktif' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td class="px-4 py-3 flex gap-2">
                                            <form action="{{ route('dokter.jadwalPeriksa.destroy', $jadwal->id) }}" method="POST"
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
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-4 py-3 text-center text-gray-500">Belum ada jadwal periksa.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>