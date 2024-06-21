<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\SimpleListResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Add Category Function
    public function addCategory(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->category,
        ]);

        return success(null, 'this category added successfully', 201);
    }

    //Edit Category Function
    public function editCategory(Category $category, CategoryRequest $request)
    {
        $category->update([
            'name' => $request->category,
        ]);

        return success(null, 'this category updated successfully');
    }

    //Get Categories Function
    public function getCategories()
    {
        $categories = Category::query()->when(request("name"),function($query,$name){
            return $query->where("name","LIKE","%".$name."%");
        })->paginate(20);

        return success(SimpleListResource::collection($categories), null);
    }

    //Get Category Information Function
    public function getCategoryInformation(Category $category)
    {
        return success($category->with('subjects')->find($category->id), null);
    }

    //Delete Category Function
    public function deleteCategory(Category $category)
    {
        $category->delete();

        return success(null, 'this category deleted successfully');
    }
}