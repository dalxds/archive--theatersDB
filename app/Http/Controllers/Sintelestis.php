<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Sintelestis as SintelestisRepository;
use App\Repositories\TheatrikiParagwgi as TheatrikiParagwgiRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Sintelestis extends Controller
{
    public function show($id) {
        $sintelestis = SintelestisRepository::getById($id);

        if (is_null($sintelestis))
            throw new NotFoundHttpException();

        $paragwges = TheatrikiParagwgiRepository::getBySyntelestisId($id);

        return view('Sintelestis.show', compact('sintelestis', 'paragwges'));
    }
}
