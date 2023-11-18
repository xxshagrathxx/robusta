<?php

namespace App\Http\Controllers\core;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BusController extends Controller
{
    public function index(Request $request) 
    {
        if ($request->ajax()) {
            $data = Bus::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                        return $row->name;
                    })
                    ->addColumn('total_seats', function($row){
                        return $row->total_seats;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="text-end">';
                        if(auth()->user()->can('update_buses')) {
                            $btn .= '<a title="'.transWord('edit').'" href="'.route('buses-edit', $row->id).'" class="btn btn-info me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>';
                        }
                        if(auth()->user()->can('delete_buses')) {
                            $btn .= '<a title="'.transWord('delete').'" id="delete" href="'.route('buses-delete', $row->id).'" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>';
                        }
                        $btn .= '</div>';
                        return $btn;
                    })->rawColumns(['action'])
                    ->make(true);
        }
        return view('pages.buses.index');
    }
    
    public function create() {
        return view('pages.buses.create');
    }
    
    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
    
        Bus::create([
            'name' => $request->name,
            'total_seats' => $request->total_seats ? $request->total_seats : 12,
        ]);

        $notification = array(
			'message' => transWord('Bus created successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('buses-all')->with($notification);
    }

    public function edit($id)
    {
        $bus = Bus::findOrFail($id);
        return view('pages.buses.edit', compact('bus'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $bus = Bus::findOrFail($id);

        $bus->update([
            'name' => $request->name,
            'total_seats' => $request->total_seats,
        ]);

        $notification = array(
			'message' => transWord('Bus updated successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('buses-all')->with($notification);
    }

    public function destroy($id)
    {
        Bus::findOrFail($id)->delete();
        
        $notification = array(
			'message' => transWord('Bus deleted successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('buses-all')->with($notification);
    }
}
