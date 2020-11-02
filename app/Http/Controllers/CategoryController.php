<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('category.create')->with(['cats'=>Category::all() ]);
    }

    public function list(){
        return view('category.index');
    }

    public function store(Request $request){
        try{
            $c = new Category();
            $c->name = $request->get('name');
            $c->save();

            return redirect()->route('master.category')->with('success', 'Data has been saved.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function edit($id){
        return view('category.edit')->with(['cat'=>Category::find($id)]);
    }

    public function update(Request $request, $id){
        try{
            $c = Category::find($id);
            $c->name = $request->get('name');
            $c->save();

            return redirect()->route('master.category')->with('success', 'Data has been updated.');
        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function destroy($id){
        try{
            $c = Category::find($id);
            $c->delete();
            return redirect()->route('master.category')->with('success', 'Data has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('master.category')->with('error', 'Cant delete data ready in use.');
            }
        }
    }

}
