<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ProductsExport;
use App\Imports\ProductsImpor;
use Maatwebsite\Excel\Facades\Excel;

class productController extends Controller
{
    public function index()
    {
        $data = Product::paginate(5);
        return view('product',compact('data'));     
    }



    public function showProduct($slug)
    {
        $data = \DB::table('products')
                    ->where('product_slug',$slug)
                    ->first();
        return view('showproduct', compact('data'));
    }

	public function edit(Product $product)
	{
		$data = $product;
        return view('editproduct', compact('data'));
    }
    
	public function update(Request $request)
	{

        $validator = Validator::make($request->all(), [ // <---
            'product_title' => 'required|unique:products',
        ]);

        if ($validator->fails()){
            return redirect('/product')
                ->with('fail', 'Data Gagal Diubah');
        } else {
            $product = $request->all();
            unset($product['_token']);
            unset($product['_method']);
            Product::where('id',$request->id)->update($product);

            return redirect('/product')
                ->with('success', 'Data berhasil Diedit');

        }
    }
    
    public function tambah()
    {
        return view('tambahproduct');     


    }
    public function simpan(Request $request)
    {
        // $messages = [
        //  'product_title.required'=>'Title dibutuhkan',
        //  'product_price.required'=>'Harga dibutuhkan',
        //  'product_image.required'=>'Gambar dibutuhkan',];
        
        
        $validator = Validator::make($request->all(), [ // <---
            'product_title' => 'required|unique:products',
        ]);

        if ($validator->fails()){
            return redirect('/product/tambah')
                ->with('fail', 'Data Gagal Disimpan');
        } else {
            $product = new Product;
            $product->product_title = $request->product_title;
            $product->product_price = $request->product_price;
            $product->product_slug = \Str::slug($request->product_title);
            $product->product_image = $request->product_image;
            $product->save();

            return redirect('/product')
                ->with('success', 'Data berhasil Disimpan');

        }
    }
    public function delete(Product $product)
    {
        $product->delete();
        return redirect('/product');
    }

    public function exportXL()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function upload()
    {
        return view('upload');
    }
    
    public function uploadData(Request $request)
    {
        Excel::import(new ProductsImport, $request->file('file')->store('temp'));

        Route::redirect('/product');
    }
    
}