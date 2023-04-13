<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Subject;
use App\Models\Topic;

class NoteController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        $notes = Note::where('id_user', $user_id)->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        $user_id = auth()->id();
        $subjects = Subject::where('id_career', auth()->user()->id_career)->pluck('subject', 'id');
        return view('notes.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $user_id = auth()->id();

        // Buscar el tema por nombre y asignatura
        $topic = Topic::where('topic', $request->topic)
                      ->where('id_subject', $request->subject)
                      ->first();
    
        // Si el tema no existe, crearlo
        if (!$topic) {
            $new_topic = new Topic;
            $new_topic->topic = $request->topic;
            $new_topic->id_subject = $request->subject;
            $new_topic->save();
            $topic = $new_topic;
        }
    
        // Crear la nota y relacionarla con el tema y el usuario actual
        $note = new Note;
        $note->title = $request->title;
        $note->content = $request->content;
        $note->keyWords = $request->keyWords;
        $note->summary = $request->summary;
        $note->creation_date = date('Y-m-d');
        $note->id_user = $user_id;
        $note->id_topic = $topic->id;
        $note->save();
    
        return redirect()->route('notes.index')->with('success', 'Note created successfully!');

    }

    public function show($id)
    {
        $note = Note::find($id);

        if ($note->id_user != auth()->id()) {
            return redirect()->route('notes.index')->with('error', 'You do not have permission to view this note.');
        }

        return view('notes.show', compact('note'));
    }

    public function edit($id)
    {
        $note = Note::find($id);

        if ($note->id_user != auth()->id()) {
            return redirect()->route('notes.index')->with('error', 'You do not have permission to edit this note.');
        }

        $user_id = auth()->id();
        $subjects = Subject::where('id_career', auth()->user()->id_career)->pluck('subject', 'id');
        return view('notes.edit', compact('note','subjects'));
    }

    public function update(Request $request, $id)
    {
        $note = Note::find($id);

        if ($note->id_user != auth()->id()) {
            return redirect()->route('notes.index')->with('error', 'You do not have permission to edit this note.');
        }

        $user_id = auth()->id();

        // Buscar el tema por nombre y asignatura
        $topic = Topic::where('topic', $request->topic)
                      ->where('id_subject', $request->subject)
                      ->first();
    
        // Si el tema no existe, crearlo
        if (!$topic) {
            $new_topic = new Topic;
            $new_topic->topic = $request->topic;
            $new_topic->id_subject = $request->subject;
            $new_topic->save();
            $topic = $new_topic;
        }
    
        // Crear la nota y relacionarla con el tema y el usuario actual
        $note->title = $request->title;
        $note->content = $request->content;
        $note->keyWords = $request->keyWords;
        $note->summary = $request->summary;
        $note->id_topic = $topic->id;
        $note->save();
        return redirect()->route('notes.index')->with('success', 'Note updated successfully!');
    }

    public function destroy($id)
    {
        $note = Note::find($id);

        if ($note->id_user != auth()->id()) {
            return redirect()->route('notes.index')->with('error', 'You do not have permission to delete this note.');
        }

        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully!');
    }
}
