<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Species;

class SpeciesController extends Controller
{
    public function index(){
        return view('species.create');
    }
    public function list(){
        return view('species.list')->with(['species'=>Species::all()]);
    }

    public function store(Request $request){
        try{
            $s = new Species();
            $s->name = $request->get('name');
            $s->autocode = $request->get('autocode');
            $s->save();

            return redirect()->route('master.species')->with('success', 'Data has been saved.');

        }catch(\Exception $e){
            return redirect()->back()->with('error', $e);
        }
        

    }

    public function edit($id){
        return view('species.edit')->with(['speciess'=>Species::find($id)]);
    }

    public function update(Request $request, $id){
        try{
            $s = Species::find($id);
            $s->name = $request->get('name');
            $s->autocode = $request->get('autocode');
            $s->save();

            return redirect()->route('master.species.list')->with('success', 'Data has been update.');

        }catch(\Exception $e){
            return redirect()->back()->with('error', $e);
        }
    }

    public function destroy($id){
        try{
            $sdel = Species::find($id);
            $sdel->delete();
            return redirect()->route('master.species.list')->with('success', 'Data has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('master.species.list')->with('error', 'Cant delete data ready in use.');
            }
        }
    }
}
