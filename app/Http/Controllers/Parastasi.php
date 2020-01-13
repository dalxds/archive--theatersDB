<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use \App\Repositories\TheatrikiParagwgi as TheatrikiParagwgiRepository;

class Parastasi extends Controller
{
    public function create($paragwgi_id)
    {
        if (!TheatrikiParagwgiRepository::isOwnedByUser($paragwgi_id))
            throw new UnauthorizedHttpException();

        $paragwgi = TheatrikiParagwgiRepository::getById($paragwgi_id);
        $theatra = \App\Repositories\Theatro::getAllAithouses();

        return view('Parastasi.create')
            ->with(compact('paragwgi','theatra'));
    }

    public function show(Request $request, $id)
    {
        $parastasi = \App\Repositories\Parastasi::getById($id);

        if (is_null($parastasi))
            throw new NotFoundHttpException();

        $paragwgi = \App\Repositories\TheatrikiParagwgi::getById($parastasi->ΘΠ_ID);
        $normal_tickets = \App\Repositories\Eisitirio::getCount($parastasi->ΘΠ_ID, $parastasi->Π_ID, 'ΚΑΝΟΝΙΚΟ');
        $reduced_tickets = \App\Repositories\Eisitirio::getCount($parastasi->ΘΠ_ID, $parastasi->Π_ID, 'ΜΕΙΩΜΕΝΟ');

        $user_tickets = false;

        if ($request->user())
            $user_tickets = \App\Repositories\Eisitirio::getByParastasiIdForSpectator($id, $request->user()->spectator_id);

        return view('Parastasi.show')->with(compact('parastasi', 'paragwgi', 'reduced_tickets', 'normal_tickets', 'user_tickets'));
    }
}
