<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\User;

class ProfileController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  private function performValidation($request){
    $rules = [
      'name' => 'required|min:5',
      'city' => 'required',
      'image' => 'required'

    ];
    $this->validate($request, $rules);
  }

  public function edit()
  {
    $user = User::findOrFail(\Auth::user()->id);
    return view('assistant.profile', compact('user'));
  }

  public function update(Request $request)
  {
    $this->performValidation($request);
    
      try {
        $user = User::findOrFail(\Auth::user()->id);
        $password = $request->password;
        $image = $request->file('image');
        $data = $request->only('name', 'city', 'address');

        $imageOld =	$user->image;
        $path =  Storage::disk('public')->put('images', $image );;
        $data['image'] = $path;

        if($imageOld) // Borro la foto anterior
          Storage::disk('public')->delete($imageOld);

        if($password)
          $data ['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();

        $notification = 'Datos actualizados con exito.';
        return back()->with(compact('notification'));

      } catch (\Exception $e) {
        $errors []= $e->getMessage();
        return back()->with(compact('errors'));
      }

  }
}
