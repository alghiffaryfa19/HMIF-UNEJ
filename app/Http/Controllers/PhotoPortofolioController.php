<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Divisi;
use App\Models\GalleryPortofolio;
use App\Models\Portofolio;
use Storage;

class PhotoPortofolioController extends Controller
{
    public function index($id)
    {
        $portofolio = Portofolio::find($id);
        if(request()->ajax())
        {
            return datatables()->of(GalleryPortofolio::with('portofolio:id,name')->where('portofolio_id',$id)->select('gallery_portofolios.*'))
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("foto.portofolio.edit", [$data->portofolio->id,$data->id]).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Edit</a><a href="'.route("foto.portofolio.delete", [$data->portofolio->id,$data->id]).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-500 text-white p-2 rounded mr-2 font-bold">Hapus</a>';
                return $mystring;
            })
            ->rawColumns(['edit'])
            ->make(true);
        }
        return view('admin.portofolio.foto.index', compact('portofolio'));
    }

    public function store(Request $request, $id)
    {
       
        $this->validate($request, [
            'caption' => 'required',
            'photo' => 'required',
        ]);

        $portofolio = Portofolio::find($id)->foto()->create([
            'caption' => $request->caption,
            'photo' => $request->file('photo')->store('photo_portofolio'),
        ]);

        return redirect()->route('foto.portofolio.index', $id);
    }

    public function edit($id,$foto)
    {
        $portofolio = Portofolio::find($id);
        $photo = GalleryPortofolio::find($foto);
        return view('admin.portofolio.foto.edit', compact('portofolio','photo'));
    }

    public function update(Request $request, $id, $foto)
    {
        $this->validate($request, [
            'caption' => 'required',
        ]);

        $photo = GalleryPortofolio::find($foto);

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

        return redirect()->route('foto.portofolio.index', $id);
    }

    public function destroy($id,$foto)
    {
        $photo = GalleryPortofolio::find($foto);

        if (!$photo) {
            return redirect()->back();
        }
        Storage::delete($photo->photo);
        $photo->delete();
        return redirect()->route('foto.portofolio.index',$id);
    }

}
