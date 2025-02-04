<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required|string|max:255',
            'description' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|max:255',
            'phone' => 'bail|required|string|max:255'
        ]);

        $name = $request->input('name');
        $description = $request->input('description');
        $email = $request->input('email');
        $phone = $request->input('phone');

        return 'Created Form ' . $name . " " . $description . " " . $email;
    }
}
