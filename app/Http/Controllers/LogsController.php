<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogsController extends Controller
{
    public function index()
    {
        $logs = Log::all();
        return view('logs', compact('logs'));
    }

    public function clearLogs()
    {
        Log::truncate();

        return redirect()->route('logs')->with('success', 'Logs cleared successfully!');
    }
}
