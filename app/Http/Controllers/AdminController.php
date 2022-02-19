<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\StatusRequest;
use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function account ()
    {
        $applications = Application::select('applications.*', 'categories.name')
            ->leftJoin('categories' ,'categories.id' ,'=' ,'applications.id_category')
            ->orderbyDesc('status')
            ->get();
        return view('admin.account', ['applications' => $applications]);
    }

    public function update(Request $request)
    {
        Application::where('id', $request->input('id'))
            ->update([
                'status' => $request->input('status')
            ]);
        return back()->with('update', true);
    }


    public function changeStatus($id)
    {
        $application = Application::where('id', $id)->first();

        return view('admin.update', compact('application'));
    }

    public function changeStatusPost(StatusRequest $request)
    {
        if($request->status == 'Решена'){
            $filename = $request->file('new_img')->store('public');
            $name =explode('/', $filename)[1];
            Application::where('id', $request->input('id'))
                ->update([
                    'status' => $request->input('status'),
                    'new_img' => $name,
                ]);
        }
        else Application::where('id', $request->input('id'))
            ->update($request->only('status', 'cause'));

        return redirect()->route('admin');

    }


    public function editCategory()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function editCategoryPost(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('editCategory', ['add' => true]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('editCategory', ['destroy' => true]);
    }
}
