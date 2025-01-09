<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use Inertia\Inertia;

class PhotoGalleryController extends Controller
{
    // Display a list of photo galleries
    public function index()
    {
        $photoGalleries = PhotoGallery::with('event')->get();
        return Inertia::render('PhotoGalleries/Index', ['photoGalleries' => $photoGalleries]);
    }

    // Show the form for creating a new photo gallery
    public function create()
    {
        return Inertia::render('PhotoGalleries/Create');
    }

    // Store a newly created photo gallery in the database
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'photo_url' => 'required|string',
            'description' => 'nullable|string',
        ]);

        PhotoGallery::create($request->all());

        return redirect()->route('photo-galleries.index');
    }

    // Display the specified photo gallery
    public function show(PhotoGallery $photoGallery)
    {
        return Inertia::render('PhotoGalleries/Show', ['photoGallery' => $photoGallery]);
    }

    // Show the form for editing the specified photo gallery
    public function edit(PhotoGallery $photoGallery)
    {
        return Inertia::render('PhotoGalleries/Edit', ['photoGallery' => $photoGallery]);
    }

    // Update the specified photo gallery in the database
    public function update(Request $request, PhotoGallery $photoGallery)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'photo_url' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $photoGallery->update($request->all());

        return redirect()->route('photo-galleries.index');
    }

    // Remove the specified photo gallery from the database
    public function destroy(PhotoGallery $photoGallery)
    {
        $photoGallery->delete();
        return redirect()->route('photo-galleries.index');
    }
}
