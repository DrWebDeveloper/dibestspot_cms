<x-admin-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Add New Package') }}
            </h2>
            <a href="{{ route('admin.package.index') }}" class="text-blue-500">
                <x-primary-button>{{ __('View All') }}</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                {{ dump($errors) }}
                <form action="{{ route('admin.package.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="grid grid-cols-2 gap-6 p-6 text-gray-900 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name:')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name')" require />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description: ')" />
                            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                                :value="old('description')" />
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>



                        {{-- <div>
                            <x-input-label for="url" :value="__('URL: ')" />
                            <x-text-input id="url" name="url" type="text" class="mt-1 block w-full"
                                :value="old('url')" />
                            <x-input-error class="mt-2" :messages="$errors->get('url')" />
                        </div> --}}

                        <div>
                            <x-input-label for="price" :value="__('Price: ')" />
                            <x-text-input id="price" name="price" type="text" class="mt-1 block w-full"
                                :value="old('price')" />
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>

                        <div>
                            <x-input-label for="currency" :value="__('Currency')" />
                            <select id="currency" name="currency"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="usd" selected>USD</option>
                            <option value="pkr">PKR</option>
                        </select>
                            <x-input-error class="mt-2" :messages="$errors->get('currency')" />
                        </div>


                        <div>
                            <x-input-label for="duration" :value="__('Duration: ')" />
                            <x-text-input id="duration" name="duration" type="text" class="mt-1 block w-full"
                                :value="old('duration')" />
                            <x-input-error class="mt-2" :messages="$errors->get('duration')" />
                        </div>

                        <div>
                            <x-input-label for="duration_unit" :value="__('Duration Unit: ')" />
                            <select id="duration_unit" name="duration_unit"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="day" selected>Day</option>
                            <option value="month">Month</option>
                        </select>
                            <x-input-error class="mt-2" :messages="$errors->get('duration_unit')" />
                        </div>


                        <div>
                            <x-input-label for="trial" :value="__('Trial: ')" />
                            <x-text-input id="trial" name="trial" type="text"
                                class="mt-1 block w-full" :value="old('trial')" />
                            <x-input-error class="mt-2" :messages="$errors->get('trial')" />
                        </div>


                        <div>
                            <x-input-label for="trial_unit" :value="__('Trail Unit: ')" />
                            <select id="trial_unit" name="trial_unit"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="day" selected>Day</option>
                            <option value="month">Month</option>
                        </select>
                            <x-input-error class="mt-2" :messages="$errors->get('trial_unit')" />
                        </div>




                        <div>
                            <x-input-label for="discount" :value="__('Discount: ')" />
                            <x-text-input id="discount" name="discount" type="text" class="mt-1 block w-full"
                                :value="old('discount')" />
                            <x-input-error class="mt-2" :messages="$errors->get('discount')" />
                        </div>


                         <div>
                            <x-input-label for="discount_unit" :value="__('Discount Unit ')" />
                                <select id="discount_unit" name="discount_unit"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="percentage" selected>Percentage</option>
                                <option value="fixed">Fixed</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('discount_unit')" />
                        </div>


                        <div class="mb-3">
                            <x-input-label for="type" :value="__('Type: ')" />
                            <select id="type" name="type"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="payment" selected>Payment</option>
                                <option value="marketplace" selected>Marketplace</option>
                                <option value="crowdfunding">Crowdfunding</option>
                                <option value="e-commerce">E-commerce</option>
                                <option value="social">Social</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        {{-- <div class="mb-3">
                            <x-input-label for="package" :value="__('Default Package: ')" />
                            <select id="package" name="package"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="free" selected>Free</option>
                                <option value="basic" selected>Basic</option>
                                <option value="premium">Premium</option>
                            </select>
                        </div> --}}

                        <div class="mb-3">
                            <x-input-label for="category" :value="__('Category: ')" />
                            <select id="category" name="category"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option selected>Finance</option>
                                <option value="entertainment">Entertainment</option>
                                <option value="education">Education</option>
                                <option value="health">Health</option>
                                <option value="news">News</option>
                                <option value="social">Social</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <x-input-label for="status" :value="__('Status: ')" />
                            <select id="status" name="status"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="draft" selected>Draft</option>
                                <option value="published">Published</option>
                                <option value="archieved">Archieved</option>
                                <option value="deleted">Deleted</option>
                                <option value="limited">Limited</option>
                            </select>
                        </div>



                        <div class="mb-3 flex justify-between px-6">
                            <a href="{{ route('admin.package.index') }}">
                                <x-secondary-button>{{ __('Go Back') }}</x-secondary-button>
                            </a>
                            <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-app-layout>
