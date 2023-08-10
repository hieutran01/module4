<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{


    public function index()
{
    $sizes = Size::all();
    return view('admin.products.index_size', compact('sizes'));
}
    public function create()
    {
        return view('admin.products.create_size');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:sizes|max:255',
        ]);
    
        $size = new Size;
        $size->name = $request->input('name');
        $size->save();
    
        return redirect()->route('size.index')->with('success', 'Size created successfully');
    }

    public function edit($id)
    {
        $size = Size::findOrFail($id);
        return view('admin.products.edit_size', compact('size'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:sizes,name,'.$id.'|max:255',
        ]);
    
        $size = Size::findOrFail($id);
        $size->name = $request->input('name');
        $size->save();
    
        return redirect()->route('size.index')->with('success', 'Size updated successfully');
    }

    public function destroy($id)
    {
        $size = Size::findOrFail($id);
        $size->delete();

        return redirect()->route('size.index')->with('success', 'Size deleted successfully');
    }
}