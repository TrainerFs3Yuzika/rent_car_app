<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Http\Requests\StoreContactsRequest;
use App\Http\Requests\UpdateContactsRequest;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contacts.index', [
            'contacts' => Contacts::all(),
            'title' => 'Contact',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactsRequest $request)
    {
        $validatedata = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contacts',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);
        Contacts::create($validatedata);
        return redirect('/contact')->with('success', 'Terimakasih telah menghubungi kami!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contacts, $id)
    {
        $tes = Contacts::find($id);
        return view('admin.contacts.show', [
            'contact' => $tes,
            'title' => 'Contact',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacts $contacts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactsRequest  $request
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactsRequest $request, Contacts $contacts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    \Log::info('Request to delete contact with ID: ' . $id);

    try {
        $contact = Contacts::findOrFail($id);
        \Log::info('Found contact: ' . $contact->id);

        $contact->delete();
        \Log::info('Contact deleted successfully: ' . $contact->id);

        alert()->success('SuccessAlert', 'Kontak berhasil dihapus.');
    } catch (\Exception $e) {
        \Log::error('Error deleting contact: ' . $e->getMessage());

        if ($e->getCode() == "23000") {
            alert()->error('ErrorAlert', 'Kontak tidak bisa dihapus karena berelasi di tabel lain.');
        } else {
            alert()->error('ErrorAlert', 'Terjadi kesalahan saat menghapus kontak.');
        }
    }

    return redirect('/dashboard/contacts');
}

}
