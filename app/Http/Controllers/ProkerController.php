<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Divisi;
use App\Models\Proker;
use Storage;

class ProkerController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Proker::with('divisi')->select('prokers.*'))
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("proker.edit", $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Edit</a><a href="'.route("hapus.proker", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-500 text-white p-2 rounded mr-2 font-bold">Hapus</a>';
                return $mystring;
            })
            ->rawColumns(['edit'])
            ->make(true);
        }
        return view('admin.proker.index');
    }

    public function create()
    {
        $divisi = Divisi::select('id','name')->get();
        return view('admin.proker.create', compact('divisi'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'start' => 'required',
            'end' => 'required',
            'divisi_id' => 'required',
        ]);

        Proker::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'divisi_id' => $request->divisi_id,
            'thumbnail' => $request->file('thumbnail')->store('proker'), 
            'start' => $request->start,
            'end' => $request->end,
        ]);

        return redirect()->route('proker.index');
    }

}
