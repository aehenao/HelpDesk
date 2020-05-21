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

    public function store(Request $request)
    {

        $data = array(
          'description' => $request->description
        );
        $note = Notes::create($data);

        $note->case()->associate($request->case);
        $note->save();

        return response()->json([
          'notification' => "Nota agregada al caso."
        ]);


    }

    public function show($id)
    {
       $note = Notes::where('case_id', $id)->orderBy('created_at', 'DESC')->get();
       return $note;
    }





}
