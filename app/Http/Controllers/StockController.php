<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockDetailRequest;
use App\Http\Requests\StockRequest;
use App\Http\Resources\SimpleListResource;
use App\Http\Resources\StockCollection;
use App\Models\Stock;
use App\Models\StockDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StockController extends Controller
{
    //Add Item To Stock Function
    public function addItemToStock(StockRequest $request)
    {
        $items = Stock::get();
     

        Stock::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'source' => $request->source,
        ]);

        return success(null, 'this item added to stock successfully', 201);
    }

    //Edit Item Stock Function
    public function editStockItem(Stock $item, StockRequest $request)
    {
        $item->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'source' => $request->source,
        ]);

        return success(null, 'this item updated successfully');
    }

    //Import Item To Stock
    public function importItem(Stock $item, StockRequest $request)
    {
        $item->update([
            'amount' => $item->amount + $request->amount
        ]);

    
        return success(null, 'imported successfully');
    }

   

    //Get Stock Items Function
    public function getStockItems()
    {
        $stocks = Stock::query()->when(request("name"),function($query,$name){
            return $query->where("name","LIKE","%".$name."%");
        })->paginate(20);

        return new StockCollection($stocks);
    }

    //Get Stock Item Information Function
    public function getStockItemInformation(Stock $item)
    {
        return success($item, null);
    }

    //Delete Stock Item Function
    public function deleteStockItem(Stock $item)
    {
        $item->delete();

        return success(null, 'this item deleted successfully');
    }

    //Get Stock Details Function
    public function getStockDetails()
    {
        $details = StockDetail::with('item')->get();

        return success($details, null);
    }

    //Get Stock Detail Information Function
    public function getStockDetailInformation(StockDetail $detail)
    {
        return success($detail->with('item')->find($detail->id), null);
    }
}