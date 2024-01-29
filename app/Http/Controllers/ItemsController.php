<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Itemgroups;
use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function Get(){
      $data=Itemgroups::All();
      return view("welcome",["data"=>$data] );
    }
   
    public function cheackout(){
      $data=Itemgroups::All();
      return view("welcome",["data"=>$data] );
    }

    

    public function AddtoCart($id){

      DB::table('icart')->insert(['item'=>$id]);
      $idG=Session::get('id');
      $count=DB::table('icart')->get()->count();
      Session::put('countItem',$count);
      return redirect('items/'. $idG);
      
    }


   public function GetItems($id){
      $data=Items::where('itemgroupno',$id)->get();
      Session::put('id',$id);
      $group=Itemgroups::find($id);
      return view("Items",["data"=>$data ],["group"=>$group]);
    }    

    public function edit($id){
      $group=Itemgroups::find($id);
      $itemgroup=Itemgroups::All();
      return view('edit',['group'=>$group],['itemgroup'=>$itemgroup]);
    }


    public function del($id){

      $item=Itemgroups::find($id);
      $item->delete();
      return redirect('itemgroup');
    }


    public function Gupdate(request $request){

      $group=Itemgroups::find($request->id);
      $group->itemgroupName=$request->itemgroupName;
      $group->save();//update($request->all());
      return redirect('itemgroup');
    }


    public function SaveItems(request $request){

      $data=Items::create([
        "itemName"=>$request->itemName,
        "color"=>$request->color,
        "qty"=>$request->qty,
        "itemgroupno"=>$request->itemgroupno,
        "price"=>$request->price,
        'itemImg'=>$request->itemImg
      ]);
      $data->save();
      return redirect('items');
    }


 


    public function editItem($id){

      $item=Items::find($id);
      $itemgroup=Itemgroups::all();
      return view('edit',['item'=>$item],['itemgroup'=>$itemgroup]);
    }

    public function delItem($id){

      $item=Items::find($id);
      $item->delete();
      return redirect('additem');;
    }


    public function updateItem(Request $request){

      $item=Items::find($request->id);
      $item-> itemName=$request->itemName;
      $item-> color=$request->color;
      $item-> qty=$request->qty;
      $item-> itemgroupno=$request->itemgroupno;
      $item-> price=$request->price;
    
      $item->save();
      return redirect()->route('Items');
    }


}
