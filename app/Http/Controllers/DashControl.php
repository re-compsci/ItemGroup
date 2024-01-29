<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Itemgroups;
use App\Models\Items;
use Illuminate\Http\Request;
use Auth;

class DashControl extends Controller
{
  /*
    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    
    public function SaveItemsH(request $request){

 
      
        $data=Items::create([
          "itemName"=>$request->itemName,
          "color"=>$request->color,
          "qty"=>$request->qty,
          "itemgroupno"=>$request->itemgroupno,
          "price"=>$request->price,
          'itemImg'=>$request->itemImg,
        ]);
        $data->save();
        return redirect('additem');
      }

    public function Disply(request $request){

        $data=DB::table('itemgroups')->join('items','itemgroups.id','=','items.itemgroupno')->get();
        return view('dashboard.controlpanel', ['data'=>$data]);
      }
  
      public function GetItemsH(){
  
        $data=Items::All();
        $data2=Itemgroups::All();
        return view("dashboard.additem",["data"=>$data],["data2"=>$data2]);
      }
  
      public function GetItemGroupH(){
  
        $data=Itemgroups::All();
        $issave=true;
        return view("dashboard.addgroup",["data"=>$data],['issave'=>$issave] );
      }
   
      public function SaveGroupItemsH(request $request){
    
            
            $data=Itemgroups::create([
          'itemgroupName'=>$request->itemgroupName,
          'groupImg'=>$request->groupImg
        ]);
        $data->save();
        return redirect('additemgroup');
      }

      public function logout(){
        Auth::logout();
      }
    
}
