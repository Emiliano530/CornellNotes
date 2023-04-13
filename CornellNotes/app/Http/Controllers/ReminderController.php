<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;
use App\Models\Subject;
use App\Models\Topic;

class ReminderController extends Controller
{
    public function index(Request $request)
    {
        $user_id = auth()->id();
        $search = $request->get('search');

        if ($search) {
            $reminders = Reminder::where('id_user', $user_id)
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
            $reminders = Reminder::where('id_user', $user_id)->get();
        }

        return view('reminders.index', compact('reminders', 'search'));
    }

    public function create()
    {
        $user_id = auth()->id();
        $subjects = Subject::where('id_career', auth()->user()->id_career)->pluck('subject', 'id');
        return view('reminders.create', compact('subjects'));
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
        $reminder = new Reminder;
        $reminder->title = $request->title;
        $reminder->content = $request->content;
        $reminder->value = $request->value;
        $reminder->creation_date = date('Y-m-d');
        $reminder->event_date = date('Y-m-d');
        $reminder->id_user = $user_id;
        $reminder->id_topic = $topic->id;
        $reminder->save();
    
        return redirect()->route('reminders.index')->with('success', 'reminder created successfully!');

    }

    public function show($id)
    {
        $reminder = Reminder::find($id);

        if ($reminder->id_user != auth()->id()) {
            return redirect()->route('reminders.index')->with('error', 'You do not have permission to view this reminder.');
        }

        return view('reminders.show', compact('reminder'));
    }

    public function edit($id)
    {
        $reminder = Reminder::find($id);

        if ($reminder->id_user != auth()->id()) {
            return redirect()->route('reminders.index')->with('error', 'You do not have permission to edit this reminder.');
        }

        $user_id = auth()->id();
        $subjects = Subject::where('id_career', auth()->user()->id_career)->pluck('subject', 'id');
        return view('reminders.edit', compact('reminder','subjects'));
    }

    public function update(Request $request, $id)
    {
        $reminder = Reminder::find($id);

        if ($reminder->id_user != auth()->id()) {
            return redirect()->route('reminders.index')->with('error', 'You do not have permission to edit this reminder.');
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
        $reminder->title = $request->title;
        $reminder->content = $request->content;
        $reminder->value = $request->value;
        $reminder->event_date = $request->event_date;
        $reminder->id_topic = $topic->id;
        $reminder->save();
        return redirect()->route('reminders.index')->with('success', 'reminder updated successfully!');
    }

    public function destroy($id)
    {
        $reminder = Reminder::find($id);

        if ($reminder->id_user != auth()->id()) {
            return redirect()->route('reminders.index')->with('error', 'You do not have permission to delete this reminder.');
        }

        $reminder->delete();

        return redirect()->route('reminders.index')->with('success', 'reminder deleted successfully!');
    }
}
