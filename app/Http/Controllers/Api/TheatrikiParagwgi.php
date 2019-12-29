<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\TheatrikiParagwgi as TheatrikiParagwgiRepository;
use App\Repositories\Sintelestis as SyntelestisRepository;
use App\Repositories\Parastasi as ParastasiRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class TheatrikiParagwgi extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app', ['content' => '<CreateTheatrikiParagwgi></CreateTheatrikiParagwgi>']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     * @throws UnauthorizedHttpException
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        if ($request->user()->type != 1)
            throw new UnauthorizedHttpException('Not authorized');

        $data = $this->validate($request, [
            'titlos' => 'required|min:1|max:120',
            'perigrafi' => 'required|min:1|max:20000',
            'diarkeia' => 'required|integer|min:1'
        ]);

        $data['afm'] = $request->user()->ep_afm;

        $id = TheatrikiParagwgiRepository::create($data);

        return response()->json([
            'success' => true,
            'url' => route('TheatrikiParagwgi.show', $id)
        ]);
    }

    public function show($id)
    {
        $paragwgi = TheatrikiParagwgiRepository::getById($id);

        if (is_null($paragwgi))
            throw new NotFoundHttpException();

        $sintelestes = SyntelestisRepository::getByParagwgiId($paragwgi->ΘΠ_ID);
        $parastaseis = ParastasiRepository::getByTheatrikiParagwgiId($paragwgi->ΘΠ_ID);

        $own = TheatrikiParagwgiRepository::isOwnedByUser($id);


        return view('TheatrikiParagwgi.show')->with(compact('paragwgi', 'sintelestes', 'parastaseis', 'own'));
    }

    public function index_own()
    {
        if (\Auth::check() && \Auth::user()->type == 1 && !is_null(\Auth::user()->ep_afm))
        {
            $afm = \Auth::user()->ep_afm;

            $etairia = \App\Repositories\EtairiaParagwgis::getById($afm);
            $paragwges = TheatrikiParagwgiRepository::getByEtairiaParagwgisId($afm);

            return view('EtairiaParagwgis.show')->with(
                compact('paragwges', 'etairia')
            );
        }
    }
}
