<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Manufacturer;
use Validator;
use Illuminate\Support\Facades\Auth;

class ManufacturerController extends Controller
{
    public function index()
    {
        $manufacturers = [];
        if (Auth::check()) {
	        $manufacturers = Manufacturer::paginate(5);

	    } else {
	    	return redirect('/login');  
	    }
	    return view('manufacturers/index', compact('manufacturers'));
    }

    public function create()
    {
	    return view('manufacturers/create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'name'=>'required|max:30',
        'address'=> 'required|max:50',
        'email'=> 'required|email',
      ]);
      $manufacturer = new Manufacturer([
        'name' => $request->get('name'),
        'address'=> $request->get('address'),
        'email'=> $request->get('email'),
      ]);
      $manufacturer->save();
      return redirect('/manufacturers/')->with('success', 'Manufacturer has been added');
    }


    public function edit($id)
    {	
    	
        $manufacturer = Manufacturer::find($id);

        return view('manufacturers/edit')->with('manufacturer', $manufacturer);
    }


    public function update(Request $request, $id)
	{
		$request->validate([
	        'name'=>'required|max:30',
	        'address'=> 'required|max:50',
	        'email'=> 'required|email',
		]);

		$manufacturer = Manufacturer::find($id);
		$manufacturer->name = $request->get('name');
		$manufacturer->address = $request->get('address');
		$manufacturer->email = $request->get('email');
		$manufacturer->save();

		return redirect('manufacturers')->with('success', 'Manufacturer has been updated');
  	}

  	public function destroy($id)
  	{
  		$manufacturer = Manufacturer::find($id);
  		$manufacturer->delete();

  		return redirect('manufacturers')->with('success', 'Manufacturer has been deleted');
  	}
}
