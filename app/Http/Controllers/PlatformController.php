<?php

namespace App\Http\Controllers;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class PlatformController extends Controller
{

    public function create()
{
    return view('platform.create');
}

public function index(){
    $platform = Platform::all();
    return view('platform.index', compact('platform'));
}

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'slug' => 'required|max:255|unique:platforms',
        'logo' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        'photo' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        'url' => 'required|url',
        'domain' => ['required', Rule::in(['http://', 'https://']). '|^[\w\-]+(\.[\w\-]+)*\.[a-zA-Z]{2,6}$'],        'homepage' => 'required|url',
        'smtp' => 'required|string',
        'support_email' => 'required|email',
        'description' => 'required|string',
        'auto_login' => 'required|boolean',
        'auto_register' => 'required|boolean',
        'admin_email' => 'required|email',
        'admin_url' => 'required|url',
        'metadata' => 'sometimes|array',
        'settings' => 'sometimes|array',
        'api_keys' => 'sometimes|array',
        'api_url' => 'required|url',
        'webhook_url' => 'required|url',
        'callback_url' => 'required|url',
        'redirect_url' => 'required|url',
        'environment' => 'required|in:development,production',
        'type' => 'required|in:website,app',
        'category' => 'required|in:general,ecommerce,blog',
        'country' => 'required|string',
        'status' => 'required|in:active,inactive',
    ]);



    $platform = new Platform($validatedData);
    $platform->save();

    return redirect()->route('platform.index')
                    ->with('success', 'Platform created successfully.');
}

public function edit(Platform $platform)
{
    return view('platform.edit', compact('platform'));
}

public function show(Platform $platform)
{
    return view('platform.show', compact('platform'));
}

public function update(Request $request, Platform $platform)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'slug' => 'required|max:255|unique:platforms',
        'logo' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        'photo' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        'url' => 'required|url',
        'domain' => 'required|domain',
        'homepage' => 'required|url',
        'smtp' => 'required|string',
        'support_email' => 'required|email',
        'description' => 'required|string',
        'auto_login' => 'required|boolean',
        'auto_register' => 'required|boolean',
        'admin_email' => 'required|email',
        'admin_url' => 'required|url',
        'metadata' => 'sometimes|array',
        'settings' => 'sometimes|array',
        'api_keys' => 'sometimes|array',
        'api_url' => 'required|url',
        'webhook_url' => 'required|url',
        'callback_url' => 'required|url',
        'redirect_url' => 'required|url',
        'environment' => 'required|in:development,production',
        'type' => 'required|in:website,app',
        'category' => 'required|in:general,ecommerce,blog',
        'country' => 'required|string',
        'status' => 'required|in:active,inactive',
    ]);

    $platform->update($validatedData);

    return redirect()->route('platform.index')
                    ->with('success', 'Platform updated successfully.');
}

public function destroy(Platform $platform)
{
    $platform->delete();

    return redirect()->route('platform.index')
                    ->with('success', 'Platform deleted successfully.');
}

}
