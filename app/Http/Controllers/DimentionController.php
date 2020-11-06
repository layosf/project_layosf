<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dimention;

class DimentionController extends Controller
{
    public function index()
    {
        return view('dimention.index')->with(['dimentions'=>Dimention::orderBy('created_at','desc')->get() ]);
    }

    public function store(Request $request)
    {
        try{
            $dm = new Dimention();
            $dm->thick = $request->get('thick');
            $dm->width = $request->get('width');
            $dm->length = $request->get('length');
            $dm->save();

            return redirect()->route('master.dimention')->with('success', 'Data has been saved.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function destroy($id)
    {
        try{
            $dm = Dimention::find($id);
            $dm->delete();
            return redirect()->route('master.dimention')->with('success', 'Data has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('master.dimention')->with('error', 'Cant delete data ready in use.');
            }
        }
    }

    public function edit($id)
    {
        return view('dimention.edit')->with(['dim'=>Dimention::find($id)]);
    }

    public function update(Request $request, $id)
    {
        try{
            $dm = Dimention::find($id);
            $dm->thick = $request->get('thick');
            $dm->width = $request->get('width');
            $dm->length = $request->get('length');
            $dm->save();

            return redirect()->route('master.dimention')->with('success', 'Data has been update.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }
}
