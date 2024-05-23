<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::paginate(12);
        $packages_count = Package::count();
        return view('admin.package.index', compact('packages', 'packages_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->name) . '-' . rand(100000, 999999),
        ]);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|alpha_dash|unique:packages,slug',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'currency' => 'required',
            'duration' => 'required|integer',
            'duration_unit' => 'required|string',
            'status' => 'required|in:draft,published,archieved,deleted,limited',
        ]);

        try {
            DB::beginTransaction();

            $package = new Package();
            $package->uid = 'p-' . uniqid();
            $package->name = $validatedData['name'];
            $package->slug = $validatedData['slug'];
            $package->description = $validatedData['description'];
            $package->price = $validatedData['price'];
            $package->currency = $validatedData['currency'] ?? 'USD';
            $package->duration = $validatedData['duration'] ?? 1;
            $package->duration_unit = $validatedData['duration_unit'] ?? 'month';
            $package->trial = $validatedData['trial'] ?? 0;
            $package->trial_unit = $validatedData['trial_unit'] ?? 'day';
            $package->discount = $validatedData['discount'] ?? 0;
            $package->discount_unit = $validatedData['discount_unit'] ?? 'percentage';
            $package->type = $validatedData['type'] ?? 'subscription';
            $package->category = $validatedData['category'] ?? 'other';
            $package->status = $validatedData['status'];
            if ($package->save()) {
                DB::commit();
                flash()->success('Package created successfully');
                return redirect()->route('admin.package.index');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            flash()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($package_id)
    {
        $package = Package::findOrFail($package_id);
        return view('admin.package.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($package_id)
    {
        $package = Package::find($package_id);
        return view('admin.package.edit', compact('package'));
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $package_id)
    {
        $package = Package::find($package_id);
        $request->merge([
            'slug' => Str::slug($request->name) . '-' . rand(100000, 999999),
        ]);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|alpha_dash|unique:packages,slug',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'currency' => 'required',
            'duration' => 'required|integer',
            'duration_unit' => 'required|string',
            'status' => 'required|in:draft,published,archieved,deleted,limited',
        ]);

        try {
            DB::beginTransaction();

            $package->name = $validatedData['name'];
            $package->slug = $validatedData['slug'];
            $package->description = $validatedData['description'];
            $package->price = $validatedData['price'];
            $package->currency = $validatedData['currency'] ?? 'USD';
            $package->duration = $validatedData['duration'] ?? 1;
            $package->duration_unit = $validatedData['duration_unit'] ?? 'month';
            $package->trial = $validatedData['trial'] ?? 0;
            $package->trial_unit = $validatedData['trial_unit'] ?? 'day';
            $package->discount = $validatedData['discount'] ?? 0;
            $package->discount_unit = $validatedData['discount_unit'] ?? 'percentage';
            $package->type = $validatedData['type'] ?? 'subscription';
            $package->category = $validatedData['category'] ?? 'other';
            $package->status = $validatedData['status'];
            if ($package->update()) {
                DB::commit();
                flash()->success('Package updated successfully');
                return redirect()->route('admin.package.index');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            flash()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }



    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        // check if the package has any user account who are active
        if ($package->accounts()->where('status', 'active')->count() > 0) {
            flash()->error('Package has active users, cannot delete');
            return redirect()->back();
        }


        if ($package->delete()) {
            flash()->info('Package deleted successfully');
            return redirect()->route('admin.package.index');
        }
    }
}
