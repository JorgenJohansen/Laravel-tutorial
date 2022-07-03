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
        
        return view('pizzas', [
            'pizzas' => $pizzas,
            
        ]);
    }

    public function show($id){
        return view('details', ['id'=> $id]);
    }
}
