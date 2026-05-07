<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Super Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Selamat datang, Super Admin!</h3>
                    <p>Ini adalah halaman dashboard super admin. Anda memiliki akses penuh ke semua fitur termasuk manajemen admin dan pengaturan sistem.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
