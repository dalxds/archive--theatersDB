<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\TheatrikiParagwgi as TheatrikiParagwgiRepository;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class EtairiaParagwgis extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {

    }



    /**
     * Display the specified resource.
     *
     * @param  string  $afm
     * @return \Illuminate\Http\Response
     */
    public function show($afm)
    {
        $q = \DB::select('
            SELECT * FROM `etairia_paragwgis`
            WHERE `ΑΦΜ` = :afm
        ', compact('afm'));

        return response()->json($q[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
