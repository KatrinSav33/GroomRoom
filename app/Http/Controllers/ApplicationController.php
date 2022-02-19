<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Category;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('application.create', compact('categories'));
    }

    public function createApplication(ApplicationRequest $request)
    {
        $file = $request->file('photo');

        $fileInfo = $file->getClientOriginalName();

        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);

        $extension = $file->getClientOriginalExtension();

        $store = $filename . '_' . time() . '.' . $extension;

        $file->storeAs('public/', $store);


        Application::create([
            'name_animal' => $request->input('name_animal'),
            'description' => $request->input('description'),
            'id_category' => $request->input('id_category'),
            'id_user' => Auth::user()->id,
            'status' => $request->input('status'),
            'photo' => $store,
        ]);

        return back()->with('success', true);

    }

    public function delete($id)
    {
        Application::where('id', $id)->delete();
        return back()->with('delete', true);
    }
}
