<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index(){
        // $pizzas = Pizza::all();
        // $pizzas = Pizza::orderby('name')->get();
        // $pizzas = Pizza::where('type','hawaiian')->get();
        $pizzas = Pizza::latest()->get();
        
        return view('pizzas.index', [
            'pizzas' => $pizzas,
            
        ]);
    }

    public function show($id){

        $pizza = Pizza::findOrFail($id);
        return view('pizzas.show', ['pizza'=> $pizza]);
    }

    public function create(){

        return view('pizzas.create');
    }


    public function store(){
        // Does not work
        // Works on powershell admin
        // https://stackoverflow.com/questions/1678009/phps-configuration-setting-error-log-is-not-working
        // error_log(request('name'));
        // error_log(request('type'));
        // error_log(request('base'));

        $pizza = new Pizza();

        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');

        error_log($pizza);
        error_log("Success!");

        $pizza->save();

        return redirect('/')->with('msg','Thanks for your order!');
    }
}
