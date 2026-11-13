<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatasetController extends Controller
{
    public function index()
    {
        return view('datasets.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'dataset' => [
                'required',
                'file',
                'mimes:csv,txt',
                'extensions:csv',
                'max:5120',
            ],
        ]);

        $request->file('dataset')->store('datasets');

        return back()->with(
            'success',
            'CSV file uploaded successfully!'
        );
    }
}