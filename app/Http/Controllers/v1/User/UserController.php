<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\Controller;
use App\Models\UserPlatform;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $userMarketplaces = UserPlatform::where('user_id', auth()->id())->with('platform')->get();
        return view('dashboard', compact('userMarketplaces'));
    }

    /**
     * Auto login to the marketplace.
     */

    public function autoLogin(string $marketplaceId){
        $userMarketplace = UserPlatform::findOrFail($marketplaceId);
        if ($userMarketplace) {
            $autoLoginUrl = $userMarketplace->platform->platform_auto_login_url;
        }
        return redirect()->route('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
