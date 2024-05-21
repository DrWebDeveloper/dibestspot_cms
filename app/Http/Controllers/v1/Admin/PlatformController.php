<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PlatformController extends Controller
{

    public function create()
    {
        return view('admin.platform.create');
    }
    public function index()
    {
        $platforms = Platform::all();
        return view('admin.platform.index', compact('platforms'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->name),

        ]);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|alpha_dash|unique:platforms,slug',
            'description' => 'required|string',
            'url' => 'required|url',
            'domain' => 'required|string|max:255',
            'homepage' => 'nullable|string',
            'smtp' => 'nullable|string',
            'admin_email' => 'required|email|max:255',
            'support_email' => 'required|email|max:255',
            'auto_register' => 'required|in:enabled,disabled',
            'auto_login' => 'required|in:enabled,disabled',
            'admin_url' => 'nullable|url|max:255',
            'auto_login_url' => 'nullable|url|max:255',
            'api_keys' => 'nullable|string',
            'public_key' => 'nullable|string',
            'secret_key' => 'nullable|string',
            'environment' => 'required|in:staging,production,development',
            'type' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive,suspended,pending,maintenance',
        ]);

        if (Platform::create($validatedData)) {
            flash()->success('Platform created successfully');
            return redirect()->route('admin.platform.index');
        }
    }

    public function edit(Platform $platform)
    {
        return view('admin.platform.edit', compact('platform'));
    }

    public function show(Platform $platform)
    {
        return view('admin.platform.show', compact('platform'));
    }

    public function update(Request $request, Platform $platform)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|alpha_dash|unique:platforms,slug',
            'description' => 'required|string',
            'url' => 'required|url',
            'domain' => 'required|string|max:255',
            'homepage' => 'nullable|string',
            'smtp' => 'nullable|string',
            'admin_email' => 'required|email|max:255',
            'support_email' => 'required|email|max:255',
            'auto_register' => 'required|in:enabled,disabled',
            'auto_login' => 'required|in:enabled,disabled',
            'admin_url' => 'nullable|url|max:255',
            'auto_login_url' => 'nullable|url|max:255',
            'api_keys' => 'nullable|string',
            'public_key' => 'nullable|string',
            'secret_key' => 'nullable|string',
            'environment' => 'required|in:staging,production,development',
            'type' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive,suspended,pending,maintenance',
        ]);

        $platform->update($validatedData);

        flash()->success('success', 'Platform updated successfully.');
        return redirect()->route('platform.index');
    }

    public function destroy(Platform $platform)
    {
        $platform->delete();

        flash()->error('success', 'Platform deleted successfully.');
        return redirect()->route('platform.index');
    }
}
