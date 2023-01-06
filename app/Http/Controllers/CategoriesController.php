<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Validator;

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

        $formFields = Validator::make($req->all(), [
            'category' => 'required',
        ], $custom_error_messages);


        if ($formFields->fails()) {
            return redirect()->back()->with('form-failure', 'Category Cannot Be Empty!')->withErrors($formFields);
        }

        $category->update($formFields);
        return redirect('/dashboard?route=categories')->with('form-success', 'Category Updated!');
    }

    public function store(Request $req)
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

        $store = Category::create($formFields);

        return redirect('/dashboard?route=categories')->with('form-success', 'Category Created!');
    }
}