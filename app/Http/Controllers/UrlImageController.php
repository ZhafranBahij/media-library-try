<?php

namespace App\Http\Controllers;

use App\Models\UrlImage;
use App\Http\Requests\StoreUrlImageRequest;
use App\Http\Requests\UpdateUrlImageRequest;

class UrlImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = UrlImage::query()
                    ->latest()
                    ->paginate(10);

        return view('pages.url-image.index', [
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.url-image.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUrlImageRequest $request)
    {
        $validated = $request->validated();

        $url_image = UrlImage::create($validated);

        $url_image->addMediaFromUrl($request->url)
                ->toMediaCollection();

        return to_route('url-image.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(UrlImage $urlImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UrlImage $urlImage)
    {
        return view('pages.url-image.edit', [
            'data' => $urlImage
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUrlImageRequest $request, UrlImage $urlImage)
    {
        if ($request->url) {
            $image = $urlImage->getFirstMedia('*');
            if ($image) {
                $image->delete();
            }
            $urlImage
            ->addMedia($request->url)
            ->toMediaCollection();
        }

        $urlImage->update($request->validated());

        return to_route('url-image.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UrlImage $urlImage)
    {
        $urlImage->delete();

        return to_route('url-image.index');
    }
}
