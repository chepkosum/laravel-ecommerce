<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    //Function to view all files
    public function index(){

        $colors = Color::all();
        return view('admin.colors.index',compact('colors'));
    }

    //Function to create a color page
    public function create(){

        return view('admin.colors.create');
    }

    //Function for inserting data to database
    public function store(ColorFormRequest $request){

        $validatedData = $request->validated();
        $validatedData['status']=$request->status ==true?'1':'0';
        Color::create($validatedData);

        return redirect('admin/colors')->with('message', 'Color Added Successfully');
    }


    //Function to fetch colors to edit/update
    public function edit(Color $color){

        return view('admin.colors.edit', compact('color'));
    }
    //Function to update the color table
    public function update(ColorFormRequest $request, $color_id){

        $validatedData = $request->validated();
        $validatedData['status']=$request->status ==true?'1':'0';
        Color::find($color_id)->update($validatedData);

        return redirect('admin/colors')->with('message', 'Color Updated Successfully');
    }

    //Function to delete color on the table
    public function destroy($color_id){

        $color = Color::findOrfail($color_id);
        $color->delete();

        return redirect('/admin/colors')->with('message','Color '.$color->name.' deleted.');
    }
}
