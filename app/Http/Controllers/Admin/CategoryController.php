<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
      $categories = Category::paginate(10);
      return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
      return view('admin.category.create');
    }

    public function store(Request $request)
    {
      try {
        Category::create($request->only('name', 'ans'));

        $notification = 'La categoria ha sido creada.';
        return redirect('/categories')->with(compact('notification'));
      } catch (\Exception $ex) {
        $errors []= $ex->getMessage();
        return back()->with(compact('errors'));
      }

    }

    public function edit($id)
    {
      $category = Category::findOrFail($id);
      return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
      try {
        $category = Category::findOrFail($id);
        $data = $request->only('name', 'ans');

         $category->fill($data);
         $category->save();

         $notification = "Modificacion realizada con exito.";
         return redirect('/categories')->with(compact('notification'));
      } catch (\Exception $e) {
        $errors []= $e->getMessage();
        return back()->with(compact('errors'));
      }
    }

    public function destroy($id)
    {
      $user = Category::findOrFail($id);
      $user->delete();

      $notification = "La categoria {$category->name} ha sido eliminado.";
      return redirect('/categories')->with(compact('notification'));

    }
}
