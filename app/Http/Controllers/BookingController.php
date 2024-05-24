<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function create(Request $request)
    {
        $carId = $request->query('car_id'); // Mendapatkan nilai 'car_id' dari query string

        // Lakukan apa pun yang perlu dilakukan dengan $carId, misalnya mencari mobil dengan ID tersebut

        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'nama_lengkap' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'nomer_wa' => 'required|string|max:15',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'metode_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duration' => 'required|numeric|min:1', 
            'start_date' => 'required|date', 
            'end_date' => 'required|date|after:start_date', 
        ]);
    
        $booking = new Booking($request->only(['car_id', 'nama_lengkap', 'alamat_lengkap', 'nomer_wa', 'metode_pembayaran']));
    
        if ($request->hasFile('foto_ktp')) {
            $path = $request->file('foto_ktp')->storeAs('artikels', $request->file('foto_ktp')->getClientOriginalName(), 'public');
            $booking->foto_ktp = $path;
        }
    
        $booking->save();
    
        return redirect()->route('bookings.index')->with('success', 'Booking berhasil ditambahkan.');
    }
    
}
