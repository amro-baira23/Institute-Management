<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockDetailRequest;
use App\Http\Requests\StockRequest;
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
        if ($request->amount == 0) {
            return error('Item amount should be greater than 0', 'Item amount should be greater than 0', 502);
        }

        foreach ($items as $item) {
            if ($item->name === $request->name) {
                $item->update([
                    'amount' => $item->amount + $request->amount
                ]);
                return success(null, 'this item added to stock successfully');
            }
        }

        Stock::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'source' => $request->source,
            'note' => $request->note,
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
            'note' => $request->note,
        ]);

        return success(null, 'this item updated successfully');
    }

    //Import Item To Stock
    public function importItem(Stock $item, StockDetailRequest $request)
    {
        if ($request->amount == 0) {
            return error('Item amount should be greater than 0', 'Item amount should be greater than 0', 502);
        }

        $item->update([
            'amount' => $item->amount + $request->amount
        ]);

        StockDetail::create([
            'item_id' => $item->id,
            'amount' => $request->amount,
            'type' => 'import',
            'date' => $request->date,
        ]);

        return success(null, 'imported successfully');
    }

    //Export Item From Stock
    public function exportItem(Stock $item, StockDetailRequest $request)
    {
        $request->validate([
            'amount' => 'required'
        ]);

        if ($request->amount == 0) {
            return error('Item amount should be greater than 0', 'Item amount should be greater than 0', 502);
        }

        $item->update([
            'amount' => $item->amount - $request->amount
        ]);

        StockDetail::create([
            'item_id' => $item->id,
            'amount' => $request->amount,
            'type' => 'export',
            'date' => $request->date,
        ]);


        return success(null, 'exported successfully');
    }

    //Get Stock Items Function
    public function getStockItems()
    {
        $items = Stock::get();

        return success($items, null);
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