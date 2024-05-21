<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('DiBest Spot Marketplaces') }}
        </h2>
    </x-slot>
    <div class="container">
        <h2>Create New Platform</h2>
        <form action="{{ route('platform.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div>
                <x-input-label for="name" :value="__('Name:')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>


            <div>
                <x-input-label for="slug" :value="__('Slug:')" />
                <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" :value="old('slug', $user->slug)" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('slug')" />
            </div>

            <div>
                <x-input-label for="logo" :value="__('Logo: ')" />
                <x-text-input id="logo" name="logo" type="text" class="mt-1 block w-full" :value="old('logo', $user->logo)" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('logo')" />
            </div>

            <div>
                <x-input-label for="photo" :value="__('Photo: ')" />
                <x-text-input id="photo" name="photo" type="text" class="mt-1 block w-full" :value="old('photo', $user->photo)" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('photo')" />
            </div>


            <div>
                <x-input-label for="url" :value="__('Url: ')" />
                <x-text-input id="url" name="url" type="text" class="mt-1 block w-full" :value="old('url', $user->url)" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('url')" />
            </div>

            <div>
                <x-input-label for="domain" :value="__('Domain: ')" />
                <x-text-input id="domain" name="domain" type="text" class="mt-1 block w-full" :value="old('domain', $user->domain)" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('domain')" />
            </div>


            <div>
                <x-input-label for="homepage_url" :value="__('HomePage URL')" />
                <x-text-input id="homepage_url" name="homepage_url" type="text" class="mt-1 block w-full" :value="old('homepage_url', $user->homepage_url)" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('homepage_url')" />
            </div>


            <div>
                <x-input-label for="smtp" :value="__('SMTP: ')" />
                <x-text-input id="smtp" name="smtp" type="text" class="mt-1 block w-full" :value="old('smtp', $user->smtp)" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('smtp')" />
            </div>


            <div>
                <x-input-label for="support_email" :value="__('Email: ')" />
                <x-text-input id="support_email" name="support_email" type="text" class="mt-1 block w-full" :value="old('support_email', $user->support_email)" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('support_email')" />
            </div>


            <div>
                <x-input-label for="description" :value="__('Description: ')" />
                <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $user->description)" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>



                <input type="checkbox" class="form-check-input" id="auto_login" name="auto_login">


                <div class="mb-3">
                <label for="auto_register" class="form-label">Auto Register</label>
                <input type="checkbox" class="form-check-input" id="auto_register" name="auto_register">
            </div>

            <div class="mb-3">
                <label for="admin_email" class="form-label">Admin Email</label>
                <input type="email" class="form-control" id="admin_email" name="admin_email"
                    placeholder="Enter admin email">
            </div>

            <div class="mb-3">
                <label for="admin_url" class="form-label">Admin URL</label>
                <input type="text" class="form-control" id="admin_url" name="admin_url"
                    placeholder="Enter admin URL">
            </div>

            <div class="mb-3">
                <label for="metadata" class="form-label">Metadata</label>
                <textarea class="form-control" id="metadata" name="metadata" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="settings" class="form-label">Settings</label>
                <textarea class="form-control" id="settings" name="settings" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="api_keys" class="form-label">API Keys</label>
                <textarea class="form-control" id="api_keys" name="api_keys" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="api_url" class="form-label">API URL</label>
                <input type="text" class="form-control" id="api_url" name="api_url"
                    placeholder="Enter API URL">
            </div>

            <div class="mb-3">
                <label for="webhook_url" class="form-label">Webhook URL</label>
                <input type="text" class="form-control" id="webhook_url" name="webhook_url"
                    placeholder="Enter webhook URL">
            </div>

            <div class="mb-3">
                <label for="callback_url" class="form-label">Callback URL</label>
                <input type="text" class="form-control" id="callback_url" name="callback_url"
                    placeholder="Enter callback URL">
            </div>

            <div class="mb-3">
                <label for="redirect_url" class="form-label">Redirect URL</label>
                <input type="text" class="form-control" id="redirect_url" name="redirect_url"
                    placeholder="Enter redirect URL">
            </div>

            <div class="mb-3">
                <label for="environment" class="form-label">Environment</label>
                <select class="form-select" id="environment" name="environment">
                    <option selected>Development</option>
                    <option>Production</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select" id="type" name="type">
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

            <button type="submit" class="btn btn-primary">Create Platform</button>
        </form>
    </div>
</x-admin-app-layout>
