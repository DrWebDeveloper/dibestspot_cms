<x-admin-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Packages') }} ({{ $packages_count }})
            </h2>
            <a href="{{ route('admin.package.create') }}" class="text-blue-500">
                <x-primary-button>{{ __('Add New') }}</x-primary-button>
            </a>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-3 text-gray-900">
                    @forelse($packages as $package)
                        <div class="mb-4 overflow-hidden border-2 border-sky-900 bg-white shadow-md hover:bg-gray-100 sm:rounded-lg">
                            <div class="flex flex-col p-6 w-full">
                                <h2 class="text-2xl font-bold text-gray-800">{{ $package->name }}</h2>
                                <p class="text-gray-600">{{ Str::limit($package->description, 25) }}</p>
                            </div>

                            {{-- Statistics --}}
                            <div class="flex flex-col justify-between p-6 w-full">
                                <h1 class="text-xl font-bold text-gray-800">Statistics</h1>
                                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                                    <div>
                                        <p class="text-sm text-gray-500">Active</p>
                                        <p class="text-3xl font-bold text-gray-800">{{ $package->accounts->count() }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Expired</p>
                                        <p class="text-3xl font-bold text-gray-800">{{ $package->accounts->count() }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Platforms</p>
                                        <p class="text-3xl font-bold text-gray-800">{{ $package->accounts->count() }}</p>
                                    </div>
                                    <!-- Add more statistics as needed -->
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="flex items-center justify-center py-6">
                                <a href="{{ route('admin.package.show', $package->id) }}" class="text-blue-500">
                                    <x-success-button class="ms-3">{{ __('View') }}</x-success-button>
                                </a>
                                <a href="{{ route('admin.package.edit', $package->id) }}" class="text-blue-500">
                                    <x-primary-button class="ms-3">{{ __('Edit') }}</x-primary-button>
                                </a>
                                <form action="{{ route('admin.package.destroy', $package->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Package?')">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button class="ms-3">{{ __('Delete') }}</x-danger-button>
                                </form>
                            </div>

                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-600">No packages available.</div>
                    @endforelse

                    <div class="col-span-full">
                        {{ $packages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-admin-app-layout>
