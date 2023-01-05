<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    public function delete(Category $category)
    {
        $category->delete();
        return redirect('/dashboard?route=categories')->with('form-success', 'Category Deleted!');
    }

    public function update(Category $category, Request $req)
    {

        /**
         * Custom Error Messages
         */
        $custom_error_messages = [
            'category.required' => 'Category is required',
        ];

        $formFields =  $req->validate([
            'category' => 'required',
        ], $custom_error_messages);

        $category->update($formFields);
        return redirect('/dashboard?route=categories')->with('form-success', 'Category Updated!');
    }
}