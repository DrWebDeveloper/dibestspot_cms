<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('DiBest Spot Marketplaces') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-2 gap-6 p-6 text-gray-900 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2">
                    @forelse($userMarketplaces as $marketplace)
                        <div
                            class="overflow-hidden border-2 border-sky-900 bg-white shadow-md hover:bg-gray-500 sm:rounded-lg">
                            <div class="bg-white p-6">
                                <h2 class="text-2xl font-bold text-gray-800">{{ $marketplace->platform->name }}</h2>
                                <p class="text-gray-600">{{ Str::limit($marketplace->platform->description, 100) }}</p>
                                <div class="mt-4">
                                    <a href="{{ $marketplace->platform->homepage }}" target="_blank" class="text-blue-500">Explore</a>
                                    <a href="{{ route('user.marketplace.login', $marketplace->id) }}"
                                        class="text-blue-500">
                                        <x-primary-button class="ms-3">
                                            {{ __('Access Now') }}
                                        </x-primary-button>
                                    </a>
                                </div>
                                <!-- Centered Horizontal Line -->
                                <hr class="mx-auto my-4 w-1/2 border-t-2 border-gray-300">

                                <!-- Additional Information Section -->
                                <div class="flex flex-col space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Last Login:</span>
                                        <span
                                            class="text-muted font-semibold text-gray-800">{{ $marketplace->platform_user_last_login }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Current Plan:</span>
                                        <span
                                            class="text-xl font-semibold text-gray-800">{{ $marketplace->listings_count }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Status:</span>
                                        <span
                                            class="text-xl font-semibold text-green-600">{{ ucfirst($marketplace->platform_user_status) }}</span>
                                            {{-- class="text-xl font-semibold text-gray-800">${{ number_format($marketplace->revenue, 2) }}</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        @if (auth()->user()->status === 'active')
                            <div class="text-center">
                                <p class="text-gray-600">You have not connected any marketplace yet.</p>
                                <a href="{{ route('user.marketplaces') }}" class="text-blue-500">Connect Now</a>
                            </div>
                        @elseif(auth()->user()->status === 'pending')
                            <div class="text-center">
                                <p class="text-gray-600">Your account is pending approval.</p>
                            </div>
                        @elseif(auth()->user()->status === 'suspended')
                            <div class="text-center">
                                <p class="text-gray-600">Your account has been suspended.</p>
                            </div>
                        @elseif(auth()->user()->status === 'inactive')
                            <div class="text-center">
                                <p class="text-gray-600">Your account is inactive.</p>
                            </div>
                        @elseif(auth()->user()->status === 'rejected')
                            <div class="text-center">
                                <p class="text-gray-600">Your account has been rejected.</p>
                            </div>
                        @elseif(auth()->user()->status === 'blocked')
                            <div class="text-center">
                                <p class="text-gray-600">Your account has been blocked.</p>
                            </div>
                        @elseif(auth()->user()->status === 'deleted')
                            <div class="text-center">
                                <p class="text-gray-600">Your account has been deleted.</p>
                            </div>
                        @elseif(auth()->user()->status === 'propagating')
                            <div class="text-center">
                                <p class="text-gray-600">Your account is under propagation, please wait a few minutes.</p>
                                <a href="{{ route('dashboard') }}"><x-primary-button class="ms-3">{{ __('Refresh') }}</x-primary-button></a>
                            </div>
                        @endif
                    @endforelse

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
