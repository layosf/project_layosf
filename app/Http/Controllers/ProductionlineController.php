<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productionline;

class ProductionlineController extends Controller
{
    public function index(){
        return view('productionline.create');
    }
    public function list(){
        return view('productionline.list')->with(['productionline'=>Productionline::all()]);
    }

    public function store(Request $request){
        try{
            $s = new Productionline();
            $s->name = $request->get('name');
            $s->code = $request->get('codeprodline');
            $s->save();

            return redirect()->route('master.productionline')->with('success', 'Data has been saved.');

        }catch(\Exception $e){
            return redirect()->back()->with('error', $e);
        }
        

    }

    public function edit($id){
        return view('productionline.edit')->with(['productionlines'=>Productionline::find($id)]);
    }

    public function update(Request $request, $id){
        try{
            $s = Productionline::find($id);
            $s->name = $request->get('name');
            $s->code = $request->get('codeprodline');
            $s->save();

            return redirect()->route('master.productionline.list')->with('success', 'Data has been update.');

        }catch(\Exception $e){
            return redirect()->back()->with('error', $e);
        }
    }

    public function destroy($id){
        try{
            $sdel = Productionline::find($id);
            $sdel->delete();
            return redirect()->route('master.productionline.list')->with('success', 'Data has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('master.productionline.list')->with('error', 'Cant delete data ready in use.');
            }
        }
    }
}
