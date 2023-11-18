<?php

namespace App\Http\Controllers\core;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Station;
use App\Models\Trip;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TripController extends Controller
{
    public function index(Request $request) 
    {
        // $trips = Trip::with(['fromCity', 'toCity'])->get();

        if ($request->ajax()) {
            $data = Trip::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('from_city_id', function($row){
                        return $row->fromCity->name;
                    })
                    ->addColumn('to_city_id', function($row){
                        return $row->toCity->name;
                    })
                    ->addColumn('bus_id', function($row){
                        return $row->bus->name;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="text-end">';
                        if(auth()->user()->can('update_trips')) {
                            $btn .= '<a title="'.transWord('edit').'" href="'.route('trips-edit', $row->id).'" class="btn btn-info me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>';
                        }
                        if(auth()->user()->can('delete_trips')) {
                            $btn .= '<a title="'.transWord('delete').'" id="delete" href="'.route('trips-delete', $row->id).'" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>';
                        }
                        $btn .= '</div>';
                        return $btn;
                    })->rawColumns(['action'])
                    ->make(true);
        }
        return view('pages.trips.index');
    }
    
    public function create() {
        $stations = Station::all();
        $buses = Bus::where('trip_id', null)->get();
        return view('pages.trips.create', compact('stations', 'buses'));
    }
    
    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'from_city_id' => 'required',
            'to_city_id' => 'required',
            // 'via_city_ids' => 'nullable|array',
            'bus_id' => 'required',
        ]);
    
        $trip = Trip::create([
            'from_city_id' => $request->from_city_id,
            'to_city_id' => $request->to_city_id,
            'via_city_ids' => $request->via_city_ids,
            'bus_id' => $request->bus_id,
        ]);

        Bus::findOrFail($request->bus_id)->update([
            'trip_id' => $trip->id,
        ]);

        $notification = array(
			'message' => transWord('Trip created successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('trips-all')->with($notification);
    }

    public function edit($id)
    {
        $stations = Station::all();
        $buses = Bus::where('trip_id', null)->get();
        $trip = Trip::findOrFail($id);
        return view('pages.trips.edit', compact('trip', 'stations', 'buses'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'from_city_id' => 'required',
            'to_city_id' => 'required',
            // 'via_city_ids' => 'nullable|array',
            'bus_id' => 'required',
        ]);

        $trip = Trip::findOrFail($id);

        $trip->update([
            'from_city_id' => $request->from_city_id,
            'to_city_id' => $request->to_city_id,
            'via_city_ids' => $request->via_city_ids,
            'bus_id' => $request->bus_id,
        ]);

        Bus::findOrFail($request->bus_id)->update([
            'trip_id' => $trip->id,
        ]);

        $notification = array(
			'message' => transWord('Trip updated successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('trips-all')->with($notification);
    }

    public function destroy($id)
    {
        Trip::findOrFail($id)->delete();
        
        $notification = array(
			'message' => transWord('Trip deleted successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('trips-all')->with($notification);
    }
}
