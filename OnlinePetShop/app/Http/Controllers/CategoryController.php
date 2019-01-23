<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [];
        if (Auth::check()) {
	        $categories = Category::paginate(5);

	    } else {
	    	return redirect('/login');  
	    }
	    return view('categories/index', compact('categories'));
    }

    public function create()
    {
	    return view('categories/create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'name'=>'required|max:30',
        'description'=> 'required|max:50',
      ]);
      $category = new Category([
        'name' => $request->get('name'),
        'description'=> $request->get('description'),
      ]);
      $category->save();
      return redirect('/categories/')->with('success', 'Category has been added');
    }


    public function edit($id)
    {	
    	
        $category = Category::find($id);

        return view('categories/edit')->with('category', $category);
    }


    public function update(Request $request, $id)
	{
		$request->validate([
			'name'=>'required|max:30',
			'description'=> 'required|max:50'
		]);

		$category = Category::find($id);
		$category->name = $request->get('name');
		$category->description = $request->get('description');
		$category->save();

		return redirect('categories')->with('success', 'Category has been updated');
  	}

  	public function destroy($id)
  	{
  		$category = Category::find($id);
  		$category->delete();

  		return redirect('categories')->with('success', 'Category has been deleted');
  	}
}
