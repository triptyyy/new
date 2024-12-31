<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    // Store form data
    public function store(Request $request)
    {
        $request->validate([
            'salutation' => 'required',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'email' => 'required|email|unique:bank,email',
            'phone_number' => 'required',
            'code' => 'required',
        ]);

        DB::table('bank')->insert([
            'salutation' => $request->salutation,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'code' => $request->code,
        ]);

        return redirect()->route('form.success');
    }
}
