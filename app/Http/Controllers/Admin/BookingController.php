<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BookingController;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with('car')->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi data request
    $validatedData = $request->validate([
        'foto_ktp' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Cek apakah request memiliki file
    if ($request->hasFile('foto_ktp')) {
        try {
            // Simpan file di direktori 'public/booking'
            $path = $request->file('foto_ktp')->store('booking', 'public');
            // Simpan path file ke array validated data
            $validatedData['foto_ktp'] = $path;
            // Buat URL file yang diunggah dengan encoding
            $url = url('storage/' . $path);
            \Log::info('URL file yang diunggah: ' . $url);
        } catch (\Exception $e) {
            // Tangani error, log, atau kembalikan response
            return back()->withErrors(['foto_ktp' => 'Gagal mengunggah file: ' . $e->getMessage()]);
        }
    } else {
        $validatedData['foto_ktp'] = 'tidak ada';
    }

    // Simpan data ke model dan ke database
    YourModel::create($validatedData);

    // Kembalikan URL file yang diunggah sebagai response
    return response()->json(['url' => $url]);



// Sekarang $validatedData berisi data input yang divalidasi, termasuk 'foto_ktp'


    // Buat booking baru
    Booking::create($validatedData);

    // Redirect atau tampilkan pesan sukses
    return redirect()->route('bookings.index')->with('success', 'Booking berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus !',
            'alert-type' => 'danger'
        ]);
    }
}
