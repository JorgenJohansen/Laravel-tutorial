<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{

    //protect all the routes
    // public function __construct(){
    //     $this->middleware('auth');
    // }


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
        $pizza->toppings = request('toppings');

        error_log($pizza);
        error_log("Success!");
        // return request('toppings');

        $pizza->save();

        return redirect('/')->with('msg','Thanks for your order!');
    }

    public function destroy($id) {

        $pizza = Pizza::findOrFail($id);
        error_log('before delete');
        $pizza->delete();
        error_log('after delete');
    
        return redirect('/pizzas');
    
      }
}
