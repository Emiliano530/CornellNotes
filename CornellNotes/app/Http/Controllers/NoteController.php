<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Note;
use App\Models\Subject;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notes = auth()->user()->notes->load('subjects');
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        $user = auth()->user();
        $subjects = Subject::where('id_career', $user->id_career)->get();
        return view('notes.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $note = new Note;
        $note->title = $request->title;
        $note->content = $request->content;
        $note->keyWords = $request->keyWords;
        $note->summary = $request->summary;
        $note->creation_date = now();
        $note->id_user = auth()->user()->id;
        $note->id_subject = $request->subject;
        $note->save();

        return redirect()->route('notes.index')->with('success', 'Note created successfully');
    }

    public function show(Note $note)
    {
        if ($note->id_user !== auth()->user()->id) {
            return redirect()->route('notes.index')->with('error', 'You are not authorized to access this note');
        }

        $note->load('subjects');
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        if ($note->id_user !== auth()->user()->id) {
            return redirect()->route('notes.index')->with('error', 'You are not authorized to edit this note');
        }

        $user = auth()->user();
        $subjects = Subject::where('id_career', $user->id_career)->get();
        return view('notes.edit', compact('note', 'subjects'));
    }

    public function update(Request $request, Note $note)
    {
        if ($note->id_user !== auth()->user()->id) {
            return redirect()->route('notes.index')->with('error', 'You are not authorized to update this note');
        }

        $note->title = $request->title;
        $note->content = $request->content;
        $note->keyWords = $request->keyWords;
        $note->summary = $request->summary;
        $note->id_subject = $request->id_subject;
        $note->save();

        return redirect()->route('notes.index')->with('success', 'Note updated successfully');
    }

    public function destroy(Note $note)
    {
        if ($note->id_user !== auth()->user()->id) {
            return redirect()->route('notes.index')->with('error', 'You are not authorized to delete this note');
        }

        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully');
    }
}
