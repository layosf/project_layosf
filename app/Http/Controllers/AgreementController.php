<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agreement;
use App\Species;
use App\Category;
use App\Supplier;
use App\Company;
use App\IndProv;
use App\IndCity;
use App\Tax;
use App\Currency;
use App\Certificate;
use App\Dimention;
use App\AgreementDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class AgreementController extends Controller
{
    public function index(){
        return view('agreement-supplier.index')->with(['speciess'=>Species::all(), 'category'=>Category::all(), 'suppliers'=>Supplier::all(), 'companies'=>Company::where('code','LYSF')->get()[0], 'province'=>IndProv::all(), 'cities'=>IndCity::all(), 'taxs'=>Tax::all(), 'currency'=>Currency::all(), 'certificate'=>Certificate::all(), 'agreements'=>Agreement::all(), 'dimentions'=>Dimention::all(), 'details'=>AgreementDetail::all() ]);
    }

    public function list(){
        $list = DB::table('agreement as a')
                ->leftJoin('species as b', 'a.species_id', '=', 'b.id')
                ->leftJoin('category as c', 'a.category_id', '=','c.id')
                ->leftJoin('supplier as d', 'a.supplier_id', '=', 'd.id')
                ->leftJoin('bank_account as e', 'd.bankaccount_id', '=', 'e.id')
                ->leftJoin('bank as f', 'e.bank_id', '=', 'f.id')
                ->leftJoin('tax', 'a.taxppn_id', '=', 'tax.id')
                ->leftJoin('tax as g', 'a.taxpph_id', '=', 'g.id')
                ->leftJoin('currency as h', 'a.currency_id', '=', 'h.id')
                ->leftJoin('certificate as i', 'a.certificate_id', '=', 'i.id')
                ->leftJoin('company as j', 'a.beneficiary_id', '=', 'j.id')
                ->select('a.id','a.code','a.startcontract', 'a.expiredcontract', 'a.vol_m3', 'a.paymentnote', 'a.transport', 'a.volumenote', 'a.qualitynote', 'a.measurement', 'a.document', 'a.status', 'b.name as speciesname', 'c.name as categoryname', 'd.name as suppliername', 'd.address as supplieraddress', 'd.contact_person as suppliercp','e.accountname', 'e.accountno', 'f.namebank', 'tax.name as taxppn', 'g.name as taxpph', 'h.code as currencycode', 'i.cert_code', 'j.name as beneficiaryname', 'j.contact_person as beneficiary_cp')
                ->get();
        
        return view('agreement-supplier.list')->with(['lists'=>$list]);
    }

    public function store_detail(Request $request){
        try{
            $a = new AgreementDetail();
            $a->agreement_id = $request->get('agreement_id');
            $a->price = $request->get('price');
            $a->currency_id = $request->get('currency_id');
            $a->qty_pcs = $request->get('qty_pcs');
            $a->phisic_dimention = $request->get('phisic_dimention');
            $a->invoice_dimention = $request->get('invoice_dimention');
            $a->save();

            return redirect()->route('agreement.detail')->with('success', 'Data has been saved.');

        }catch(Exception $e){
            return redirect()->back()->with('error', $e);
        }
    }

    public function edit_detail($id){
        return view('agreement-supplier.edit_detail')->with(['speciess'=>Species::all(), 'category'=>Category::all(), 'suppliers'=>Supplier::all(), 'companies'=>Company::where('code','LYSF')->get()[0], 'province'=>IndProv::all(), 'cities'=>IndCity::all(), 'taxs'=>Tax::all(), 'currency'=>Currency::all(), 'certificate'=>Certificate::all(), 'agreements'=>Agreement::all(), 'dimentions'=>Dimention::all(), 'details'=>AgreementDetail::all(), 'detail'=>AgreementDetail::find($id) ]);
    }

    public function update_detail(Request $request, $id){
        try{
            $a = AgreementDetail::find($id);
            $a->agreement_id = $request->get('agreement_id');
            $a->price = $request->get('price');
            $a->currency_id = $request->get('currency_id');
            $a->qty_pcs = $request->get('qty_pcs');
            $a->phisic_dimention = $request->get('phisic_dimention');
            $a->invoice_dimention = $request->get('invoice_dimention');
            $a->save();

            return redirect()->route('agreement.detail')->with('success', 'Data has been updated.');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e);
        }
    }

    public function delete_detail($id){
        try{
            $a = AgreementDetail::find($id);
            $a->delete();
            return redirect()->route('agreement.detail')->with('success', 'Data has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('agreement.detail')->with('error', 'Cant delete data ready in use.');
            }
        }
    }

    public function store(Request $request){
        try{
            $a = new Agreement();
            $a->code = $request->get('code');
            $a->amended = $request->get('amended');
            $a->startcontract = $request->get('startcontract');
            $a->expiredcontract = $request->get('expiredcontract');
            $a->category_id = $request->get('category_id');
            $a->species_id = $request->get('species_id');
            $a->vol_m3 = $request->get('vol_m3');
            $a->supplier_id = $request->get('supplier_id');
            $a->paymentnote = $request->get('paymentnote');
            $a->beneficiary_id = $request->get('beneficiary_id');
            $a->taxppn_id = $request->get('taxppn_id');
            $a->taxpph_id = $request->get('taxpph_id');
            $a->currency_id = $request->get('currency_id');
            $a->transport = $request->get('transport');
            $a->certificate_id = $request->get('certificate_id');
            $a->volumenote = $request->get('volumenote');
            $a->qualitynote = $request->get('qualitynote');
            $a->measurement = $request->get('measurement');
            $a->document = $request->get('document');
            $a->created_by = Auth::user()->id;
            $a->status = '1'; //hold
            $a->save();

            return redirect()->route('agreement.index')->with('success', 'Data has been saved.');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', $e);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $a = Agreement::find($id);
            $a->code = $request->get('code');
            $a->amended = $request->get('amended');
            $a->startcontract = $request->get('startcontract');
            $a->expiredcontract = $request->get('expiredcontract');
            $a->category_id = $request->get('category_id');
            $a->species_id = $request->get('species_id');
            $a->vol_m3 = $request->get('vol_m3');
            $a->supplier_id = $request->get('supplier_id');
            $a->paymentnote = $request->get('paymentnote');
            $a->beneficiary_id = $request->get('beneficiary_id');
            $a->taxppn_id = $request->get('taxppn_id');
            $a->taxpph_id = $request->get('taxpph_id');
            $a->currency_id = $request->get('currency_id');
            $a->transport = $request->get('transport');
            $a->certificate_id = $request->get('certificate_id');
            $a->volumenote = $request->get('volumenote');
            $a->qualitynote = $request->get('qualitynote');
            $a->measurement = $request->get('measurement');
            $a->document = $request->get('document');
            $a->created_by = Auth::user()->id;
            $a->status = '1'; //hold
            $a->save();

            return redirect()->route('agreement.index')->with('success', 'Data has been update.');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', $e);
        }
    }

    public function edit($id){
        $ae = Agreement::find($id);
        $sup = DB::table('supplier as s')
                ->leftJoin('bank_account as ba', 's.bankaccount_id', '=', 'ba.id')
                ->leftJoin('bank', 'ba.bank_id', '=', 'bank.id')
                ->leftJoin('indonesia_cities as c', 's.city_id', '=', 'c.id')
                ->select('s.name','s.address','c.name as cityname', 'ba.accountno', 'ba.accountname', 'bank.namebank')
                ->where('s.id', $ae->supplier_id)
                ->get();
        // dd($sup);

        return view('agreement-supplier.edit')->with(['speciess'=>Species::all(), 'category'=>Category::all(), 'suppliers'=>Supplier::all(), 'companies'=>Company::where('code','LYSF')->get()[0], 'province'=>IndProv::all(), 'cities'=>IndCity::all(), 'taxs'=>Tax::all(), 'currency'=>Currency::all(), 'certificate'=>Certificate::all(), 'ae'=>Agreement::find($id), 'sup'=>$sup[0] ]);
    }

    public function delete($id){
        try{
            $a = Agreement::find($id);
            $a->delete();
            return redirect()->route('agreement.index')->with('success', 'Data has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('agreement.index')->with('error', 'Cant delete data ready in use.');
            }
        }
    }

    public function print($id){
        $agreement = Agreement::find($id);
        $pihak = DB::table('agreement as a')
                ->leftJoin('supplier as s', 'a.supplier_id', '=', 's.id')
                ->leftJoin('company as c', 'a.beneficiary_id', '=', 'c.id')
                ->select('s.name as suppliername', 's.contact_person as supplier_cp','s.address as supplier_address','c.name as beneficiaryname', 'c.contact_person as beneficiary_cp', 'c.address as beneficiaryaddress')
                ->where('a.id', $id)
                ->get();

        $sizes = DB::table('agreement_detail as a')
                ->leftJoin('agreement as e', 'a.agreement_id', '=', 'e.id')
                ->leftJoin('tax as t', 'e.taxppn_id', '=', 't.id')
                ->leftJoin('currency as d', 'a.currency_id', '=', 'd.id')
                ->leftJoin('dimention as b', 'a.phisic_dimention', '=', 'b.id')
                ->leftJoin('dimention as c', 'a.invoice_dimention', '=', 'c.id')
                ->select(DB::raw("CONCAT(b.thick,'x',b.width,'x',b.length) as phiDim"),DB::raw("CONCAT(c.thick,'x',c.width,'x',c.length) as invDim"),'a.qty_pcs', 'a.price', 'd.code as cdcurrency', 't.name as taxppn')
                ->where('a.agreement_id', $id)
                ->get();
        // dd($sizes);

        $detail = DB::table('agreement as a')
                ->leftJoin('species as b', 'a.species_id', '=', 'b.id')
                ->leftJoin('category as c', 'a.category_id', '=','c.id')
                ->leftJoin('supplier as d', 'a.supplier_id', '=', 'd.id')
                ->leftJoin('bank_account as e', 'd.bankaccount_id', '=', 'e.id')
                ->leftJoin('bank as f', 'e.bank_id', '=', 'f.id')
                ->leftJoin('tax', 'a.taxppn_id', '=', 'tax.id')
                ->leftJoin('tax as g', 'a.taxpph_id', '=', 'g.id')
                ->leftJoin('currency as h', 'a.currency_id', '=', 'h.id')
                ->leftJoin('certificate as i', 'a.certificate_id', '=', 'i.id')
                ->leftJoin('company as j', 'a.beneficiary_id', '=', 'j.id')
                ->select('a.id','a.code','a.startcontract', 'a.expiredcontract', 'a.vol_m3', 'a.paymentnote', 'a.transport', 'a.volumenote', 'a.qualitynote', 'a.measurement', 'a.document', 'a.status', 'b.name as speciesname', 'c.name as categoryname', 'd.name as suppliername', 'd.address as supplieraddress', 'd.contact_person as suppliercp','e.accountname', 'e.accountno', 'f.namebank', 'tax.name as taxppn', 'g.name as taxpph', 'h.code as currencycode', 'i.cert_code', 'i.cert_name','j.name as beneficiaryname', 'j.contact_person as beneficiary_cp')
                ->where('a.id', $id)
                ->get();
       

        $pdf = PDF::loadView('agreement-supplier.report', compact('agreement', 'pihak', 'detail', 'sizes'));
        return $pdf->stream('Agreement '.$id.'.pdf');
    }
    public function get_infosupplier($id){
        
        $get = DB::table('supplier as s')
                ->leftJoin('bank_account as b', 'b.id', '=', 's.bankaccount_id')
                ->leftJoin('bank', 'bank.id', '=', 'b.bank_id')
                ->leftJoin('indonesia_cities as c', 'c.id', '=', 's.city_id')
                ->leftJoin('indonesia_provinces as p', 'p.id', '=','s.province_id')
                ->select('s.name','s.address', 'c.name as cityname', 'p.name as provname', 'bank.namebank', 'b.accountname', 'b.accountno')
                ->where('s.id', $id)
                ->get();
        foreach($get as $g)
        {
            return json_encode(array($g->name, $g->address, $g->cityname, $g->namebank, $g->accountno, $g->accountname));
        }
    }
}
