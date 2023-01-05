<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect('/dashboard?route=categories')->with('form-success', 'Category Deleted Successfully!');
    }
}