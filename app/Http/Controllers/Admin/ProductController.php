<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(){
        $joinProduct = Service::all();
        return view('admin.add-product', compact('joinProduct'));
    }

    public function storeProduct(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'details' => 'required',
            'price' => 'required',
            'category' => 'required',
            'stock' => 'required',
            'status' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,image',
        ]);
        $imageName = '';
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/', $imageName);
        }
        Product::create([
            
            'name' => $request->name,
            'details' => $request->details,
            'price' => $request->price,
            'category' =>$request->category,
            'stock' =>$request->stock,
            'status' =>$request->status,
            'image' => $imageName,
        ]);
        return redirect()->back()->with('success', 'Insert completed successfully!');
    }

    public function manageProduct(){
        $productcontents = Product::join('services', 'services.id','=',  'products.category')
        ->select('products.*', 'services.name as services_name' )->get();
        return view('admin.manage-product', compact('productcontents'));
    }

    public function editProduct($id){
        $services = Service::all();
        $products = Product::find($id);
        return view('admin.edit-product', compact('services', 'products'));
    }

    public function updateProduct(Request $request, $id){

        $products = Product::find($id);
        $request->validate([
            'name' => 'required',
            'details' => 'required',
            'price' => 'required',
            'category' => 'required',
            'stock' => 'required',
            'image' => 'mimes:png,jpg,jpeg,image',
        ]);
        $imageName = '';
        $deleteOldImage = 'images/'.$products->image;
        if($image = $request->file('image')){
            if(file_exists($deleteOldImage)){
                unlink($deleteOldImage);
            }
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images', $imageName);
        }else{
            $imageName = $products->image;
        }
        Product::where('id', $id)->update([
            'name' => $request->name,
            'details' => $request->details,
            'price' => $request->price,
            'category' => $request->category,
            'stock' => $request->stock,
            'image' => $imageName,
        ]);
        return redirect('admin/manage-product')->with('success', 'Product Update Successfully');
    }

    public function deleteProduct($id){
        $deleteProduct = Product::find($id);
        $deleteProduct->delete();
        return redirect('admin/manage-product')->with('success', 'Product Delete Successfully');
    }
    

    
}
