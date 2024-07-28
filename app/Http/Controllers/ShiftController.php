<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShiftRequest;
use App\Http\Resources\ShiftResource;
use App\Http\Resources\SimpleListResource;
use App\Models\DayOfWeek;
use App\Models\Schedule;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ShiftController extends Controller
{
    public function listShifts(Request $request)
    {
        $shifts = Shift::query()->when(request("name"),function($query,$name){
            return $query->where("name","LIKE", '%'.$name.'%');
        })->paginate(20);
        return ShiftResource::collection($shifts);
    }

    public function getShift(Shift $shift){
        return success(new ShiftResource($shift),"",200);
    }

    public function storeShift(ShiftRequest $request)
    {
        $schedule = Schedule::create([
            'start' => $request->start,
            'end' => $request->end,
        ]);

        $days = explode(',', $request->days);


        foreach ($days as $day)
            DayOfWeek::create([
                'schedule_id' => $schedule->id,
                'day' => $day,
            ]);

        Shift::create([
            "name" => $request->name,
            "schedule_id" => $schedule->id
        ]);
        return success(null, "new shift been created successfuly",201);
    }

    public function editShift(Shift $shift, ShiftRequest $request)
    {
        $schedule = $shift->schedule;
        $schedule->update([
            'start' => $request->start,
            'end' => $request->end,
        ]);
        $days = explode(',', $request->days);

        foreach ($shift->schedule->days as $day)
            $day->delete();

        foreach ($days as $day)
            DayOfWeek::create([
                'schedule_id' => $shift->schedule->id,
                'day' => $day,
            ]);
        $shift->update([
            "name" => $request->name,
            "schedule_id" => $schedule->id
        ]);
        return success(null, "shift been updated successfuly",200);
    }
    
    public function destroyShift(Shift $shift)
    {
        Validator::make(["shift" => $shift->id],[
            "shift" => [Rule::unique("employees","shift_id")]
        ],[
            "unique" => "هذه المناوبة قد تم تعيينها لعدد من الموظفين بالفعل"
        ])->validate();
        $shift->delete();
        return success(null, "", 204);
    }
}
