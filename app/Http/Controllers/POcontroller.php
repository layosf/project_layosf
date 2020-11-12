<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buyer;
use App\Species;
use App\PO;
use App\POdetail;
use App\POrequirement;
use App\POtop;
use App\PObottom;
use App\POcore;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class POcontroller extends Controller
{
    public function index(){
        return view('po.index')->with(['buyers'=>Buyer::all(), 'pos'=>PO::all(), 'species'=>Species::all(), 'details'=>POdetail::buyerpo(), 'listpo'=>PO::all(), 'reqs'=>POrequirement::all(), 'tops'=>POtop::buyerpo(), 'bottoms'=>PObottom::buyerpo(), 'core'=>POcore::buyerpo()  ]);
    }

    public function general_store(Request $request)
    {
        $i = 1;
        $j = 1;
        $yearnow = date('Y');
        $year = Str::substr($yearnow, -2);
        //LOCK TABLE
        DB::raw('LOCK TABLE po WRITE');

        //CHECK 
        $po = PO::all();
        if(! $po->isEmpty())
        {
            //ada
            $last_code = PO::max('order_number');
            
            $code = Str::substr($last_code, -4);
            $code_c = $code+1;
            $on = str_pad($code_c,5,'0',STR_PAD_LEFT); 
            $onn = str_pad($j,5,'0',STR_PAD_LEFT); 

            //tahun yg ada di field tabel
            $yearfield = Str::substr($last_code,0,2);
            //cek tahun
            if($year != $yearfield)
            {
                $ordernumber = $year.$onn;
            }
            else
            {
                $ordernumber = $year.$on;
            }
        }
        else
        {
            $on = str_pad($i,5,'0',STR_PAD_LEFT);
            $ordernumber = $year.$on;
        }

        try{
            $d = new PO();
            $d->order_number = $ordernumber;
            $d->order_date = $request->get('order_date');
            $d->buyer_id = $request->get('buyer_id');
            $d->save();

            DB::raw('UNLOCK TABLE');
            
            return redirect()->route('po.index')->with('success', 'Data has been saved. Order Number '.$ordernumber);

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }

        
    }

    public function orderdetail_store(Request $request){
        try{
            $p = new POdetail();
            $p->po_id = $request->get('ordernumber_id');
            $p->species_id = $request->get('species_id');
            $p->tenon = $request->get('tenon');
            $p->surface_effect = $request->get('surface_effect');
            $p->thick = $request->get('thick');
            $p->width = $request->get('width');
            $p->length = $request->get('length');
            $p->pcs_order = $request->get('pcs_order');
            $p->box_qty = $request->get('box_qty');
            $p->pallet_qty = $request->get('pallet_qty');
            $p->colour = $request->get('colour');
            $p->qty_m2 = $request->get('qty_m2');
            $p->veneer_grade = $request->get('veneer_grade');
            $p->veneer_process = $request->get('veneer_process');
            $p->veneer_color = $request->get('veneer_color');
            $p->package = $request->get('package');
            $p->pallet = $request->get('pallet');
            $p->bracket_type = $request->get('bracket_type');
            $p->save();
            
            return redirect()->route('po.index')->with('success', 'Data has been saved.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function orderrequirement_store(Request $request){
        try{
            $p = new POrequirement();
            $p->po_id = $request->get('ordernumberid');
            $p->back_veneer = $request->get('back_veneer');
            $p->core_board = $request->get('core_board');
            $p->base_layer = $request->get('base_layer');
            $p->paint_process = $request->get('paint_process');
            $p->brightness = $request->get('brightness');
            $p->delivery_date = $request->get('delivery_date');
            $p->tenon = $request->get('tenon');
            $p->chamfer = $request->get('chamfer');
            $p->product_description = $request->get('product_description');
            $p->surface_thickness = $request->get('surface_thickness');
            $p->mc_range = $request->get('mc_range');
            $p->tolerance_thickness = $request->get('tolerance_thickness');
            $p->back_groove = $request->get('back_groove');
            $p->customer_specific_paint = $request->get('customer_specific_paint');
            $p->customer_follow_order = $request->get('customer_follow_order');
            $p->keep_sample = $request->get('keep_sample');
            $p->save();

            return redirect()->route('po.index')->with('success', 'Data has been saved.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
            
    }

    public function get_info($id){
        $buyer_id = PO::where('id', $id)->pluck('buyer_id');
        $get = Buyer::where('id', $buyer_id[0])->pluck('name', 'id');
        return json_encode($get);
    }

    public function get_infodate($id){
        $date= PO::where('id', $id)->pluck('order_date');
        return json_encode(array($date));
    }

    public function list()
    {
        return view('po.list')->with(['listpo'=>PO::all()]);
    }

    public function editgeneral($id){
        return view('po.editgeneral')->with(['po'=>PO::find($id), 'buyers'=>Buyer::all()]);
    }

    public function updategeneral(Request $request, $id){
        try{
            $d = PO::find($id);
            $d->order_date = $request->get('order_date');
            $d->buyer_id = $request->get('buyer_id');
            $d->save();
            
            return redirect()->route('po.index')->with('success', 'Data has been updated.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function edit_orderdetail($id){


        return view('po.editdetail')->with(['pod'=>POdetail::find($id), 'pos'=>PO::all(), 'species'=>Species::all(), 'buyers'=>Buyer::all() ]);
    }

    public function edit_requirement($id){
        return view('po.editrequirement')->with(['req'=>POrequirement::find($id), 'pos'=>PO::all()]);
    }

    public function updaterequirement(Request $request,$id){
        try{
            $p = POrequirement::find($id);
            $p->po_id = $request->get('ordernumberid');
            $p->back_veneer = $request->get('back_veneer');
            $p->core_board = $request->get('core_board');
            $p->base_layer = $request->get('base_layer');
            $p->paint_process = $request->get('paint_process');
            $p->brightness = $request->get('brightness');
            $p->delivery_date = $request->get('delivery_date');
            $p->tenon = $request->get('tenon');
            $p->chamfer = $request->get('chamfer');
            $p->product_description = $request->get('product_description');
            $p->surface_thickness = $request->get('surface_thickness');
            $p->mc_range = $request->get('mc_range');
            $p->tolerance_thickness = $request->get('tolerance_thickness');
            $p->back_groove = $request->get('back_groove');
            $p->customer_specific_paint = $request->get('customer_specific_paint');
            $p->customer_follow_order = $request->get('customer_follow_order');
            $p->keep_sample = $request->get('keep_sample');
            $p->save();

            return redirect()->route('po.index')->with('success', 'Data has been updated.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function updatedetail(Request $request,$id){
        try{
            $p = POdetail::find($id);
            $p->po_id = $request->get('ordernumber_id');
            $p->species_id = $request->get('species_id');
            $p->tenon = $request->get('tenon');
            $p->surface_effect = $request->get('surface_effect');
            $p->thick = $request->get('thick');
            $p->width = $request->get('width');
            $p->length = $request->get('length');
            $p->pcs_order = $request->get('pcs_order');
            $p->box_qty = $request->get('box_qty');
            $p->pallet_qty = $request->get('pallet_qty');
            $p->colour = $request->get('colour');
            $p->qty_m2 = $request->get('qty_m2');
            $p->veneer_grade = $request->get('veneer_grade');
            $p->veneer_process = $request->get('veneer_process');
            $p->veneer_color = $request->get('veneer_color');
            $p->package = $request->get('package');
            $p->pallet = $request->get('pallet');
            $p->bracket_type = $request->get('bracket_type');
            $p->save();
            
            
            return redirect()->route('po.index')->with('success', 'Data has been updated.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function top_store(Request $request){
        try{
            
            $s = new POtop();
            $s->po_id = $request->get('ordernum_id');
            $s->material_name = $request->get('material_name');
            $s->delivery_size = $request->get('delivery_size');
            $s->settlement_size = $request->get('settlement_size');
            $s->feeding_quantity = $request->get('feeding_quantity');
            $s->application_date = $request->get('application_date');
            $s->delivery_date = $request->get('delivery_date');
            $s->remark = $request->get('remark');
            $s->save();
            
            return redirect()->route('po.index')->with('success', 'Data has been saved.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function edit_top($id){
        return view('po.edittop')->with(['tops'=>POtop::find($id), 'pos'=>PO::all(), 'buyers'=>Buyer::all()]);
    }

    public function updatetop($id, Request $request){
        try{
            $s = POtop::find($id);
            $s->po_id = $request->get('ordernum_id');
            $s->material_name = $request->get('material_name');
            $s->delivery_size = $request->get('delivery_size');
            $s->settlement_size = $request->get('settlement_size');
            $s->feeding_quantity = $request->get('feeding_quantity');
            $s->application_date = $request->get('application_date');
            $s->delivery_date = $request->get('delivery_date');
            $s->remark = $request->get('remark');
            $s->save();
            
            return redirect()->route('po.index')->with('success', 'Data has been updated.');

        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function bottom_store(Request $request){
        try{
            $s = new PObottom();
            $s->po_id = $request->get('ordernumb_id');
            $s->material_name = $request->get('material_name');
            $s->delivery_size = $request->get('delivery_size');
            $s->settlement_size = $request->get('settlement_size');
            $s->feeding_quantity = $request->get('feeding_quantity');
            $s->application_date = $request->get('application_date');
            $s->delivery_date = $request->get('delivery_date');
            $s->remark = $request->get('remark');
            $s->save();
            
            return redirect()->route('po.index')->with('success', 'Data has been saved.');
        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
       
    }

    public function edit_bottom($id){
        return view('po.editbottom')->with(['bots'=>PObottom::find($id), 'pos'=>PO::all(), 'buyers'=>Buyer::all()]);
    }

    public function updatebottom(Request $request, $id){
        try{
            $s = PObottom::find($id);
            $s->po_id = $request->get('ordernumb_id');
            $s->material_name = $request->get('material_name');
            $s->delivery_size = $request->get('delivery_size');
            $s->settlement_size = $request->get('settlement_size');
            $s->feeding_quantity = $request->get('feeding_quantity');
            $s->application_date = $request->get('application_date');
            $s->delivery_date = $request->get('delivery_date');
            $s->remark = $request->get('remark');
            $s->save();
            
            return redirect()->route('po.bottom')->with('success', 'Data has been updated.');
        }catch(\Exception $ex){
            return back()->with('Error', 'Error. '.$ex);
        }
    }

    public function edit_core($id){
        return view('po.editcore')->with(['cores'=>POcore::find($id), 'pos'=>PO::all(), 'buyers'=>Buyer::all()]);
    }

    public function core_store(Request $request){
        try{

            // $this->validate($request, [
            //     'structure_legend' => 'required|mimes:jpg,jpeg,png,gif'
            // ]);

            // //upload images
            // $file = $request->file('structure_legend');
            // $extension = $file->getClientOriginalExtension(); // getting image extension
            // $filename =time().'.'.$extension;
            // $file->move('uploads/structure_legend/', $filename);

            $s = new POcore();
            $s->po_id = $request->get('ordernumbers_id');
            $s->structure = $request->get('structure');
            // $s->structure_legend = 'uploads/structure_legend/'. $filename;
            $s->structure_legend = $request->get('structure_legend');
            $s->material_name = $request->get('material_name');
            $s->delivery_size = $request->get('delivery_size');
            $s->settlement_size = $request->get('settlement_size');
            $s->feeding_quantity = $request->get('feeding_quantity');
            $s->application_date = $request->get('application_date');
            $s->delivery_date = $request->get('delivery_date');
            $s->remark = $request->get('remark');
            $s->save();
            
            return redirect()->route('po.core')->with('success', 'Data has been saved.');

        }catch(\Exception $ex){
            // return back()->with('error', 'Error. Please check data again and make sure select file type: .jpg, .jpeg, .png, .gif required.');
            return back()->with('error', 'Error. '.$ex);
        }
    }

    public function updatecore($id, Request $request){
        try{

            // $this->validate($request, [
            //     'structure_legend' => 'required|mimes:jpg,jpeg,png,gif'
            // ]);

            // //upload images
            // $file = $request->file('structure_legend');
            // $extension = $file->getClientOriginalExtension(); // getting image extension
            // $filename =time().'.'.$extension;
            // $file->move('uploads/structure_legend/', $filename);

            $s = POcore::find($id);
            $s->po_id = $request->get('ordernumbers_id');
            $s->structure = $request->get('structure');
            // $s->structure_legend = 'uploads/structure_legend/'. $filename;
            $s->structure_legend = $request->get('structure_legend');
            $s->material_name = $request->get('material_name');
            $s->delivery_size = $request->get('delivery_size');
            $s->settlement_size = $request->get('settlement_size');
            $s->feeding_quantity = $request->get('feeding_quantity');
            $s->application_date = $request->get('application_date');
            $s->delivery_date = $request->get('delivery_date');
            $s->remark = $request->get('remark');
            $s->save();
            
            return redirect()->route('po.core')->with('success', 'Data has been updated.');

        }catch(\Exception $ex){
            // return back()->with('error', 'Error. Please check data again and make sure select file type: .jpg, .jpeg, .png, .gif required.');
            return back()->with('error', 'Error. '.$ex);
        }
    }

    public function delete($id){
        //general
        try{
            $po = PO::find($id);
            $po->delete();
            return redirect()->route('po.index')->with('success', 'Data has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('po.index')->with('error', 'Cant delete data ready in use.');
            }
        }
    }

    public function delete_bottom($id){
        try{
            $po = PObottom::find($id);
            $po->delete();
            return redirect()->route('po.bottom')->with('success', 'Data has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('po.bottom')->with('error', 'Cant delete data ready in use.');
            }
        }
    }

    public function delete_core($id){
        try{
            $po = POcore::find($id);
            $po->delete();
            return redirect()->route('po.core')->with('success', 'Data has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('po.core')->with('error', 'Cant delete data ready in use.');
            }
        }
    }

    public function delete_top($id){
        try{
            $po = POtop::find($id);
            $po->delete();
            return redirect()->route('po.top')->with('success', 'Data has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('po.top')->with('error', 'Cant delete data ready in use.');
            }
        }
    }

    public function delete_orderdetail($id){
        //order detail
        try{
            $po = POdetail::find($id);
            $po->delete();
            return redirect()->route('po.index')->with('success', 'Data PO detail has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('po.index')->with('error', 'Cant delete data ready in use.');
            }
        }
    }
    
    public function delete_requirement($id){
        try{
            $po = POrequirement::find($id);
            $po->delete();
            return redirect()->route('po.index')->with('success', 'Data PO requirement has been delete.');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1451')
            {
                return redirect()->route('po.index')->with('error', 'Cant delete data ready in use.');
            }
        }
    }
}
