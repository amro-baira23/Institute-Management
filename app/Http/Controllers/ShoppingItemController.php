<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingItemRequest;
use App\Models\ShoppingItem;
use App\Models\Course;
use Illuminate\Http\Request;

class ShoppingItemController extends Controller
{
    //Add Shopping Item Function
    public function addShoppingItem(ShoppingItemRequest $request)
    {
        ShoppingItem::create([
            'item_id' => $request->item_id,
            'amount' => $request->amount,
            'per_student' => $request->per_student,
        ]);

        return success(null, 'this shopping item added successfully', 201);
    }

    //Edit Shopping Item Function
    public function editShoppingItem(ShoppingItem $shoppingItem, ShoppingItemRequest $request)
    {
        $shoppingItem->update([
            'item_id' => $request->item_id,
            'amount' => $request->amount,
            'bought' => $request->bought,
            'per_student' => $request->per_student,
            'is_bought' => $request->is_bought,
        ]);
        if ($request->is_bought) {
            if (!$shoppingItem->is_bought) {
                if (!$shoppingItem->per_student)
                    $shoppingItem->item->update([
                        'amount' => $shoppingItem->item->amount + $request->amount
                    ]);
                else
                    $shoppingItem->item->update([
                        'amount' => $shoppingItem->item->amount + $shoppingItem->bought,
                    ]);
            }
        }


        return success(null, 'this shopping item updated successfully');
    }

    //Delete Shopping Item Function
    public function deleteShoppingItem(ShoppingItem $shoppingItem)
    {
        $shoppingItem->delete();

        return success(null, 'this shopping item deleted successfully');
    }

    //Get Shopping Items Function
    public function getShoppingItems()
    {
        $items = ShoppingItem::with('item', 'course')->get();

        return success($items, null);
    }

    //Get Shopping Item Information Function
    public function getShoppingItemInformation(ShoppingItem $shoppingItem)
    {
        return success($shoppingItem->with('item', 'course')->find($shoppingItem->id), null);
    }

    //Get Course Shopping Items Function
    public function getCourseShoppingItems(Course $course)
    {
        return success($course->with(['shoppingItems.item'])->find($course->id), null);
    }
}
