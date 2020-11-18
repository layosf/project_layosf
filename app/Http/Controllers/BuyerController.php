<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buyer;
use App\IndProv;
use App\IndCity;
use App\Country;
use App\BankAccount;
use Illuminate\Support\Facades\DB;

class BuyerController extends Controller
{
    public function index(){
        return view('buyer.create')->with(['countries'=>Country::all(), 'bankaccounts'=>BankAccount::all() ]);
    }

    public function list(){
        $buyer = DB::table('buyer')
                ->leftJoin('indonesia_cities as city', 'buyer.city_id', '=', 'city.id')
                ->leftJoin('indonesia_provinces as prov', 'city.province_id', '=', 'prov.id')
                ->leftJoin('country', 'prov.country_id', '=', 'country.id')
                ->leftJoin('bank_account', 'buyer.bankaccount_id', '=', 'bank_account.id')
                ->leftJoin('bank', 'bank_account.bank_id', '=', 'bank.id')
                ->select('buyer.id','buyer.name', 'buyer.address','buyer.phone', 'buyer.fax', 'buyer.email', 'buyer.postal_code', 'country.name as countryname', 'prov.name as provname', 'city.name as cityname', 'bank_account.accountname', 'bank_account.accountno', 'bank.namebank')
                ->get();
        

        return view('buyer.list')->with(['buyers'=>$buyer]);
    }

    public function store(Request $request){
        try{
            $b = new Buyer();
            $b->name = $request->get('name');
            $b->address = $request->get('address');
            $b->city_id = $request->get('city_id');
            $b->phone = $request->get('phone');
            $b->fax = $request->get('fax');
            $b->email = $request->get('email');
            $b->postal_code = $request->get('postal_code');
            $b->bankaccount_id = $request->get('bankaccount_id');
            $b->save();
            
            return redirect()->route('master.buyer')->with('success', 'Data has been saved.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e);
        }
    }

    public function edit($id){
        $buyer = DB::table('buyer')
                ->leftJoin('indonesia_cities as city', 'buyer.city_id', '=', 'city.id')
                ->leftJoin('indonesia_provinces as prov', 'city.province_id', '=', 'prov.id')
                ->leftJoin('country', 'prov.country_id', '=', 'country.id')
                ->leftJoin('bank_account', 'buyer.bankaccount_id', '=', 'bank_account.id')
                ->leftJoin('bank', 'bank_account.bank_id', '=', 'bank.id')
                ->select('buyer.id as buyer_id','buyer.name', 'buyer.address','buyer.phone', 'buyer.fax', 'buyer.email', 'buyer.postal_code', 'country.id as countryid','country.name as countryname', 'prov.id as provid','prov.name as provname', 'city.id as cityid','city.name as cityname', 'bank_account.id as bank_accountid','bank_account.accountname', 'bank_account.accountno', 'bank.namebank')
                ->where('buyer.id',$id)
                ->get()[0];

        return view('buyer.edit')->with(['countries'=>Country::all(), 'bankaccounts'=>BankAccount::all(), 'buyer'=>$buyer, 'city'=>IndCity::all(), 'provinces'=>IndProv::all() ]);
    }

    public function update(Request $request, $id){
        try{
            $b = Buyer::find($id);
            $b->name = $request->get('name');
            $b->address = $request->get('address');
            $b->city_id = $request->get('city_id');
            $b->phone = $request->get('phone');
            $b->fax = $request->get('fax');
            $b->email = $request->get('email');
            $b->postal_code = $request->get('postal_code');
            $b->bankaccount_id = $request->get('bankaccount_id');
            $b->save();
            return redirect()->route('master.buyer')->with('success', 'Data has been updated.');
            
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e);
        }
    }

    public function destroy($id){
        try{
            $b = Buyer::find($id);
            $b->delete();
            return redirect()->route('master.buyer.list')->with('success', 'Data has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('master.buyer.list')->with('error', 'Cant delete data ready in use.');
            }
        }
    }
}
