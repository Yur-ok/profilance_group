<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $shortUrlLength = 6;
        $shortUrlChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $link = new Link();
        $data = $this->validate($request, [
            'origin_url' => 'required',
        ]);
        $link->fill($data);
        $link->short_url = substr(str_shuffle($shortUrlChars), mt_rand(0, strlen($shortUrlChars) - 6), $shortUrlLength);
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
}
