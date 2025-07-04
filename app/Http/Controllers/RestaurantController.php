<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index() {
        return view('restaurant.featured-resto');
    }

    public function view_restaurant() {
        return view('restaurant.restaurant-view');
    }

    public function create_review() {
        return view('restaurant.restaurant-review');
    }
}
