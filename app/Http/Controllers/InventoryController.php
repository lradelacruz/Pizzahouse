<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;
use App\Models\Log;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $inventories = Inventory::join('pizzas',
        'pizzas.id',
        '=',
        'inventories.pizza_id')
        ->get(['pizzas.type','inventories.current_stock','inventories.critical_no', 'inventories.id']);
        //dd($inventories);
        return view('inventory', compact('inventories'));
    }
    
    //edit
    public function updateInventory($id){
        $inventory = Inventory::find($id);
        $pizzaType = $inventory->pizza->type;
        return view('updateInventory', compact('inventory', 'pizzaType'));
    }

    public function updateInventorySave($id){
        $inventory = Inventory::find($id);
        $inventory->pizza->type = request('type');
        $inventory->current_stock = request('current_stock');
        $inventory->save();
    
        $log = new Log();
        $log->username = Auth::user()->name;
        $log->ip = \Request::ip();
        $log->activity = "Updated the inventory " . $inventory->type;
        $log->save();
    
        return redirect()->route('inventory');
    }
}
