<x-admin-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Edit ' . $platform->name . ' Platform') }}
            </h2>
            <a href="{{ route('admin.platform.index') }}" class="text-blue-500">
                <x-primary-button>{{ __('View All') }}</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.platform.update', $platform->id) }}" method="POST"
                    enctype="multipart/form-data">
                    <div class="grid grid-cols-2 gap-6 p-6 text-gray-900 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name:')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name', $platform->name)" require />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description: ')" />
                            <x-textarea-input id="description" name="description" type="text"
                                class="mt-1 block w-full" required>
                                {{ old('description', $platform->description) }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        {{-- <div>
                            <x-input-label for="slug" :value="__('Slug:')" />
                            <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full"
                                :value="old('slug',$platform->slug)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div> --}}

                        <div>
                            <x-input-label for="url" :value="__('URL: ')" />
                            <x-text-input id="url" name="url" type="text" class="mt-1 block w-full"
                                :value="old('url', $platform->url)" />
                            <x-input-error class="mt-2" :messages="$errors->get('url')" />
                        </div>

                        <div>
                            <x-input-label for="domain" :value="__('Domain: ')" />
                            <x-text-input id="domain" name="domain" type="text" class="mt-1 block w-full"
                                :value="old('domain', $platform->domain)" />
                            <x-input-error class="mt-2" :messages="$errors->get('domain')" />
                        </div>

                        <div>
                            <x-input-label for="homepage" :value="__('HomePage URL')" />
                            <x-text-input id="homepage" name="homepage" type="text" class="mt-1 block w-full"
                                :value="old('homepage', $platform->homepage)" />
                            <x-input-error class="mt-2" :messages="$errors->get('homepage')" />
                        </div>


                        <div>
                            <x-input-label for="smtp" :value="__('SMTP: ')" />
                            <x-text-input id="smtp" name="smtp" type="text" class="mt-1 block w-full"
                                :value="old('smtp', $platform->smtp)" />
                            <x-input-error class="mt-2" :messages="$errors->get('smtp')" />
                        </div>

                        <div>
                            <x-input-label for="admin_email" :value="__('Admin Email: ')" />
                            <x-text-input id="admin_email" name="admin_email" type="text" class="mt-1 block w-full"
                                :value="old('admin_email', $platform->admin_email)" />
                            <x-input-error class="mt-2" :messages="$errors->get('admin_email')" />
                        </div>


                        <div>
                            <x-input-label for="support_email" :value="__('Support Email: ')" />
                            <x-text-input id="support_email" name="support_email" type="text"
                                class="mt-1 block w-full" :value="old('support_email', $platform->support_email)" />
                            <x-input-error class="mt-2" :messages="$errors->get('support_email')" />
                        </div>

                        {{-- <div class="mb-3">
                            <x-input-label for="country" :value="__('Country')" />
                                @include('components.countries')
                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div> --}}

                        <div class="mb-3">
                            <x-input-label for="auto_register" :value="__('Auto Register: ')" />
                            <select id="auto_register" name="auto_register"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="enabled" @selected($platform->auto_register === 'enabled')>Enabled</option>
                                <option value="disabled" @selected($platform->auto_register === 'disabled')>Disabled</option>
                                <option value="blocked" @selected($platform->auto_register === 'blocked')>Blocked</option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <x-input-label for="auto_login" :value="__('Auto Login: ')" />
                            <select id="auto_login" name="auto_login"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="enabled" @selected($platform->auto_login === 'enabled')>Enabled</option>
                                <option value="disabled" @selected($platform->auto_login === 'disabled')>Disabled</option>
                                <option value="blocked" @selected($platform->auto_login === 'blocked')>Blocked</option>

                            </select>
                        </div>


                        <div>
                            <x-input-label for="admin_url" :value="__('Admin URL: ')" />
                            <x-text-input id="admin_url" name="admin_url" type="text" class="mt-1 block w-full"
                                :value="old('admin_url', $platform->admin_url)" />
                            <x-input-error class="mt-2" :messages="$errors->get('admin_url')" />
                        </div>

                        <div>
                            <x-input-label for="auto_login_url" :value="__('Auto Login URL: ')" />
                            <x-text-input id="auto_login_url" name="auto_login_url" type="text"
                                class="mt-1 block w-full" :value="old('auto_login_url', $platform->auto_login_url)" />
                            <x-input-error class="mt-2" :messages="$errors->get('auto_login_url')" />
                        </div>

                        {{-- <div>
                            <x-input-label for="metadata" :value="__('MetaData: ')" />
                            <x-text-input id="metadata" name="metadata" type="text" class="mt-1 block w-full"
                                :value="old('metadata',$platform->metadata)" />
                            <x-input-error class="mt-2" :messages="$errors->get('metadata')" />
                        </div>

                        <div>
                            <x-input-label for="setting" :value="__('Setting: ')" />
                            <x-text-input id="setting" name="setting" type="text" class="mt-1 block w-full"
                                :value="old('setting',$platform->setting)" />
                            <x-input-error class="mt-2" :messages="$errors->get('setting')" />
                        </div> --}}

                        <div>
                            <x-input-label for="api_keys" :value="__('Api Key: ')" />
                            <x-text-input id="api_keys" name="api_keys" type="text" class="mt-1 block w-full"
                                :value="old('api_keys', $platform->api_keys)" />
                            <x-input-error class="mt-2" :messages="$errors->get('api_keys')" />
                        </div>

                        <div>
                            <x-input-label for="public_key" :value="__('Public key: ')" />
                            <x-text-input id="public_key" name="public_key" type="text" class="mt-1 block w-full"
                                :value="old('public_key', $platform->public_key)" />
                            <x-input-error class="mt-2" :messages="$errors->get('smtp')" />
                        </div>


                        <div>
                            <x-input-label for="secret_key" :value="__('Secret key: ')" />
                            <x-text-input id="secret_key" name="secret_key" type="text" class="mt-1 block w-full"
                                :value="old('secret_key', $platform->secret_key)" />
                            <x-input-error class="mt-2" :messages="$errors->get('secret_key')" />
                        </div>


                        {{-- <div>
                            <x-input-label for="api_url" :value="__('Api URL ')" />
                            <x-text-input id="api_url" name="api_url" type="text" class="mt-1 block w-full"
                                :value="old('api_url',$platform->api_url)" />
                            <x-input-error class="mt-2" :messages="$errors->get('api_url')" />
                        </div>

                        <div>
                            <x-input-label for="webhook_url" :value="__('WebHook URL: ')" />
                            <x-text-input id="webhook_url" name="webhook_url" type="text"
                                class="mt-1 block w-full" :value="old('webhook_url',$platform->webhook_url)" />
                            <x-input-error class="mt-2" :messages="$errors->get('webhook_url')" />
                        </div>

                        <div>
                            <x-input-label for="callback_url" :value="__('Callback URL')" />
                            <x-text-input id="callback_url" name="callback_url" type="text"
                                class="mt-1 block w-full" :value="old('callback_url',$platform->callback_url)" />
                            <x-input-error class="mt-2" :messages="$errors->get('callback_url')" />
                        </div>

                        <div>
                            <x-input-label for="redirect_url" :value="__('Redirect URL: ')" />
                            <x-text-input id="redirect_url" name="redirect_url" type="text"
                                class="mt-1 block w-full" :value="old('redirect_url',$platform->redirect_url)" />
                            <x-input-error class="mt-2" :messages="$errors->get('redirect_url')" />
                        </div> --}}

                        <div class="mb-3">
                            <x-input-label for="environment" :value="__('Environment: ')" />
                            <select id="environment" name="environment"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="development" @selected($platform->environment === 'development')>Development</option>
                                <option value="staging" @selected($platform->environment === 'staging')>Staging</option>
                                <option value="production" @selected($platform->environment === 'production')>Production</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <x-input-label for="type" :value="__('Type: ')" />
                            <select id="type" name="type"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="payment" @selected($platform->type === 'payment')>Payment</option>
                                <option value="marketplace" @selected($platform->type === 'marketplace')>Marketplace</option>
                                <option value="crowdfunding" @selected($platform->type === 'crowdfunding')>Crowdfunding</option>
                                <option value="e-commerce" @selected($platform->type === 'e-commerce')>E-commerce</option>
                                <option value="social" @selected($platform->type === 'social')>Social</option>
                                <option value="other" @selected($platform->type === 'other')>Other</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <x-input-label for="category" :value="__('Category: ')" />
                            <select id="category" name="category"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="finance" @selected($platform->category === 'finance')>Finance</option>
                                <option value="entertainment" @selected($platform->category === 'entertainment')>Entertainment</option>
                                <option value="education" @selected($platform->category === 'education')>Education</option>
                                <option value="health" @selected($platform->category === 'health')>Health</option>
                                <option value="news" @selected($platform->category === 'news')>News</option>
                                <option value="social" @selected($platform->category === 'social')>Social</option>
                                <option value="other" @selected($platform->category === 'other')>Other</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <x-input-label for="allowed_packages" :value="__('Allowed Packages: ')" />
                            <select id="allowed_packages" name="allowed_packages[]" multiple
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @php
                                    $currentPackages = json_decode($platform->allowed_packages);
                                @endphp
                                @foreach ($allowed_packages as $package)
                                    <option value="{{ $package->id }}" @selected(in_array($package->id, $currentPackages))>
                                        {{ $package->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <x-input-label for="status" :value="__('Status: ')" />
                            <select id="status" name="status"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="active" @selected($platform->status === 'active')>Active</option>
                                <option value="inactive" @selected($platform->status === 'inactive')>Inactive</option>
                                <option value="suspended" @selected($platform->status === 'suspended')>Suspended</option>
                                <option value="pending" @selected($platform->status === 'pending')>Pending</option>
                                <option value="maintenance" @selected($platform->status === 'maintenance')>Maintenance</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <x-input-label for="logo" :value="__('Logo: ')" class="w-1/4" />
                            <label for="logo"
                                class="mt-1 flex w-full cursor-pointer items-center justify-center rounded-lg border border-blue-500 bg-white px-4 py-2 text-blue-700 shadow-sm hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <svg class="mr-2 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 16v-2a4 4 0 014-4h10a4 4 0 014 4v2M7 16v6h10v-6M8 12l4-4m0 0l4 4m-4-4v16" />
                                </svg>
                                <span>Choose a logo</span>
                                <input id="logo" name="logo" type="file" class="sr-only"
                                    :value="old('logo')" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="photo" :value="__('Photo: ')" class="w-1/4" />
                            <label for="photo"
                                class="mt-1 flex w-full cursor-pointer items-center justify-center rounded-lg border border-blue-500 bg-white px-4 py-2 text-blue-700 shadow-sm hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <svg class="mr-2 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 16v-2a4 4 0 014-4h10a4 4 0 014 4v2M7 16v6h10v-6M8 12l4-4m0 0l4 4m-4-4v16" />
                                </svg>
                                <span>Choose a photo</span>
                                <input id="photo" name="photo" type="file" class="sr-only"
                                    :value="old('photo')" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
                        </div>
                    </div>

                    <div class="mb-3 flex justify-between px-6">
                        <a href="{{ route('admin.platform.index') }}"><x-secondary-button
                                :>{{ __('Go Back') }}</x-secondary-button></a>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</x-admin-app-layout>
