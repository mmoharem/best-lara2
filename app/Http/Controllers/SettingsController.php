<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{

    public function index()
    {
        return view('admin.settings.settings')->with('settings', Settings::first());
    }

    public function update()
    {
        //
    }
}
