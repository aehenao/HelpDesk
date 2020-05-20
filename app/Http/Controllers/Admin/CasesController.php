<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Cases;
use App\User;
use App\Category;
use App\Clases\Operations;

class CasesController extends Controller
{

  private function performValidation($request){
    $rules = [
      'title' => 'required|min:5',
      'description' => 'required',
      'client' => 'required'

    ];
    $this->validate($request, $rules);
  }

    public function index()
    {
      $cases = Cases::paginate(15);
      $users = User::all();

      return view('admin.cases.index', compact('cases', 'users'));
    }

    public function create()
    {
      $specialists = User::Specialist()->get();
      $clients = User::Clients()->get();
      $categories = Category::all();
      return view('admin.cases.create', compact('specialists', 'clients', 'categories'));
    }

    public function store(Request $request)
    {
        $this->performValidation($request);
        $date = new \DateTime();
        $oper = new Operations();
        $category = Category::findOrFail($request->category);
        $user = User::findOrFail($request->client);
        try {
          $description = $request->description;
          $specialist = $request->specialist;
          $client = $request->client;


          $author = $request->author;
          $data = $request->only('title','priority', 'type', 'description');

          //Defino el tiempo de solucion que tomara realizar el Caso (depende de la categoria)
          $ans = intval($category->ans);
          $solutionTime = $oper->AddHours($date, $ans);

          $data['solution_time'] = $solutionTime;

          $case = Cases::create($data); // Creo el caso

          //Asocio la categoria y el autor
          $case->category()->associate($category->id);
          $case->author()->associate($author);

          $case->client()->associate($client);
          $case->specialist()->associate($specialist);
          $case->save();

          $notification = 'Se ha registrado un nuevo caso.';
          return redirect('/cases')->with(compact('notification'));

        } catch (\Exception $e) {
          $errors []= $e->getMessage();
          return back()->with(compact('errors'));
        }

    }

    public function edit($id)
    {
      $case = Cases::findOrFail($id);
      $clients = User::Clients()->get();
      $specialists = User::Specialist()->get();
      $categories = Category::all();
      return view('admin.cases.edit', compact('case', 'clients', 'specialists', 'categories'));
    }

    public function update(Request $request, $id)
    {
      $oper = new Operations();
      $category = Category::findOrFail($request->category);
      $case = Cases::findOrFail($id);
      $catPrevius = $case->category->id;
      $user = User::findOrFail($request->client);

      //try {
        $description = $request->description;
        $specialist = $request->specialist;
        $client = $request->client;

        $data = $request->only('title','priority', 'type', 'description');

        //Valido si hubo un cambio de categoria
        if(intval($request->category) != $catPrevius){
          $ans = intval($category->ans);
          $date = $case->created_at;
          $solutionTime = $oper->AddHours($date, $ans);
          $data['solution_time'] = $solutionTime;
        }

        $case->fill($data); // Actualizo el caso


        $case->category()->associate($category->id);
        $case->client()->associate($client);
        $case->specialist()->associate($specialist);
          $case->save();

        $notification = 'Datos guardados correctamente';
        return back()->with(compact('notification'));

      // } catch (\Exception $e) {
      //   $errors []= $e->getMessage();
      //   return back()->with(compact('errors'));
      // }
    }


}
