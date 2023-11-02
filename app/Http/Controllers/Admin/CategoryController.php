<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;
use SebastianBergmann\Type\TrueType;

class CategoryController extends Controller
{
    public function index()
    {
        $category= category::all();
        return view('admin.category.index',compact('category'));
    }
    public function add()
    {
        return view('admin.category.add');
    }
    public function insert(Request $request)
    {
        $category=new category();

        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image=$filename;
        }else{
            $category->image='default.jpg';
        }

        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status')==true?'1':'0';
        $category->popular=$request->input('popular')==true?'1':'0';
        $category->meta_title=$request->input('meta-title');
        $category->meta_keywords=$request->input('meta-key');
        $category->meta_descrip=$request->filled('meta-descrip') ? substr($request->input('meta_descrip'), 0, 255) : '';
        $category->save();

        return redirect('/categories')->with('status','Categorie ajouter avec success');
    }
    public function edit($id){

        $category=category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $category=category::find($id);
        if ($request->hasFile('image')) {

            $path='assets/uploads/category/'.$category->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image=$filename;
            }
        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status')==true?'1':'0';
        $category->popular=$request->input('popular')==true?'1':'0';
        $category->meta_title=$request->input('meta-title');
        $category->meta_keywords=$request->input('meta-key');
        $category->meta_descrip=$request->filled('meta-descrip') ? substr($request->input('meta_descrip'), 0, 255) : '';
        $category->update();

        return redirect('/dashboard')->with('status','Categorie modifier avec success');


    }
    public function delete($id)
    {
        $category=category::find($id);
        $path='assets/uploads/category/'.$category->image;
        if (file_exists($path)) {
            unlink($path);
            }
        $category->delete();
        return redirect('categories')->with('status','categorie est supprimee avec succes');
    }
    public function afficher($id)
    {
        $category= category::find($id);
        $products=Product::where('categ_id',$id)->get();
        //$products=$category->products()->get();

        return view('admin.category.afficher',compact('products'));
    }
    
}
