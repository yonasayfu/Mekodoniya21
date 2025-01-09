<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Inertia\Inertia;

class SettingController extends Controller
{
    // Display a list of settings
    public function index()
    {
        $settings = Setting::all();
        return Inertia::render('Settings/Index', ['settings' => $settings]);
    }

    // Show the form for creating a new setting
    public function create()
    {
        return Inertia::render('Settings/Create');
    }

    // Store a newly created setting in the database
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string',
            'value' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Setting::create($request->all());

        return redirect()->route('settings.index');
    }

    // Display the specified setting
    public function show(Setting $setting)
    {
        return Inertia::render('Settings/Show', ['setting' => $setting]);
    }

    // Show the form for editing the specified setting
    public function edit(Setting $setting)
    {
        return Inertia::render('Settings/Edit', ['setting' => $setting]);
    }

    // Update the specified setting in the database
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'key' => 'required|string',
            'value' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $setting->update($request->all());

        return redirect()->route('settings.index');
    }

    // Remove the specified setting from the database
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('settings.index');
    }
}
