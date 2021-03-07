<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intrests;
use App\Services;
class ServicesController extends Controller
{
    public function index() {
        $intrest  = new Intrests();
        $service  = new Services();
        $intrests = $intrest->all();
        $services = $service->all();
        return view("welcome", compact('intrests', 'services'));
    }

    public function intrest($id) {
        $intrestModel = new Admin();
        $intrest = $intrestModel->find($id);
        return view('welcome', compact('intrest'));
    }
}
