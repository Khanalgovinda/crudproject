<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Govinda;

class GovindaController extends Controller
{
    public function index(){
        $govindas = Govinda::latest()->get();
        return view ('govinda.index' , compact('govindas'));
    }

    // Add lead
    public function add(){
        $govindas = Govinda::orderBy('name', 'ASC')->get();
        return view ('govinda.add', compact('govindas'));
    }

    // Store lead
    public function store(Request $request){
        $data = $request->all();
       $govinda = new govinda();
       $govinda->name = $data['name'];
       $govinda->email = $data['email'];
       $govinda->save();
        return redirect()->back();
    }

    // Edit lead
public function edit($id){
    $govinda = Govinda::findOrFail($id);
    return view ('govinda.edit', compact('govinda'));
}
public function update(Request $request, $id){
    $data = $request->all();
    $govinda = Govinda::findOrFail($id);
    $govinda->name = $data['name'];
    $govinda->email = $data['email'];
    $govinda->save();
    return redirect()->back();
}

// Delete
public function destroy($id){
    $govinda = Govinda::findOrFail($id);
    $govinda->delete();
    return redirect()->back();


}
}