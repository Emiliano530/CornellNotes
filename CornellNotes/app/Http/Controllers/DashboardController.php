<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
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

        $id_user = Auth::user()->id; // Obtenemos el id del usuario autenticado
        $notes = Note::where('id_user', $id_user)->latest('id')->take(5)->get();
        $reminders = Reminder::where('id_user', $id_user)
            ->orderBy('value', 'asc')
            ->orderBy('event_date', 'asc')
            ->take(5)
            ->get();

        return view('dashboard',compact('notes', 'reminders','meses','colors'));
    }
}
