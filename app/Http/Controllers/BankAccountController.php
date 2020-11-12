<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use App\BankAccount;

class BankAccountController extends Controller
{
    public function index(){
        return view('bank_account.create')->with(['banks'=>Bank::all()]);
    }

    public function store(Request $request){
        try{
            $b = new BankAccount();
            $b->bank_id = $request->get('bank_id');
            $b->accountname = $request->get('accountname');
            $b->accountno = $request->get('accountno');
            $b->phone = $request->get('phone');
            $b->address = $request->get('address');
            $b->save();

            
            return redirect()->route('master.bankaccount')->with('success', 'Data has been saved.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function list(){
        return view('bank_account.list')->with(['bankaccount'=>BankAccount::all()]);
    }

    public function edit($id){
        return view('bank_account.edit')->with(['banks'=>Bank::all(), 'ba'=>BankAccount::find($id)]);
    }

    public function update(Request $request, $id){
        try{
            $b = BankAccount::find($id);
            $b->bank_id = $request->get('bank_id');
            $b->accountname = $request->get('accountname');
            $b->accountno = $request->get('accountno');
            $b->phone = $request->get('phone');
            $b->address = $request->get('address');
            $b->save();

            
            return redirect()->route('master.bankaccount')->with('success', 'Data has been updated.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }
    public function delete($id){
        try{
            $b = BankAccount::find($id);
            $b->delete();
            return redirect()->route('master.bankaccount.list')->with('success', 'Data has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('master.bankaccount.list')->with('error', 'Cant delete data ready in use.');
            }
        }
    }

}
