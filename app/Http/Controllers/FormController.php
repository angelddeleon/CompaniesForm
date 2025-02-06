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

        // Leer el archivo JSON existente
        $jsonFilePath = storage_path('app/bd.json');
        $dataList = [];

        if (file_exists($jsonFilePath)) {
            $jsonData = file_get_contents($jsonFilePath);
            $dataList = json_decode($jsonData, true);
        }

        // Agregar los datos validados al array
        $dataList[] = $validatedData;

        // Guardar el array actualizado en el archivo JSON
        file_put_contents($jsonFilePath, json_encode($dataList, JSON_PRETTY_PRINT));

        // Almacenar la lista actualizada en la sesión
        session(['dataList' => $dataList]);

        return view('listOfCompanies', ['dataList' => $dataList]);
    }

    public function getStore(Request $request)
    {
        // Leer el archivo JSON existente
        $jsonFilePath = storage_path('app/bd.json');
        $dataList = [];

        if (file_exists($jsonFilePath)) {
            $jsonData = file_get_contents($jsonFilePath);
            $dataList = json_decode($jsonData, true);
        }

        // Almacenar la lista en la sesión
        session(['dataList' => $dataList]);

        return view('listOfCompanies', ['dataList' => $dataList]);
    }
}