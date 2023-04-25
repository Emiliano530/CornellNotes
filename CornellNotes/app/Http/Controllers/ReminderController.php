<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Reminder;
use App\Models\Subject;
use App\Models\Topic;
use App\Policies\ReminderPolicy;
use Carbon\Carbon;

class ReminderController extends Controller
{
    public function index(Request $request)
    {

        $meses = [
            'enero',
            'febrero',
            'marzo',
            'abril',
            'mayo',
            'junio',
            'julio',
            'agosto',
            'septiembre',
            'octubre',
            'noviembre',
            'diciembre',
        ];

        $colors = [
            'Muy importante' => 'bg-red-600',
            'Importante' => 'bg-orange-600',
            'Regular' => 'bg-yellow-600',
            'No importante' => 'bg-green-600',
        ];

        $user_id = auth()->id();
        $search = $request->get('search');

        if ($search) {
            $reminders = Reminder::where('id_user', $user_id)
                        ->where(function($queryBuilder) use ($search) {
                            $queryBuilder->where('event_date', 'like', '%'.$search.'%')
                                        ->orWhere('title', 'like', '%'.$search.'%')            
                                        ->orWhere('content', 'like', '%'.$search.'%');
                        })
                        ->orderBy('value', 'asc')
                        ->orderBy('event_date', 'asc')
                        ->get();
        } else {
            $search = null;
            $reminders = Reminder::where('id_user', $user_id)
            ->orderBy('value', 'asc')
            ->orderBy('event_date', 'asc')
            ->get();
        }

        return view('reminders.index', compact('reminders', 'search','meses','colors'));
    }

    public function create()
    {
        return view('reminders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required'],
            'content'=>['required','min:50'],
            'date'=>['required'],
            'time'=>['required'],
        ]);
        
        $date = $request->date;
        $time = $request->time;
    
        $datetime = Carbon::createFromFormat('Y-m-d H:i', "$date $time", 'America/Mexico_City');

        $user_id = auth()->id();
        // Crear la nota y relacionarla con el tema y el usuario actual
        $reminder = new Reminder;
        $reminder->title = $request->title;
        $reminder->content = $request->content;
        $reminder->value = $request->value;
        $reminder->creation_date = date('Y-m-d');
        $reminder->event_date = $datetime;
        $reminder->id_user = $user_id;
        $reminder->save();
    
        return redirect()->route('reminders.index')->with('success', 'Recordatorio creado satisfactoriamente');

    }

    public function show($id)
    {
        $reminder = Reminder::find($id);
        $colors = [
            'Muy importante' => 'bg-red-600',
            'Importante' => 'bg-orange-600',
            'Regular' => 'bg-yellow-600',
            'No importante' => 'bg-green-600',
        ];
        $dateTime = Carbon::parse($reminder->event_date);
        $date = $dateTime->format("d/m/Y");
        $time = $dateTime->format("h:i a");

        if (!$reminder) {
            return view('errors.404')->with('error', 'El recordatorio no existe.');
        }

        if (Gate::denies('view', $reminder)) {
            return redirect()->back()->with('error', 'No tienes permiso para ver este recordatorio.');
        }

        return view('reminders.show', compact('reminder', 'colors','date','time'));
    }

    public function edit($id)
    {
        $reminder = Reminder::find($id);

        $dateTime = Carbon::parse($reminder->event_date);
        $date = $dateTime->toDateString();
        $time = $dateTime->format('H:i');

        $colors = [
            'Muy importante' => 'bg-red-600',
            'Importante' => 'bg-orange-600',
            'Regular' => 'bg-yellow-600',
            'No importante' => 'bg-green-600',
        ];

        if (!$reminder) {
            return view('errors.404')->with('error', 'El recordatorio no existe.');
        }

        if ($reminder->id_user != auth()->id()) {
            return redirect()->back()->with('error', 'No tienes permiso para editar este recordatorio.');
        }

        $user_id = auth()->id();
        return view('reminders.edit', compact('reminder','date','time','colors'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'title'=>['required'],
        'content'=>['required','min:50'],
    ]);

    $reminder = Reminder::find($id);

    $date = $request->date;
    $time = $request->time;
    
    $datetime = Carbon::createFromFormat('Y-m-d H:i', "$date $time", 'America/Mexico_City');

    if ($reminder->id_user != auth()->id()) {
        return redirect()->back()->with('error', 'No tienes permiso para editar este recordatorio.');
    }

    $user_id = auth()->id();       
    // 
    $reminder->title = $request->title;
    $reminder->content = $request->content;
    $reminder->value = $request->value;
    $reminder->event_date = $datetime;
    $reminder->save();
    
    return redirect()->route('reminders.index')->with('success', 'Recordatorio actualizado satisfactoriamente.');
}


    public function destroy($id)
    {
        $reminder = Reminder::find($id);

        if ($reminder->id_user != auth()->id()) {
            return redirect()->back()->with('error', 'No tienes permiso para eliminar este recordatorio.');
        }

        $reminder->delete();

        if(route('dashboard')){
            return redirect()->back()->with('success', 'Recordatorio eliminado satisfactoriamente.');
        }else{
            return redirect()->route('reminders.index')->with('success', 'Recordatorio eliminado satisfactoriamente.');
        }
    }
}
