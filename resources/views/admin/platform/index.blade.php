<x-admin-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Platforms') }} ({{ $platforms_count }})
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
                            class="mb-4 overflow-hidden border-2 border-sky-900 bg-white shadow-md hover:bg-gray-100 sm:rounded-lg">
                            <div class="flex items-center justify-between border-b border-gray-200 bg-white p-6">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-800">{{ $platform->name }}</h2>
                                    <p class="text-gray-600">{{ Str::limit($platform->description, 100) }}</p>
                                </div>
                                <div class="flex items-center">
                                    <a href="{{ route('admin.platform.show', $platform->id) }}" class="text-blue-500">
                                        <x-success-button class="ms-3">{{ __('View') }}</x-success-button>
                                    </a>
                                    <a href="{{ route('admin.platform.edit', $platform->id) }}" class="text-blue-500">
                                        <x-primary-button class="ms-3">{{ __('Edit') }}</x-primary-button>
                                    </a>
                                    {{-- @if($platform->accounts->count())
                                        <a href="#"
                                            class="text-blue-500">
                                            <x-danger-button class="ms-3" disabled>{{ __('Delete') }}</x-danger-button>
                                        </a>
                                        @else
                                        <a href="{{ route('admin.platform.destroy', $platform->id) }}"
                                            class="text-blue-500">
                                            <x-danger-button class="ms-3">{{ __('Delete') }}</x-danger-button>
                                        </a>
                                    @endif --}}

                                    <form action="{{ route('admin.platform.destroy', $platform->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Platform?')">
                                        @csrf
                                        @method('DELETE')
                                            <x-danger-button class="ms-3">{{ __('Delete') }}</x-danger-button>
                                    </form>
                                </div>
                            </div>

                            <!-- Centered Half-Line -->
                            {{-- <div class="relative">
                                <div
                                    class="absolute left-1/2 mb-4 mt-4 w-1/2 -translate-x-1/2 transform border-t border-gray-300">
                                </div>
                            </div> --}}

                            <!-- Statistics Section -->
                            <div class="px-2 py-2">
                                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-2 md:grid-cols-3">
                                    <div>
                                        <p class="text-sm text-gray-500">No. of Users</p>
                                        <p class="text-3xl font-bold text-gray-800">{{ $platform->accounts->count() }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">No. of Vendors</p>
                                        <p class="text-3xl font-bold text-gray-800">{{ $platform->accounts->count() }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Active Now</p>
                                        <p class="text-3xl font-bold text-gray-800">{{ $platform->accounts->count() }}</p>
                                    </div>
                                    <!-- Add more statistics as needed -->
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-600">No platforms available.</div>
                    @endforelse


                    <div class="col-span-full">
                        {{ $platforms->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
