<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Http\Resources\SimpleListResource;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //Add Room Function
    public function addRoom(RoomRequest $request)
    {
        Room::create([
            'name' => $request->name
        ]);

        return success(null, 'this room added successfully', 201);
    }

    //Edit Room Function
    public function editRoom(Room $room, RoomRequest $request)
    {
        $room->update([
            'name' => $request->name
        ]);

        return success(null, 'this room updated successfully');
    }

    //Get Rooms Function
    public function getRooms()
    {
        $rooms = Room::query()->when(request("name"),function($query,$name){
            return $query->where("name",$name);
        })->get();

        return success(SimpleListResource::collection($rooms), null);
    }

    //Get Room Information Function
    public function getRoomInformation(Room $room)
    {
        return success($room, null);
    }

    //Delete Room Function
    public function deleteRoom(Room $room)
    {
        $room->delete();

        return success(null, 'this room deleted successfully');
    }
}
