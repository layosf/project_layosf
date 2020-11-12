<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;

class GradeController extends Controller
{
    public function index(){
        return view('grade.index')->with(['grades'=>Grade::all()]);
    }

    public function store(Request $request){
        try{
            $g = new Grade();
            $g->name = $request->get('name');
            $g->save();

            return redirect()->route('master.grade')->with('success', 'Data has been saved.');

        }catch(\Exception $e){
            return redirect()->back()->with('error', $e);
        }
       
    }

<<<<<<< HEAD
=======
    public function edit($id){
        return view('grade.edit')->with(['grades'=>Grade::find($id)]);
    }

>>>>>>> 9b093b8a53b49b0594bb62dc323cf9e5042d23d2
    public function update(Request $request, $id){
        try{
            $g = Grade::find($id);
            $g->name = $request->get('name');
            $g->save();

            return redirect()->route('master.grade')->with('success', 'Data has been updated.');

        }catch(\Exception $e){
            return redirect()->back()->with('error', $e);
        }
    }

    public function destroy($id){
        try{
            $gdel = Grade::find($id);
            $gdel->delete();
            return redirect()->route('master.grade')->with('success', 'Data has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('master.grade')->with('error', 'Cant delete data ready in use.');
            }
        }
    }
}
