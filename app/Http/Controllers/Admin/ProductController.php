<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
{
    $categories = Category::all();
    $products = Product::all();
    return view('admin.product.index', compact('products', 'categories'));
}

public function searchProduct(Request $request)
{
    $searchTerm = $request->input('search');
    $products = Product::where('name', 'LIKE', '%' . $searchTerm . '%')->get();
    return view('admin.product.search', compact('products'));
}

public function filter($id)
{
    $categories = Category::all();
    $products = Product::join('categories as c', 'c.id', '=', 'products.categ_id')
        ->select('products.*', 'c.name as category_name', 'c.id as categ_id')
        ->where('categ_id', $id)
        ->get();

    return view('admin.product.filtered', compact('products', 'categories'));
}
    public function add(Request $request)
    {
        $category=category::all();
        return view('admin.product.add',compact('category'));
    }

    public function insert(Request $request )
    {
        $products=new product();

        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/product/',$filename);
            $products->image=$filename;
        }
        //else{
        //     $products->image='default.jpg';
        // }


        $products->promotion_duration = $request->input('promotion_duration');
        $products->promotion_price = $request->input('promotion_price');
        $products->promotion_created_at = now();



        $products->categ_id=$request->input('categ_id');
        $products->name=$request->input('name');
        $products->slug=$request->input('slug');
        $products->small_descrip=$request->input('small_descrip');
        $products->description=$request->input('description');
        $products->original_price=$request->input('original_price');
        $products->selling_price=$request->input('selling_price');
        $products->tax=$request->input('tax');
        $products->qty=$request->input('qty');
        $products->status=$request->input('status')==true?'1':'0';
        $products->trending=$request->input('trending')==true?'1':'0';
        $products->promo=$request->input('promo')==true?'1':'0';
        $products->meta_title=$request->input('meta-title');
        $products->meta_keywords=$request->input('meta-key');
        $products->meta_descrip=$request->filled('meta-descrip') ? substr($request->input('meta-descrip'), 0, 255) : '';
        $products->save();

        return redirect('/products')->with('status','Produit ajouter avec success');
    }
    public function edit($id){

        $product=product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    public function update(Request $request,$id){
        $product=product::find($id);
        if ($request->hasFile('image')) {

            $path='assets/uploads/product/'.$product->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/product/',$filename);
            $product->image=$filename;
            }
        $product->promotion_duration = $request->input('promotion_duration');
        $product->promotion_price = $request->input('promotion_price');
        $product->promotion_created_at = now();

        $product->name=$request->input('name');
        $product->slug=$request->input('slug');
        $product->small_descrip=$request->input('small_descrip');
        $product->description=$request->input('description');
        $product->original_price=$request->input('original_price');
        $product->selling_price=$request->input('selling_price');
        $product->tax=$request->input('tax');
        $product->qty=$request->input('qty');
        $product->status=$request->input('status')==true?'1':'0';
        $product->trending=$request->input('trending')==true?'1':'0';
        $product->promo=$request->input('promo')==true?'1':'0';
        $product->meta_title=$request->filled('meta-title') ? substr($request->input('meta-title'), 0, 255) : '';
        $product->meta_keywords=$request->filled('meta-key') ? substr($request->input('meta-key'), 0, 255) : '';
        $product->meta_descrip=$request->filled('meta-descrip') ? substr($request->input('meta-descrip'), 0, 255) : '';
        $product->update();

        return redirect('/products')->with('status','Produit modifier avec success');


    }
    public function delete($id)
    {
        $product=product::find($id);
        $path='assets/uploads/product/'.$product->image;
        if (file_exists($path)) {
            unlink($path);
            }
        $product->delete();
        return redirect('products')->with('status','produit est supprimee avec succes');
    }

    public function showClients($id)
{
    $product = Product::findOrFail($id);
    $orders = $product->orders()->with('client')->get();
    //$orders = $orders->orderItems()->with('client')->get();
    //$orders = order::where('product_id', $product->id)->with('clients')->get();
    //$clients = $product->orders()->with('client')->get();
    //dd($orders);
    // foreach ($orders as $order) {
    //     if ($order->client) {
    //         dd($order->client->name);
    //     } else {
    //         dd("Client not found");
    //     }}
    // foreach ($product as $prod) {
    //     if ($prod->orders->qty) {
    //         dd($prod->qty);
    //     } else {
    //         dd("quantite not found");
    //     }}

    return view('admin.product.show', compact('product', 'orders'));
}
    public function qtylimite()
    {
        $products=product::where('qty','<=',5)->get();
        return view('admin.product.repture',compact('products'));
    }


}
