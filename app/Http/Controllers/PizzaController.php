<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pizza;
use App\Models\Log;

class PizzaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $pizzas = Pizza::all();
        //$pizzas = Pizza::orderBy('name')->get();
        //$pizzas = Pizza::where('type','Hawaiian')->get();
        //$pizzas = Pizza::latest()->get();
        //$pizzas = Pizza::where('type','Hawaiian')->orderBy('name')->get();
        return view('pizzas', compact('pizzas'));
    }

    public function show($id){
        $name = request('name');
        return view('pizzas', compact('name'));
    }

    //To call the web form for creating a new row of pizza
    public function create(){
        return view('create');
    }

    public function store(){
        $pizza = new Pizza();
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->name = request('name');
        $pizza->price = request('price');
        $pizza->save();

        $log = new Log();
        $log->username = Auth::user()->name;
        $log->ip = \Request::ip();
        $log->activity = "New pizza created";
        $log->save();

        return redirect()->route('pizzaHome');
    }

    //edit
    public function editPizza($id){
        $pizza = Pizza::find($id);
        return view('editPizza', compact('pizza'));
    }

    public function editPizzaSave($id){
        $pizza = Pizza::find($id);
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->name = request('name');
        $pizza->price = request('price');
        $pizza->save();

        $log = new Log();
        $log->username = Auth::user()->name;
        $log->ip = \Request::ip();
        $log->activity = "Edited a pizza ". $pizza->type;
        $log->save();

        return redirect()->route('pizzaHome');
    }

    //delete
    public function deletePizza($id){
        $pizza = Pizza::find($id);
        $pizza->delete();

        $log = new Log();
        $log->username = Auth::user()->name;
        $log->ip = \Request::ip();
        $log->activity = "Deleted a pizza";
        $log->save();

        return redirect()->route('pizzaHome');
    }
}
