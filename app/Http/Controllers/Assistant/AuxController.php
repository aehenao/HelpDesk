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
      $cases = Cases::where('specialist_id', $user->id)->paginate(10);


      return view('assistant.index', compact('cases'));
    }

    public function edit($id)
    {
      $case = Cases::findOrFail($id);
      $clients = User::Clients()->get();
      $specialists = User::Specialist()->get();
      $categories = Category::all();

      return view('assistant.edit', compact('case', 'clients', 'specialists', 'categories'));
    }
}
