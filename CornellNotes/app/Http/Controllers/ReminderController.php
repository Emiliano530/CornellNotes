<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Reminder;
use App\Models\Subject;
use App\Models\Topic;
use App\Policies\ReminderPolicy;

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
                                        ->orWhere('content', 'like', '%'.$search.'%');
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
        return view('reminders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required'],
            'event_date'=>['required'],
        ]);

        $user_id = auth()->id();
        // Crear la nota y relacionarla con el tema y el usuario actual
        $reminder = new Reminder;
        $reminder->title = $request->title;
        $reminder->content = $request->content;
        $reminder->value = $request->value;
        $reminder->creation_date = date('Y-m-d');
        $reminder->event_date = $request->event_date;
        $reminder->id_user = $user_id;
        $reminder->save();
    
        return redirect()->route('reminders.index')->with('success', 'Reminder saved successfully!');

    }

    public function show($id)
    {
        $reminder = Reminder::find($id);

        if (!$reminder) {
            return view('errors.404')->with('error', 'The reminder does not exist.');
        }

        if (Gate::denies('view', $reminder)) {
            return redirect()->back()->with('error', 'You do not have permission to view this reminder.');
        }

        return view('reminders.show', compact('reminder'));
    }

    public function edit($id)
    {
        $reminder = Reminder::find($id);

        if (!$reminder) {
            return view('errors.404')->with('error', 'The reminder does not exist.');
        }

        if ($reminder->id_user != auth()->id()) {
            return redirect()->back()->with('error', 'You do not have permission to edit this reminder.');
        }

        $user_id = auth()->id();
        return view('reminders.edit', compact('reminder'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>['required'],
            'event_date'=>['required'],
            'topic'=>['required'],
        ]);
        
        $reminder = Reminder::find($id);

        if ($reminder->id_user != auth()->id()) {
            return redirect()->back()->with('error', 'You do not have permission to edit this reminder.');
        }

        $user_id = auth()->id();       
        // Crear la nota y relacionarla con el tema y el usuario actual
        $reminder->title = $request->title;
        $reminder->content = $request->content;
        $reminder->value = $request->value;
        $reminder->event_date = $request->event_date;
        $reminder->save();
        return redirect()->back()->with('success', 'reminder updated successfully!');
    }

    public function destroy($id)
    {
        $reminder = Reminder::find($id);

        if ($reminder->id_user != auth()->id()) {
            return redirect()->back()->with('error', 'You do not have permission to delete this reminder.');
        }

        $reminder->delete();

        return redirect()->back()->with('success', 'reminder deleted successfully!');
    }
}
