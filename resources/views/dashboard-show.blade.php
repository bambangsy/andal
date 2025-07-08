<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex justify-start mb-4">
        
    </div>

    <div class="py-2">
        <div class="max-w-full mx-auto sm:px-6 lg:px-12 pb-6">
            <a href="{{ url()->previous() }}" class="inline-flex items-center px-6 py-3 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-200 focus:bg-gray-200 active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('< Back') }}
            </a>
        </div>
        <div class="max-w-full mx-auto sm:px-6 lg:px-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto; resize: vertical;">
                        <iframe title="dashboard penjualan" class="absolute top-0 left-0 w-full h-full" src="{{ $dashboard->link }}" frameborder="0" allowfullscreen></iframe>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
