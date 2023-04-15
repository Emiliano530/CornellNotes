<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $id_user = Auth::user()->id; // Obtenemos el id del usuario autenticado
        $notes = Note::where('id_user', $id_user)->latest('id')->take(5)->get();
        $reminders = Reminder::where('id_user', $id_user)->latest('id')->take(5)->get();

        return view('dashboard', ['notes' => $notes, 'reminders' => $reminders]);
    }
}
