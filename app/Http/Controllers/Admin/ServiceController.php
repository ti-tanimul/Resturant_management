<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function addService(){
        return view('admin.add-service');
    }
    public function storeService(Request $request){
        $request->validate([
            'name' => 'required',
            'details' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,image',
        ]);
        $imageName = '';
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/', $imageName);
        }
        Service::create([
            'name' => $request->name,
            'details' => $request->details,
            'image' => $imageName,
        ]);
        return redirect()->back()->with('success', 'Insert completed successfully!');
    }
    public function manageService(){
        $servicecontents = Service::all();
        return view('admin.manage-service', compact('servicecontents'));
    }
    public function editService($id){
        $servicecontent = Service::find($id);
        return view('admin.edit-service', compact('servicecontent'));
    }

    public function updateService(Request $request, $id){

        $servicecontent = Service::find($id);
        $request->validate([
            'name' => 'required',
            'details' => 'required',
            'image' => 'mimes:png,jpg,jpeg,image',
        ]);
        $imageName = '';
        $deleteOldImage = 'images/'.$servicecontent->image;
        if($image = $request->file('image')){
            if(file_exists($deleteOldImage)){
                unlink($deleteOldImage);
            }
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images', $imageName);
        }else{
            $imageName = $servicecontent->image;
        }
        Service::where('id', $id)->update([
            'name' => $request->name,
            'details' => $request->details,
            'image' => $imageName,
        ]);
        return redirect('admin/manage-service')->with('success', 'Content Update Successfully');
    }
    public function deleteService($id){
        $deleteService = Service::find($id);
        $deleteService->delete();
        return redirect('admin/manage-service')->with('success', 'Content Delete Successfully');
    }
    
}
