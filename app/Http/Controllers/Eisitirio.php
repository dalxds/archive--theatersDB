<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Eisitirio extends Controller
{
    public function store(Request $request, $parastasi_id)
    {
        $parastasi = \App\Repositories\Parastasi::getById($parastasi_id);

        if (is_null($parastasi))
            throw new NotFoundHttpException();

        $type = $request->get('type');
        $theatis_id = $request->user()->spectator_id;

        \App\Repositories\Eisitirio::checkinByParastasiId($parastasi_id, $theatis_id, $type);

        return redirect()->back();
    }
}
