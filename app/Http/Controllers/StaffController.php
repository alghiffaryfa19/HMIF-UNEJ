<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Staff;
use App\Models\Divisi;
use Storage;

class StaffController extends Controller
{
    public function index()
    {
        $divisi = Divisi::select('id','name')->get();
        if(request()->ajax())
        {
            return datatables()->of(Staff::with('divisi')->select('staff.*'))
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("staff.edit", $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Edit</a><a href="'.route("hapus.staff", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-500 text-white p-2 rounded mr-2 font-bold">Hapus</a>';
                return $mystring;
            })
            ->rawColumns(['edit'])
            ->make(true);
        }
        return view('admin.staff.index', compact('divisi'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'occupation' => 'required',
            'divisi_id' => 'required',
        ]);

        Staff::create([
            'name' => $request->name,
            'occupation' => $request->occupation,
            // 'matkul_id' => $request->matkul_id,
            'divisi_id' => $request->divisi_id,
            'photo' => $request->file('photo')->store('staff'), 
        ]);

        return redirect()->route('staff.index');
    }

    public function edit($id)
    {
        $divisi = Divisi::select('id','name')->get();
        // $matkul = MataKuliah::select('id','name')->get();
        $staff = Staff::find($id);
        return view('admin.staff.edit', compact('staff','divisi'));        
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'occupation' => 'required',
            'divisi_id' => 'required',
        ]);


        $staff = Staff::find($id);

        if (empty($request->file('photo'))) {
            $staff->update([
                'name' => $request->name,
                'occupation' => $request->occupation,
                // 'matkul_id' => $request->matkul_id,
                'divisi_id' => $request->divisi_id,
            ]);
        } else {
            Storage::delete($staff->photo);
            $staff->update([
                'name' => $request->name,
                'occupation' => $request->occupation,
                // 'matkul_id' => $request->matkul_id,
                'divisi_id' => $request->divisi_id,
                'photo' => $request->file('photo')->store('staff'), 
            ]);
        }

        return redirect()->route('staff.index');
      }
 
    public function destroy($id)
    {
        $staff = Staff::find($id);
        if (!$staff) {
            return redirect()->back();
        }
        Storage::delete($staff->photo);
        $staff->delete();
        return redirect()->route('staff.index');
    }      
}
