<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(){
        $activities = Activity::when(request("operation"),function ($query,$value){
            return $query->where("operation",$value);
        })
        ->when(request("name"),function ($query,$value){
            return $query->whereHas("user",function($query) use ($value){
                return $query->where("username",$value);
            });
        })
        ->when(request("model"),function ($query,$value){
            return $query->where("model",$value);
        })->orderby("id","desc")->paginate(20);
        return ActivityResource::collection($activities);
    }
}
