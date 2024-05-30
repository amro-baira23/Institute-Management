<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Add Category Function
    public function addCategory(CategoryRequest $request)
    {
        Category::create([
            'category' => $request->category,
        ]);

        return success(null, 'this category added successfully', 201);
    }

    //Edit Category Function
    public function editCategory(Category $category, CategoryRequest $request)
    {
        $category->update([
            'category' => $request->category,
        ]);

        return success(null, 'this category updated successfully');
    }

    //Get Categories Function
    public function getCategories()
    {
        $categories = Category::get();

        return success($categories, null);
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