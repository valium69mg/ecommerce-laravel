<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;    
use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    //
    public function viewCategory() {
        $userType = Auth::user()->usertype;
        if ($userType === 1) { // ADMIN
            $data = Category::all();
            return view('admin.category-view',compact('data'));
        } 
        // NOT ADMIN
        return redirect()->route('home');
    }

    public function addCategory(Request $request) {
        $userType = Auth::user()->usertype;
        if ($userType === 1) { // ADMIN
            $data = new Category();
            $data->category_name = $request->category_name;
            $data->save();
            return redirect()->back()->with('message','Category added succesfully');
        } 
        // NOT ADMIN
        return redirect()->route('home');
    }

    public function deleteCategory($id) {
        $userType = Auth::user()->usertype;
        if ($userType === 1) { // ADMIN
            $data = Category::find($id);
            $data->delete();
            return redirect()->back()->with('message','Category deleted succesfully');
        } 
        // NOT ADMIN
        return redirect()->route('home');
    }

    public function viewAddProducts(){
        $userType = Auth::user()->usertype;
        if ($userType === 1) { // ADMIN
            $data = Category::all();
            return view('admin.add-product',compact('data'));
        } 
        // NOT ADMIN
        return redirect()->route('home');
    } 
    
}
