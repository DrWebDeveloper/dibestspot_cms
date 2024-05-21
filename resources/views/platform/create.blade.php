<layouts.app_admin>

<div class="container">
            <h2>Create New Platform</h2>
            <form action="{{ route('platform.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug">
                </div>

                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>

                <div class="mb-3">
                    <label for="url" class="form-label">URL</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL">
                </div>

                <div class="mb-3">
                    <label for="domain" class="form-label">Domain</label>
                    <input type="text" class="form-control" id="domain" name="domain" placeholder="Enter domain">
                </div>

                <div class="mb-3">
                    <label for="homepage" class="form-label">Homepage</label>
                    <input type="text" class="form-control" id="homepage" name="homepage" placeholder="Enter homepage URL">
                </div>

                <div class="mb-3">
                    <label for="smtp" class="form-label">SMTP</label>
                    <input type="text" class="form-control" id="smtp" name="smtp" placeholder="Enter SMTP server">
                </div>

                <div class="mb-3">
                    <label for="support_email" class="form-label">Support Email</label>
                    <input type="email" class="form-control" id="support_email" name="support_email" placeholder="Enter support email">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="auto_login" class="form-label">Auto Login</label>
                    <input type="checkbox" class="form-check-input" id="auto_login" name="auto_login">
                </div>

                <div class="mb-3">
                    <label for="auto_register" class="form-label">Auto Register</label>
                    <input type="checkbox" class="form-check-input" id="auto_register" name="auto_register">
                </div>

                <div class="mb-3">
                    <label for="admin_email" class="form-label">Admin Email</label>
                    <input type="email" class="form-control" id="admin_email" name="admin_email" placeholder="Enter admin email">
                </div>

                <div class="mb-3">
                    <label for="admin_url" class="form-label">Admin URL</label>
                    <input type="text" class="form-control" id="admin_url" name="admin_url" placeholder="Enter admin URL">
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
                    <input type="text" class="form-control" id="api_url" name="api_url" placeholder="Enter API URL">
                </div>

                <div class="mb-3">
                    <label for="webhook_url" class="form-label">Webhook URL</label>
                    <input type="text" class="form-control" id="webhook_url" name="webhook_url" placeholder="Enter webhook URL">
                </div>

                <div class="mb-3">
                    <label for="callback_url" class="form-label">Callback URL</label>
                    <input type="text" class="form-control" id="callback_url" name="callback_url" placeholder="Enter callback URL">
                </div>

                <div class="mb-3">
                    <label for="redirect_url" class="form-label">Redirect URL</label>
                    <input type="text" class="form-control" id="redirect_url" name="redirect_url" placeholder="Enter redirect URL">
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
</layouts.app_admin>
