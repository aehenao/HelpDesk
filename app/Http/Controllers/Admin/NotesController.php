<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Notes;
use App\Cases;

class NotesController extends Controller
{
    private function performValidation($request){
      $rules = [
        'description' => 'required|min:5'
      ];
      $this->validate($request, $rules);
    }

    public function store(Request $request, $id)
    {
      //$case = Cases::findOrFail($id);
       $note = Notes::create($request->all());
       //$note->user()->associate($request->author);
       $note->case()->associate($id);
       $note->save();

        return response()->json([
              'notification' => 'Nota agregada.'
          ]);


    }

    public function show($id)
    {
       $note = Notes::where('case_id', $id)->orderBy('created_at', 'DESC')->get();
       return $note;
    }





}
