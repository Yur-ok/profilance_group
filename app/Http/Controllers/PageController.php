<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $shortUrl = $this->generateShortUrl();
        $isExist = Link::where('short_url', $shortUrl)->get();
        while (!empty($isExist->toArray())) {
            echo 'true';
            $shortUrl = $this->generateShortUrl();
            $isExist = Link::where('short_url', $shortUrl)->get();
        }
        $link = new Link();
        $data = $this->validate($request, [
            'origin_url' => 'required',
        ]);
        $data['short_url'] = $shortUrl;
        $link->fill($data);
        $link->save();

        return view('create', compact('link'));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        $link = Link::findOrFail($id);
        if ($link) {
            return redirect($link->getOrigin());
        }

        return redirect('/')->with('status', 'Link is expired!');
    }

    private function generateShortUrl($length = 6)
    {
        $shortUrlLength = $length;
        $shortUrlChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($shortUrlChars), mt_rand(0, strlen($shortUrlChars) - 6), $shortUrlLength);
    }
}
