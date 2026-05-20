<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courts = Court::latest()->get();

        return view('admin.courts.index', compact('courts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price_per_hour' => 'required',
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')
            ->store('courts', 'public');
        }

        Court::create([
            'name' => $request->name,
            'type' => $request->type,
            'price_per_hour' => $request->price_per_hour,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $image,
        ]);

        return redirect('/admin/courts')
        ->with('succes', 'Lapangan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Court $court)
    {
        $court->load('bookings');

        return view('admin.courts.show', compact('court'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Court $court)
    {
        return view('admin.courts.edit', compact('court'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Court $court)
    {
        $image = $court->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image')
            ->store('courts', 'public');
        }

        $court->update([
            'name' => $request->name,
            'type' => $request->type,
            'price_per_hour' => $request->price_per_hour,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $image,
        ]);

        return redirect('/admin/courts')->with('success', 'Lapangan berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Court $court)
    {
        $court->delete();

        return back()->with('success',  'lapangan berhasil dihapus');
    }
}
