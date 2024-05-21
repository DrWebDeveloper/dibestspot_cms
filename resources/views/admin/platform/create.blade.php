<x-admin-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Add New Platform') }}
            </h2>
            <a href="{{ route('admin.platform.index') }}" class="text-blue-500">
                <x-primary-button>{{ __('View All') }}</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div>
                    <form class="grid grid-cols-2 gap-6 p-6 text-gray-900 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2" action="{{ route('platform.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name:')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name')" require />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="slug" :value="__('Slug:')" />
                            <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full"
                                :value="old('slug')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div>

                        <div>
                            <x-input-label for="logo" :value="__('Logo: ')" />
                            <x-text-input id="logo" name="logo" type="text" class="mt-1 block w-full"
                                :value="old('logo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                        </div>

                        <div>
                            <x-input-label for="photo" :value="__('Photo: ')" />
                            <x-text-input id="photo" name="photo" type="text" class="mt-1 block w-full"
                                :value="old('photo')" />
                            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
                        </div>


                        <div>
                            <x-input-label for="url" :value="__('Url: ')" />
                            <x-text-input id="url" name="url" type="text" class="mt-1 block w-full"
                                :value="old('url')" />
                            <x-input-error class="mt-2" :messages="$errors->get('url')" />
                        </div>

                        <div>
                            <x-input-label for="domain" :value="__('Domain: ')" />
                            <x-text-input id="domain" name="domain" type="text" class="mt-1 block w-full"
                                :value="old('domain')" />
                            <x-input-error class="mt-2" :messages="$errors->get('domain')" />
                        </div>


                        <div>
                            <x-input-label for="homepage" :value="__('HomePage URL')" />
                            <x-text-input id="homepage" name="homepage" type="text" class="mt-1 block w-full"
                                :value="old('homepage')" />
                            <x-input-error class="mt-2" :messages="$errors->get('homepage')" />
                        </div>


                        <div>
                            <x-input-label for="smtp" :value="__('SMTP: ')" />
                            <x-text-input id="smtp" name="smtp" type="text" class="mt-1 block w-full"
                                :value="old('smtp')" />
                            <x-input-error class="mt-2" :messages="$errors->get('smtp')" />
                        </div>


                        <div>
                            <x-input-label for="support_email" :value="__('Email: ')" />
                            <x-text-input id="support_email" name="support_email" type="text"
                                class="mt-1 block w-full" :value="old('support_email')" />
                            <x-input-error class="mt-2" :messages="$errors->get('support_email')" />
                        </div>


                        <div>
                            <x-input-label for="description" :value="__('Description: ')" />
                            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                                :value="old('description')" />
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>


                        <div>
                            <x-input-label for="auto_login" :value="__('Auto Login: ')" />
                            <x-text-input type="checkbox" id="auto_login" name="auto_login" type="text"
                                class="mt-1 block w-full" :value="old('auto_login')" />
                            <x-input-error class="mt-2" :messages="$errors->get('auto_login')" />
                        </div>


                        <div>
                            <x-input-label for="auto_register" :value="__('Auto Register: ')" />
                            <x-text-input type="checkbox" id="auto_register" name="auto_register" type="text"
                                class="mt-1 block w-full" :value="old('auto_register')" />
                            <x-input-error class="mt-2" :messages="$errors->get('auto_register')" />
                        </div>

                        <div>
                            <x-input-label for="admin_email" :value="__('Admin Email: ')" />
                            <x-text-input id="admin_email" name="admin_email" type="text" class="mt-1 block w-full"
                                :value="old('admin_email')" />
                            <x-input-error class="mt-2" :messages="$errors->get('admin_email')" />
                        </div>

                        <div>
                            <x-input-label for="admin_url" :value="__('Admin URL: ')" />
                            <x-text-input id="admin_url" name="admin_url" type="text" class="mt-1 block w-full"
                                :value="old('admin_url')" />
                            <x-input-error class="mt-2" :messages="$errors->get('admin_url')" />
                        </div>

                        <div>
                            <x-input-label for="metadata" :value="__('MetaData: ')" />
                            <x-text-input id="metadata" name="metadata" type="text" class="mt-1 block w-full"
                                :value="old('metadata')" />
                            <x-input-error class="mt-2" :messages="$errors->get('metadata')" />
                        </div>

                        <div>
                            <x-input-label for="setting" :value="__('Setting: ')" />
                            <x-text-input id="setting" name="setting" type="text" class="mt-1 block w-full"
                                :value="old('setting')" />
                            <x-input-error class="mt-2" :messages="$errors->get('setting')" />
                        </div>

                        <div>
                            <x-input-label for="api_keys" :value="__('Api Key: ')" />
                            <x-text-input id="api_keys" name="api_keys" type="text" class="mt-1 block w-full"
                                :value="old('api_keys')" />
                            <x-input-error class="mt-2" :messages="$errors->get('api_keys')" />
                        </div>

                        <div>
                            <x-input-label for="api_url" :value="__('Api URL ')" />
                            <x-text-input id="api_url" name="api_url" type="text" class="mt-1 block w-full"
                                :value="old('api_url')" />
                            <x-input-error class="mt-2" :messages="$errors->get('api_url')" />
                        </div>

                        <div>
                            <x-input-label for="webhook_url" :value="__('WebHook URL: ')" />
                            <x-text-input id="webhook_url" name="webhook_url" type="text"
                                class="mt-1 block w-full" :value="old('webhook_url')" />
                            <x-input-error class="mt-2" :messages="$errors->get('webhook_url')" />
                        </div>

                        <div>
                            <x-input-label for="callback_url" :value="__('Callback URL')" />
                            <x-text-input id="callback_url" name="callback_url" type="text"
                                class="mt-1 block w-full" :value="old('callback_url')" />
                            <x-input-error class="mt-2" :messages="$errors->get('callback_url')" />
                        </div>

                        <div>
                            <x-input-label for="redirect_url" :value="__('Redirect URL: ')" />
                            <x-text-input id="redirect_url" name="redirect_url" type="text"
                                class="mt-1 block w-full" :value="old('redirect_url')" />
                            <x-input-error class="mt-2" :messages="$errors->get('redirect_url')" />
                        </div>

                        <div>
                            <x-input-label for="enviornment" :value="__('Enviornment: ')" />
                            <x-text-input id="enviornment" name="enviornment" type="text"
                                class="mt-1 block w-full" :value="old('enviornment')" />
                            <x-input-error class="mt-2" :messages="$errors->get('enviornment')" />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="type" :value="__('Type: ')" />
                            <select id="type" name="type"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option selected>Website</option>
                                <option>App</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category">
                                <option selected>General</option>
                                <option>Ecommerce</option>
                                <option>Blog</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country" name="country">
                                <option selected>United States</option>
                                <option>Canada</option>
                                <!-- Add more countries as needed -->
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option selected>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>

                        <div class="mb-3 flex justify-between">
                            <x-secondary-button>{{ __('Go Back') }}</x-secondary-button>
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
