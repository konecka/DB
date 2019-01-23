<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Category;

// use \App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;


class ProductController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	*/
    public function index()
    {
        $products = [];
        if (Auth::check()) {
	        $products = Product::paginate(5);
	    } else {
	    	return redirect('/login');  
	    }
	    return view('products/index', compact('products'));
    }


    public function create()
    {
        $categories = [];
        if (Auth::check()) {
            $categories = Category::get();
        } else {
            return redirect('/login');  
        }
	    return view('products/create', compact('categories'));
    }


    public function store(Request $request)
    {
        if (!Auth::check()) {
	    	return redirect('/login');  
	    }

	    $request->validate([
        	'name' => 'required|max:50',
        	'category_id' =>' required|integer',
        	'amount' => 'required|integer',
        	'manufacturer' => 'required|max:50',
      	]);
      	$product = new Product([
        	'name' => $request->get('name'),
        	'category_id' => $request->get('category_id'),
        	'amount' => $request->get('amount'),
        	'manufacturer' => $request->get('manufacturer'),
      	]);
	    return view('/home');
    }

    public function edit($id)
    {
        $share = Share::find($id);

        return view('shares.edit', compact('share'));
    }
}
