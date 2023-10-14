<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public $contents;
    public function index(){
        return view('admin.dashboard');
        
    }
    public function addAbout(){
        return view('admin.add-about');
    }
    public function storeAbout(Request $request){
      
        $request->validate([
            'heading' => 'required',
            'title1' => 'required',
            'description1' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,image',
            'title2' => 'required',
            'description2' => 'required',
        ]);
        $imageName = '';
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/', $imageName);
        }
        About::create([
            'heading' => $request->heading,
            'title1' => $request->title1,
            'description1' => $request->description1,
            'image' => $imageName,
            'title2' => $request->title2,
            'description2' => $request->description2,
        ]);
        return redirect()->back()->with('success', 'Insert successfully!');
    }
    public function manageAbout(){
        $contents = About::all();
        return view('admin.manage-about', compact('contents'));
    }
    public function editAbout($id){
        $content = About::find($id);
        return view('admin.edit-about', compact('content'));  
    }
    public function updateAbout(Request $request, $id){

        $content = About::find($id);
        $request->validate([
            'heading' => 'required',
            'title1' => 'required',
            'description1' => 'required',
            'image' => 'mimes:png,jpg,jpeg,image',
            'title2' => 'required',
            'description2' => 'required',
        ]);
        $imageName = '';
        $deleteOldImage = 'images/'.$content->image;
        if($image = $request->file('image')){
            if(file_exists($deleteOldImage)){
                unlink($deleteOldImage);
            }
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images', $imageName);
        }else{
            $imageName = $content->image;
        }
        About::where('id', $id)->update([
            'heading' => $request->heading,
            'title1' => $request->title1,
            'description1' => $request->description1,
            'title2' => $request->title2,
            'description2' => $request->description2,
            'image' => $imageName
        ]);
        return redirect('admin/manage-about')->with('success', 'Content Update Successfully');
    }
    public function deleteAbout($id){
        $deleteImage = About::find($id);
        $deleteImage->delete();
        return redirect('admin/manage-about')->with('success', 'Content Delete Successfully');
    }

    public function adminLogout(){
        auth::logout();
        return redirect('/admin-login');
    }
}
