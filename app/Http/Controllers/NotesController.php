<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notes;
use App\Cases;
use App\User;

class NotesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

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
    $note->case()->associate($id);
    $note->author()->associate($request->author);
    $note->save();

    return response()->json([
      'notification' => 'Nota agregada.'
    ]);


  }

  public function show($id)
  {
    $notes = \DB::table('notes')
             ->join('users', 'users.id', '=', 'notes.author_id')
             ->select('notes.created_at', 'notes.description', 'users.name')
             ->where('notes.case_id', $id)
             ->orderBy('created_at', 'DESC')
             ->get();
    return $notes;
  }

  public function getAuthor($id)
  {
    $author = User::where('id', $id)->get('name');
    return $author;
  }





}
