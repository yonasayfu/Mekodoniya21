<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use Inertia\Inertia;

class PhotoGalleryController extends Controller
{
    // Display a list of photos
    public function index()
    {
        $photos = PhotoGallery::all();
        return Inertia::render('PhotoGalleries/Index', ['photos' => $photos]);
    }

    // Display the specified photo
    public function show(PhotoGallery $photoGallery)
    {
        return Inertia::render('PhotoGalleries/Show', ['photo' => $photoGallery]);
    }
}