<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobTitleRequest;
use App\Http\Resources\JobTitleResource;
use App\Http\Resources\SimpleListResource;
use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobTitle = JobTitle::query()->when(request("name"),function($query,$name){
            return $query->where("name","like","%".$name."%");
        })->paginate(20);

        return SimpleListResource::collection($jobTitle);
    }

    public function getNames() {
        return JobTitle::all()->pluck("name");
    }


    public function store(JobTitleRequest $request)
    {
        JobTitle::create([
            "name" => $request->name,
            "base_salary" => $request->base_salary,
        ]);

        return success(null, "new job title been created successfuly", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function show(JobTitle $jobTitle)
    {
        return new JobTitleResource($jobTitle);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobTitle $jobTitle)
    {
        $jobTitle->update([
            "name" => $request->name,
            "base_salary" => $request->base_salary
        ]);

        return success(null, "job title been edited successfuly",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobTitle $jobTitle)
    {
        $jobTitle->delete();
    }
}
