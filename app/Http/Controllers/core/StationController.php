<?php

namespace App\Http\Controllers\core;

use App\Http\Controllers\Controller;
use App\Models\Station;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StationController extends Controller
{
    public function index(Request $request) 
    {
        if ($request->ajax()) {
            $data = Station::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                        return $row->name;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="text-end">';
                        if(auth()->user()->can('update_stations')) {
                            $btn .= '<a title="'.transWord('edit').'" href="'.route('stations-edit', $row->id).'" class="btn btn-info me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>';
                        }
                        if(auth()->user()->can('delete_stations')) {
                            $btn .= '<a title="'.transWord('delete').'" id="delete" href="'.route('stations-delete', $row->id).'" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>';
                        }
                        $btn .= '</div>';
                        return $btn;
                    })->rawColumns(['action'])
                    ->make(true);
        }
        return view('pages.stations.index');
    }
    
    public function create() 
    {
        return view('pages.stations.create');
    }
    
    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:stations',
        ]);
    
        $station = Station::create([
            'name' => $request->name
        ]);

        $notification = array(
			'message' => transWord('Station created successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('stations-all')->with($notification);
    }

    public function edit($id)
    {
        $station = Station::findOrFail($id);
        return view('pages.stations.edit', compact('station'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:stations,name,'.$id,
        ]);

        $station = Station::findOrFail($id);

        $station->update([
            'name' => $request->name,
        ]);

        $notification = array(
			'message' => transWord('Station updated successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('stations-all')->with($notification);
    }

    public function destroy($id)
    {
        Station::findOrFail($id)->delete();
        
        $notification = array(
			'message' => transWord('Station deleted successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('stations-all')->with($notification);
    }
}
