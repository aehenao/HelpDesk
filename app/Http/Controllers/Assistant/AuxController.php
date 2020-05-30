<?php

namespace App\Http\Controllers\Assistant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cases;
use App\User;
use App\Category;

class AuxController extends Controller
{
    public function index()
    {
      $user = \Auth::user();
      $cases = Cases::where('specialist_id', $user->id)
      ->where('status', '!=', 'close')
      ->paginate(15);


      return view('assistant.index');
    }

    public function edit($id)
    {
      $case = Cases::findOrFail($id);
      $clients = User::Clients()->get();
      $specialists = User::Specialist()->get();
      $categories = Category::all();

      return view('assistant.edit', compact('case', 'clients', 'specialists', 'categories'));
    }

    public function update(Request $request, $id)
    {
      try {
        //dd($request->all());
        $case = Cases::findOrFail($id);
        $specialist = $request->specialist;
        $data = $request->only('priority', 'category', 'status');
        $case->fill($data);
        $case->specialist()->associate($specialist);

        $case->save();

        $notification = 'Se ha actualizo el caso';
        return back()->with(compact('notification'));

      } catch (\Exception $e) {
        $errors []= $e->getMessage();
        return back()->with(compact('errors'));
      }


    }

    public function getCases($specialist){
      $cases = \DB::table('cases')
      ->join('users', 'cases.client_id', '=', 'users.id')
      ->join('categories', 'cases.category_id', '=', 'categories.id')
      ->where('specialist_id', $specialist)
      ->where('cases.status', '!=', 'close')
      ->select('cases.id', 'cases.title', 'cases.status', 'cases.type', 'cases.priority', 'cases.solution_time', 'categories.name as nameCategory', 'users.name as nameUser')
      ->orderBy('cases.created_at', 'DESC')
      ->paginate(15);

      return $cases;
    }

}
