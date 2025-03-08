<?php

namespace App\Http\Controllers;

use App\Models\LivreHistory;
use Illuminate\Http\Request;

class LivreHistoryController extends Controller
{
    public function index()
    {
        $histories = LivreHistory::with('livre', 'user')->latest()->get();

        return view('livre_history.index', compact('histories'));
    }
}
