<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use Storage;

class ProdukController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Product::query())
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("foto.index", $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Foto</a><a href="'.route("produk.edit", $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Edit</a><a href="'.route("hapus.produk", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-500 text-white p-2 rounded mr-2 font-bold">Hapus</a>';
                return $mystring;
            })
            ->rawColumns(['edit'])
            ->make(true);
        }
        return view('admin.produk.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('produk.index');
    }

    public function edit($id)
    {
        $produk = Product::find($id);
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $produk = Product::find($id);

        $produk->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('produk.index');
    }

    public function destroy($id)
    {
        $produk = Product::find($id);
        if (!$produk) {
            return redirect()->back();
        }
        
        $produk->delete();
        return redirect()->route('produk.index');
    }

}
