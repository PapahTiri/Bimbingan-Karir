<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Janji Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Buat Janji Periksa') }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Atur jadwal konsultasi dan pemeriksaan kesehatan sesuai kebutuhan Anda.') }}
                        </p>
                    </header>

                    <form class="space-y-6" action="" method="POST">
                        @csrf
                        
                        <!-- No. Rekam Medis -->
                        <div>
                            <label for="no_rm" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nomor Rekam Medis
                            </label>
                            <input type="text" id="no_rm" value="2025001-1210" readonly
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        </div>

                        <!-- Dokter -->
                        <div>
                            <label for="dokter" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Pilih Dokter
                            </label>
                            <select id="dokter" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option disabled selected>Pilih Dokter</option>
                                <option>Dr. Maya Sari - Spesialis Mata | Jumat, 08:00 - 12:00</option>
                                <option>Dr. Ahmad Santoso - Spesialis Jantung | Senin, 08:00 - 12:00</option>
                                <option>Dr. Siti Nurhaliza - Spesialis Anak | Selasa, 09:00 - 13:00</option>
                                <!-- Tambah lainnya sesuai kebutuhan -->
                            </select>
                        </div>

                        <!-- Keluhan -->
                        <div>
                            <label for="keluhan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Keluhan
                            </label>
                            <textarea id="keluhan" rows="4" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="Tuliskan keluhan Anda..."></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="flex items-center gap-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Buat Janji
                            </button>

                            @if (session('status') === 'janji-periksa-created')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-green-600 dark:text-green-400">
                                    {{ __('Berhasil Dibuat.') }}
                                </p>
                            @endif
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
