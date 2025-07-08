<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="flex justify-start mb-4">
        
    </div>

    <div class="py-2">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">
                <div class="p-6 text-gray-900">
                    <ul>
                        @foreach($companies as $company)
                            <li class="mb-4 hover:bg-gray-100 transition duration-300 ease-in-out transform hover:scale-105">
                                <a href="{{ route('dashboard.listByCompany', ['companyId' => $company->id]) }}" class="block text-black hover:text-blue-800 hover:underline p-4 bg-gray-50 rounded-lg shadow-md">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V7M5 7l7 5 7-5"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <span class="font-semibold text-black">{{ $company->name }}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
