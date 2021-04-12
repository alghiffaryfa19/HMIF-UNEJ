<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Divisi;
use App\Models\GalleryProduct;
use App\Models\Product;
use Storage;

class PhotoProdukController extends Controller
{
    public function index($id)
    {
        $produk = Product::find($id);
        if(request()->ajax())
        {
            return datatables()->of(GalleryProduct::with('produk:id,name')->where('product_id',$id)->select('gallery_products.*'))
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("foto.edit", [$data->produk->id,$data->id]).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Edit</a><a href="'.route("foto.delete", [$data->produk->id,$data->id]).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-500 text-white p-2 rounded mr-2 font-bold">Hapus</a>';
                return $mystring;
            })
            ->rawColumns(['edit'])
            ->make(true);
        }
        return view('admin.produk.foto.index', compact('produk'));
    }

    public function store(Request $request, $id)
    {
       
        $this->validate($request, [
            'caption' => 'required',
            'photo' => 'required',
        ]);

        $product = Product::find($id)->foto()->create([
            'caption' => $request->caption,
            'photo' => $request->file('photo')->store('photo_product'),
        ]);

        return redirect()->route('foto.index', $id);
    }

    public function edit($id,$foto)
    {
        $produk = Product::find($id);
        $photo = GalleryProduct::find($foto);
        return view('admin.produk.foto.edit', compact('produk','photo'));
    }

    public function update(Request $request, $id, $foto)
    {
        $this->validate($request, [
            'caption' => 'required',
        ]);

        $photo = GalleryProduct::find($foto);

        if (empty($request->file('photo'))) {
            $photo->update([
                'caption' => $request->caption,
            ]);
        } else {
            Storage::delete($photo->photo);
            $photo->update([
                'caption' => $request->caption,
                'photo' => $request->file('photo')->store('photo_product'), 
            ]);
        }

        return redirect()->route('foto.index', $id);
    }

    public function destroy($id,$foto)
    {
        $photo = GalleryProduct::find($foto);

        if (!$photo) {
            return redirect()->back();
        }
        Storage::delete($photo->photo);
        $photo->delete();
        return redirect()->route('foto.index',$id);
    }

}
