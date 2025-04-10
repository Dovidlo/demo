<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    public function index() {
        $reports = Report::where('user_id', Auth::user()->id)->get();
        $userId = Auth::id();
        return view('reports.index', compact('reports', 'userId'));
    }

    public function create() {
        $reports = Report::all();
        return view('reports.create', compact('reports'));
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
            'number' => ['required', 'string', 'max:255'],
            'payment' => ['required', 'string', 'max:255'],
            'service_id' => 'required|exists:services,id',
        ]);
    
        Report::create([
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number,
            'payment' => $request->payment,
            'service_id' => $request->service_id,
            'user_id' => Auth::user()->id,
            'status' => "Новая",
        ]);
    
        return redirect()->route('dashboard');
    }

    public function update(Request $request) {
        $request->validate([
            'status' => ['required'],
            'id' => ['required']
        ]);

        Report::where('id', $request->id)->update([
            'status' => $request->status,
        ]);
        return redirect()->back();
    }
}

// ПРИМЕР

// $request->validate([
//     'title' => ['required', 'string', 'max:255'],
//     'category_id' => 'required|exists:categories,id',
//     'path_img' => 'image|mimes:png,jpg,jpeg,gif|max:800',
// ]);
// Report::create([
//     "user_id" => Auth::user()->id,
//     'category_id' => $request->category_id,
// ]);