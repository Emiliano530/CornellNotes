<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Note;
use App\Models\Subject;
use App\Models\Topic;
use App\Policies\NotePolicy;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $user_id = auth()->id();
        $search = $request->get('search');

        if ($search) {
            $notes = Note::where('id_user', $user_id)
                        ->where(function($queryBuilder) use ($search) {
                            $queryBuilder->where('title', 'like', '%'.$search.'%')
                                        ->orWhere('content', 'like', '%'.$search.'%')
                                        ->orWhereHas('topics', function($query) use ($search) {
                                            $query->where('topic', 'like', '%'.$search.'%')
                                                  ->orWhereHas('subjects', function($query) use ($search) {
                                                        $query->where('subject', 'like', '%'.$search.'%');
                                                  });
                                        });
                        })
                        ->get();
        } else {
            $search = null;
            $notes = Note::where('id_user', $user_id)->get();
        }

        return view('notes.index', compact('notes', 'search'));
    }

    public function create()
    {
        $user_id = auth()->id();
        $subjects = Subject::where('id_career', auth()->user()->id_career)->pluck('subject', 'id');
        return view('notes.create', compact('subjects'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title'=>['required'],
            'content'=>['required'],
            'keyWords'=>['required'],
            'summary'=>['required'],
            'topic'=>['required'],
        ]);
        
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

        if (!$note) {
            return view('errors.404')->with('error', 'The note does not exist.');
        }

        if (Gate::denies('view', $note)) {
            return redirect()->back()->with('error', 'You do not have permission to view this note.');
        }

        return view('notes.show', compact('note'));
    }

    public function edit($id)
    {
        $note = Note::find($id);

        if (!$note) {
            return view('errors.404')->with('error', 'The note does not exist.');
        }

        if ($note->id_user != auth()->id()) {
            return redirect()->back()->with('error', 'You do not have permission to edit this note.');
        }

        $user_id = auth()->id();
        $subjects = Subject::where('id_career', auth()->user()->id_career)->pluck('subject', 'id');
        return view('notes.edit', compact('note','subjects'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>['required'],
            'content'=>['required'],
            'keyWords'=>['required'],
            'summary'=>['required'],
            'topic'=>['required'],
        ]);
        
        $note = Note::find($id);

        if ($note->id_user != auth()->id()) {
            return redirect()->back()->with('error', 'You do not have permission to edit this note.');
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
        return redirect()->back()->with('success', 'Note updated successfully!');
    }

    public function destroy($id)
    {
        $note = Note::find($id);

        if ($note->id_user != auth()->id()) {
            return redirect()->back()->with('error', 'You do not have permission to delete this note.');
        }

        $note->delete();

        return redirect()->back()->with('success', 'Note deleted successfully!');
    }
}
