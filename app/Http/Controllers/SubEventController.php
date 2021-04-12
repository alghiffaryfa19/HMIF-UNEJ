<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\SubEvent;
use App\Models\Proker;
use App\Models\Tag;
use Storage;

class SubEventController extends Controller
{
    public function index()
    {
        $proker = Proker::select('id','name')->get();
        if(request()->ajax())
        {
           
            return datatables()->of(SubEvent::with('proker')->select('sub_events.*'))
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("sub_event.edit", $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Edit</a><a href="'.route("hapus.sub_event", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-500 text-white p-2 rounded mr-2 font-bold">Hapus</a>';
                return $mystring;
            })
            ->rawColumns(['edit'])
            ->make(true);
        }
        return view('admin.sertifikat.sub_event.index', compact('proker'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'proker_id' => 'required',
        ]);

        SubEvent::create([
                'name' => $request->name,
                'proker_id' => $request->proker_id,
        ]);

        return redirect()->route('sub_event.index');
    }

    public function edit($id)
    {
        $proker = Proker::select('id','name')->get();
        $sub_event = SubEvent::find($id);
        return view('admin.sertifikat.sub_event.edit', compact('proker','sub_event'));        
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'proker_id' => 'required',
        ]);

        $sub_event = SubEvent::find($id);
        
        $sub_event->update([
            'name' => $request->name,
            'proker_id' => $request->proker_id,
        ]);

        return redirect()->route('sub_event.index');
      }
 
    public function destroy($id)
    {
        $sub_event = SubEvent::find($id);
        if (!$sub_event) {
            return redirect()->back();
        }
        
        $sub_event->delete();
        return redirect()->route('sub_event.index');
    }
}
