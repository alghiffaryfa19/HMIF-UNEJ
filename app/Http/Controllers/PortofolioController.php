<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Portofolio;
use Storage;

class PortofolioController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Portofolio::query())
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("foto.portofolio.index", $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Foto</a><a href="'.route("portofolio.edit", $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Edit</a><a href="'.route("hapus.portofolio", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-500 text-white p-2 rounded mr-2 font-bold">Hapus</a>';
                return $mystring;
            })
            ->rawColumns(['edit'])
            ->make(true);
        }
        return view('admin.portofolio.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        Portofolio::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('portofolio.index');
    }

    public function edit($id)
    {
        $portofolio = Portofolio::find($id);
        return view('admin.portofolio.edit', compact('portofolio'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $portofolio = Portofolio::find($id);

        $portofolio->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('portofolio.index');
    }

    public function destroy($id)
    {
        $portofolio = Portofolio::find($id);
        if (!$portofolio) {
            return redirect()->back();
        }
        
        $portofolio->delete();
        return redirect()->route('portofolio.index');
    }

}
