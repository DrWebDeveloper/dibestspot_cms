<x-admin-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __($package->name . ' Package') }}
            </h2>
            <a href="{{ route('admin.package.index') }}" class="text-blue-500">
                <x-primary-button>{{ __('View All') }}</x-primary-button>
            </a>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid w-full grid-cols-1 gap-6 p-6 text-gray-900">
                    <div class="flex flex-col overflow-hidden rounded-lg bg-white shadow-lg lg:flex-row">
                        <div class="h-48 flex-none overflow-hidden bg-cover text-center lg:h-auto lg:w-48"
                            style="background-image: url({{ asset('storage/' . $package->photo) }})"
                            title="{{ $package->name }}">
                        </div>
                        <div class="flex flex-col justify-between p-4 leading-normal lg:w-full">
                            <div class="mb-8">
                                <p class="flex items-center text-sm text-gray-600">
                                    <svg class="mr-2 h-3 w-3 fill-current text-gray-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                                    </svg>
                                    Members only
                                </p>
                                <div class="mb-2 text-xl font-bold text-gray-900">{{ $package->name }}</div>
                                <p class="text-base text-gray-700">{{ $package->description }}</p>
                            </div>
                            <div class="flex items-center">
                                <img class="mr-4 h-10 w-10 rounded-full" src="{{ asset('storage/' . $package->logo) }}"
                                    alt="{{ $package->name }}">
                                <div class="text-sm">
                                    <p class="leading-none text-gray-900">{{ $package->name }}</p>
                                    <p class="text-gray-600">Aug 18</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
