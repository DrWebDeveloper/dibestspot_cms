<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('DiBest Spot Marketplaces') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-2 gap-6 p-6 text-gray-900 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2">
                    @forelse($platforms as $platform)
                        <div
                            class="overflow-hidden border-2 border-sky-900 bg-white shadow-md hover:bg-gray-500 sm:rounded-lg">
                            <div class="border-b border-gray-200 bg-white p-6">
                                <h2 class="text-2xl font-bold text-gray-800">{{ $platform->name }}</h2>
                                <p class="text-gray-600">{{ Str::limit($platform->description, 100) }}</p>
                                <a href="#" class="text-blue-500">Explore</a>
                                <a href="{{ route('user.marketplace.login',$platform->id) }}" class="text-blue-500">
                                    <x-primary-button class="ms-3">
                                        {{ __('Access Now') }}
                                    </x-primary-button></a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-600">No marketplaces available.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</x-admin-app-layout>
