<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use App\Models\Trip;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class BookingController extends Controller
{
    public function listAvailableSeats($tripId) {
        $trip = Trip::find($tripId);

        if(!$trip) {
            return response()->json([
                'message' => 'Trip not found',
            ], 404);
        }

        $availableSeats = $trip->bus->seats()->where('is_booked', false)->get();

        if(!$availableSeats || $availableSeats->isEmpty()){
            return response()->json([
                'message' => 'No avaiable seats',
            ], 404);
        }

        return response()->json([
            'available_seats' => $availableSeats,
        ], 200);
    }
    
    public function bookSeat(Request $request, $seatId) {
        $seat = Seat::findOrFail($seatId);

        if($seat->is_booked == true){
            return response()->json([
                'message' => 'This seat is already booked',
            ], 403);
        }

        $seat->is_booked = true;
        $seat->user_id = 1; // Assuming user authentication
        $seat->save();
    
        return response()->json([
            'message' => 'Seat booked successfully',
        ], 200);
    }
}
