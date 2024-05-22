<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PlatformController extends Controller
{

    public function create()
    {
        return view('admin.platform.create');
    }

    public function index()
    {
        $platforms = Platform::paginate(10);
        return view('admin.platform.index', compact('platforms'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->name) . rand(100000, 999999),

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
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'status' => 'required|in:active,inactive,suspended,pending,maintenance',
        ]);

        if (Platform::create($validatedData)) {
            // store the logo image if it exists
            if ($request->hasFile('logo')) {
                // store the logo image
                $logo = $request->file('logo');
                $fileName = time() . '_' . randString() .".".$logo->getClientOriginalExtension();
                $logo->storeAs('public/platforms/' . $validatedData['slug'], $fileName);

                // store the logo path in the database
                $platform = Platform::where('slug', $validatedData['slug'])->first();
                $platform->logo = 'platforms/' . $validatedData['slug'] . '/' . $fileName;
                $platform->update();
            }
            if ($request->hasFile('photo')) {
                // store the photo image
                $photo = $request->file('photo');
                $fileName = time() . '_' . randString() .".".$logo->getClientOriginalExtension();
                $photo->storeAs('public/platforms/' . $validatedData['slug'], $fileName);

                // store the photo path in the database
                $platform = Platform::where('slug', $validatedData['slug'])->first();
                $platform->photo = 'platforms/' . $validatedData['slug'] . '/' . $fileName;
                $platform->update();
            }

            flash()->success('Platform created successfully');
            return redirect()->route('admin.platform.index');
        }
    }

    public function edit($platform_id)
    {
        $platform = Platform::find($platform_id);
        return view('admin.platform.edit', compact('platform'));
    }

    public function show($platform_id)
    {
        $platform = Platform::findOrFail($platform_id);
        return view('admin.platform.show', compact('platform'));
    }

    public function update(Request $request, $platform_id)
    {
        $platform = Platform::find($platform_id);
        $request->merge([
            'slug' => Str::slug($request->name) . '-' . rand(100000, 999999),

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
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'status' => 'required|in:active,inactive,suspended,pending,maintenance',
        ]);



        try {
            DB::beginTransaction();
            $platform->name = $validatedData['name'];
            $platform->slug = $validatedData['slug'];
            $platform->description = $validatedData['description'];
            $platform->url = $validatedData['url'];
            $platform->domain = $validatedData['domain'];
            $platform->homepage = $validatedData['homepage'];
            $platform->smtp = $validatedData['smtp'];
            $platform->admin_email = $validatedData['admin_email'];
            $platform->support_email = $validatedData['support_email'];
            $platform->auto_register = $validatedData['auto_register'];
            $platform->auto_login = $validatedData['auto_login'];
            $platform->admin_url = $validatedData['admin_url'];
            $platform->auto_login_url = $validatedData['auto_login_url'];
            $platform->api_keys = $validatedData['api_keys'];
            $platform->public_key = $validatedData['public_key'];
            $platform->secret_key = $validatedData['secret_key'];
            $platform->environment = $validatedData['environment'];
            $platform->type = $validatedData['type'];
            $platform->category = $validatedData['category'];
            $platform->status = $validatedData['status'];
            if ($platform->update()) {
                DB::commit();
                if ($request->hasFile('logo')) {
                    // store the logo image
                    $logo = $request->file('logo');
                    $fileName = time() . '_' . randString() .".".$logo->getClientOriginalExtension();
                    $logo->storeAs('public/platforms/' . $validatedData['slug'], $fileName);

                    // store the logo path in the database
                    $platform = Platform::where('slug', $validatedData['slug'])->first();
                    $platform->logo = 'platforms/' . $validatedData['slug'] . '/' . $fileName;
                    $platform->update();
                }
                if ($request->hasFile('photo')) {
                    // store the photo image
                    $photo = $request->file('photo');
                    $fileName = time() . '_' . randString() .".".$logo->getClientOriginalExtension();
                    $photo->storeAs('public/platforms/' . $validatedData['slug'], $fileName);

                    // store the photo path in the database
                    $platform = Platform::where('slug', $validatedData['slug'])->first();
                    $platform->photo = 'platforms/' . $validatedData['slug'] . '/' . $fileName;
                    $platform->update();
                }

                flash()->success('Platform updated successfully.');
                return redirect()->route('admin.platform.index');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            flash()->error('Platform update failed.');
            return redirect()->back();
        }
    }

    public function destroy(Platform $platform)
    {
        $platform->delete();

        flash()->error('Platform deleted successfully.');
        return redirect()->route('admin.platform.index');
    }
}
