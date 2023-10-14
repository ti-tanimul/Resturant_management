<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Models\About;
use App\Models\Service;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Delivery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // return view('home');
        $contents = About::all();
        $products = Product::all();
        $servicecontents = Service::all();
        return view('home', compact('contents', 'products', 'servicecontents'));
    }
    public function about(){
        $contents = About::all();
        return view('about', compact('contents'));
    }
    public function service(){
        $servicecontents = Service::all();
        return view('service', compact('servicecontents'));
    }
    public function menu(){
        // $products = Product::all();
        // return view('menu', compact('products'));
        $products = Product::where('status', 1)->get();
        return view('menu', compact('products'));
    }
    
    public function contact(){
        return view('contact');
    }
    public function storeContact(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'message' => 'required',
        ]);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'message' => $request->message,
            
        ]);
        return redirect()->back()->with('success', 'Insert completed successfully!');
    }
    public function manageContact(){
        $contacts = Contact::all();
        return view('admin.manage-contact', compact('contacts'));
    }
    public function deleteContact($id){
        $deleteContact = Contact::find($id);
        $deleteContact->delete();
        return redirect('admin/manage-contact')->with('success', 'Contact Delete Successfully');
    }
    
    public function categoryProduct($id){
        $results = Product::join('services', 'services.id', '=', 'products.category')
        ->select('products.*')
        ->where('products.category', $id)
        ->where('products.status', 1)
        ->get();
        return view('category-product', compact('results'));
    }
    public function manageDelivery(){
        $deliveris = Delivery::all();
        return view('admin.manage-delivery', compact('deliveris'));
    }
    public function editDelivery($id){
        $manageDelivery = Delivery::find($id);
        return view('admin.edit-delivery', compact('manageDelivery'));
    }
    public function updateDelivery(Request $request, $id){
        $delivery = Delivery::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'type' => 'required',
        ]);
        Delivery::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'type' => $request->type,
        ]);
        return redirect('admin/manage-delivery')->with('success', 'Delivery Status Update Successfully');
    }
    public function deleteDelivery($id){
        $deleteDelivery = Delivery::find($id);  
        $deleteDelivery->delete();
        return redirect('admin/manage-delivery')->with('success', 'Delivery Delete Successfully');
    }
}
