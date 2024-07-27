<?php

namespace App\Http\Controllers;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;   
use App\Models\Order;    
use Illuminate\Http\Request;
use App\Models\Category;

use Notification;


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

    // SEND MAIL TO ORDERS

    public function getSendMail(Request $request) { //ORDER ID
        $userType = Auth::user()->usertype;
        if ($userType === 1) { // ADMIN
            $data = [
                "email"=>$request->email,
                "order_id"=>$request->id,
            ];
            return view('admin.send-mail',compact('data'));
        } 
        // NOT ADMIN
        return redirect()->route('home');
    }

    public function sendMail(Request $request) {
        $userType = Auth::user()->usertype;
        if ($userType === 1) { // ADMIN
            $details = [
                "greetings"=>$request->greetings,
                "firstline"=>$request->firstline,
                "body"=>$request->body,
                "button_name"=> $request->button_name,
                "email_url" => $request->email_url,
                "lastline" => $request->lastline,
            ];
            // SEND MAIL
            $order = Order::find($request->order_id);
            Notification::send($order,new SendEmailNotification($details));
            return redirect('storeOrders')->with("message","email sent succesfully! ");
        } 
        // NOT ADMIN
        return redirect()->route('home');
    }
    
}
