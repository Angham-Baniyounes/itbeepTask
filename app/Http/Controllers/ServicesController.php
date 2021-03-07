<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intrests;
use App\Services;
use App\User;
class ServicesController extends Controller
{
    public function index() {
        $intrest  = new Intrests();
        $service  = new Services();
        $intrests = $intrest->all();
        $services = $service->all();
        return view("welcome", compact('intrests', 'services'));
    }

    public function store(Request $req) {
        $req->validate([
            'name' => 'required',
            'mobile'    => 'required | min:8 | max:16',
            'email' => 'required | email',
        ]);
        $user = new User();
        $user->name     = session()->get('name');
        $user->mobile   = session()->get('mobile');
        $user->email    = session()->get('email');
        $user->service_id = session()->get('service_id');
        $user->intrest_id = session()->get('intrest_id');

        $user->save();
        return redirect('/');
    }
}
