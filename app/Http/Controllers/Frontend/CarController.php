<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\BookingRequest;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::where('status',1);
        
        if($request->category_id && $request->penumpang){
            $cars = $cars->Where('type_id',$request->category_id)->Where('penumpang','>=',$request->penumpang);
        }
        
        $cars = $cars->get();
        return view('frontend.car.index', compact('cars'));
    }

    public function show(Car $car)
    {
        return view('frontend.car.show', compact('car'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'nama_lengkap' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'nomer_wa' => 'required|string|max:15',
            'metode_pembayaran' => 'required|string|max:50',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan foto KTP
        if ($request->hasFile('foto_ktp')) {
            $path = $request->file('foto_ktp')->store('ktp', 'public');
            $validatedData['foto_ktp'] = $path;
        }

        // Buat booking baru
        $booking = Booking::create($validatedData);

        return redirect()->back()->with([
            'message' => 'kami akan menghubungi anda secepatnya !',
            'alert-type' => 'success'
        ]);
    }
}
