<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
class SpecialistController extends Controller
{
  private function performValidation($request){
    $rules = [
      'name' => 'required|min:3',
      'email' => 'required|email',
      'password' => 'digits:8'

    ];
    $this->validate($request, $rules);
  }

  public function index()
  {
    $specialists = User::Specialist()->paginate(15);
    return view('admin.specialist.index', compact('specialists'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('admin.specialist.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->performValidation($request);

    try{
      User::create($request->only('name', 'email', 'status', 'address', 'city') +
        [
          'role' => 'aux',
          'password' => bcrypt($request->password)

        ]
      );

      $notification = 'El espacialista ha sido creado.';
      return redirect('/specialist')->with(compact('notification'));

    }catch(\Exception $ex){
      $errors []= $ex->getMessage();
      return back()->with(compact('errors'));
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $user = User::findOrFail($id);
    return view('admin.specialist.edit', compact('user'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    try {
      $user = User::findOrFail($id);
      $data = $request->only('name', 'email', 'status', 'address', 'city');

      if($request->password)
       $data['password'] = $request->password;

       $user->fill($data);
       $user->save();

       $notification = "Modificacion realizada con exito.";
       return redirect('/specialist')->with(compact('notification'));
    } catch (\Exception $e) {
      $errors []= $e->getMessage();
      return back()->with(compact('errors'));
    }


  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $user = User::findOrFail($id);
    $user->delete();

    $notification = "El espacialista {$user->name} ha sido eliminado.";
    return redirect('/specialist')->with(compact('notification'));

  }
}
