<x-admin-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Platforms') }} ({{ $platforms->count() }})
            </h2>
            <a href="{{ route('admin.platform.create') }}" class="text-blue-500">
                <x-primary-button>{{ __('Add New') }}</x-primary-button>
            </a>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 gap-6 p-6 text-gray-900">
                    @forelse($platforms as $platform)
                        <div
                            class="mb-4 overflow-hidden border-2 border-sky-900 bg-white shadow-md hover:bg-gray-500 sm:rounded-lg">
                            <div class="flex items-center justify-between border-b border-gray-200 bg-white p-6">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-800">{{ $platform->name }}</h2>
                                    <p class="text-gray-600">{{ Str::limit($platform->description, 100) }}</p>
                                </div>
                                <div class="flex items-center">
                                    <a href="#" class="text-blue-500">
                                        <x-secondary-button class="ms-3">{{ __('View') }}</x-secondary-button>
                                    </a>
                                    <a href="{{ route('admin.platform.edit', $platform->id) }}" class="text-blue-500">
                                        <x-primary-button class="ms-3">{{ __('Edit') }}</x-primary-button>
                                    </a>
                                    <a href="{{ route('admin.platform.destroy', $platform->id) }}" class="text-blue-500">
                                        <x-danger-button class="ms-3">{{ __('Delete') }}</x-danger-button>
                                    </a>
                                </div>
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
