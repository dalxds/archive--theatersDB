<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Repositories\TheatrikiParagwgi as TheatrikiParagwgiRepository;
use App\Repositories\Axiologisi as AxiologisiRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Axiologisi extends Controller
{
    public function create($id) {
        $paragwgi = TheatrikiParagwgiRepository::getById($id);

        if (!$paragwgi)
            throw new NotFoundHttpException();

        return view('Axiologisi.create', compact('paragwgi'));
    }

    public function store($id, Request $request)
    {
        $paragwgi = TheatrikiParagwgiRepository::getById($id);

        if (!$paragwgi)
            throw new NotFoundHttpException();

        if (!$request->user())
            throw new AuthorizationException();

        AxiologisiRepository::create($id, $request->user()->spectator_id, $request->get('vathmologia'), $request->get('perigrafi'));

        return redirect(route('TheatrikiParagwgi.show', $id));
    }
}
