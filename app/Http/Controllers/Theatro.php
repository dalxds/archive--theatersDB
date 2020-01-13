<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Theatro as TheatroRepository;
use App\Repositories\Parastasi as ParastasiRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Theatro extends Controller
{
    public function show(Request $request, $id)
    {
        $theatro = TheatroRepository::getById($id);

        if (is_null($theatro))
            throw new NotFoundHttpException();

        $parastaseis = ParastasiRepository::getUpcomingByTheatroId($id);

        return view('Theatro.show', compact('theatro', 'parastaseis'));
    }
}
