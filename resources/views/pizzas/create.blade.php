@extends('layouts.layout')

@section('content')
<div class="wrapper create-pizza">
    <h1>Create a New Pizza</h1>
    <form action="/pizzas" method="POST">
        @csrf
        <label for="name">Your name:</label>
        <!-- type for HTML5, id for JS/CSS, name for post requests/php-->
        <input type="text" id="name" name="name">
        <label for="type">Choose pizza type</label>
        <select name="type" id="type">
            <option value="margherita">Margherita</option>
            <option value="hawaiian">Hawaiian</option>
            <option value="veg supreme">Veg Supreme</option>
            <option value="volcano">Volcano</option>
        </select>
        <label for="type">Choose pizza base</label>
        <select name="base" id="base">
            <option value="cheesy crust">Cheesy Crust</option>
            <option value="garlic crust">Garlic Crust</option>
            <option value="thin & crispy">Thin & Crispy</option>
            <option value="thick">Thick</option>
        </select>

        <fieldset>Extra toppings</fieldset>
        <input type="checkbox" name="toppings[]" value="mushrooms">Mushrooms <br />
        <input type="checkbox" name="toppings[]" value="peppers">Peppers <br />
        <input type="checkbox" name="toppings[]" value="garlic">Garlic <br />
        <input type="checkbox" name="toppings[]" value="olives">Olives <br />
        <input type="submit" value="Order Pizza">
    </form>
</div>
@endsection
