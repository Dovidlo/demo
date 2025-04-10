<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::all();
        return view('welcome', compact('services'));
    }
    public function create(Request $request) {
        $services = Service::all();

        // айди при выборе карточки чтобы на страницу create было
        $selectedId = $request->get('service_id');
        return view('reports.create', compact('services', 'selectedId'));
    }

}
