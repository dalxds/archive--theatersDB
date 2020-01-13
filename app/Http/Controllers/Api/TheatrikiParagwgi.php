<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Axiologisi;
use App\Repositories\TheatrikiParagwgi as TheatrikiParagwgiRepository;
use App\Repositories\Sintelestis as SintelestisRepository;
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

    public function show($id, Request $request)
    {
        $paragwgi = TheatrikiParagwgiRepository::getById($id);

        if (is_null($paragwgi))
            throw new NotFoundHttpException();

        $sintelestes = SintelestisRepository::getByParagwgiId($paragwgi->ΘΠ_ID);
        $parastaseis = ParastasiRepository::getByTheatrikiParagwgiId($paragwgi->ΘΠ_ID);
        $axiologiseis = Axiologisi::getByTheatrikiParagwgiId($paragwgi->ΘΠ_ID);

        $own = TheatrikiParagwgiRepository::isOwnedByUser($id);

        $own_axiologisi = false;
        if ($request->user())
            $own_axiologisi = collect($axiologiseis)->firstWhere('ΘΕ_ID', $request->user()->spectator_id);

        return view('TheatrikiParagwgi.show')->with(compact('paragwgi', 'sintelestes', 'parastaseis', 'own', 'axiologiseis', 'own_axiologisi'));
    }

    public function index_own()
    {
        if (\Auth::check() && \Auth::user()->type == 1 && !is_null(\Auth::user()->ep_afm))
        {
            $afm = \Auth::user()->ep_afm;

            $etairia = \App\Repositories\EtairiaParagwgis::getById($afm);
            $paragwges = TheatrikiParagwgiRepository::getByEtairiaParagwgisId($afm);

            return view('EtairiaParagwgis.show')->with(
                compact('paragwges', 'etairia', 'sintelestes')
            );
        }
    }

    public function addSintelestisForm($id, Request $request) {
        if ($this->isOwnParagwgi($id, $request)) {
            $afm = \Auth::user()->ep_afm;

            $paragwgi = TheatrikiParagwgiRepository::getById($id);
            $all_sintelestes = SintelestisRepository::getAll();

            return view('TheatrikiParagwgi.addSintelestis', compact('paragwgi', 'all_sintelestes'));
        }
    }

    public function addSintelestis($id, Request $request) {
        if ($this->isOwnParagwgi($id, $request)) {
            $afm = \Auth::user()->ep_afm;

            $data = $request->only('sintelestis_id', 'idiotita');
            $data['paragwgi_id'] = $id;

            TheatrikiParagwgiRepository::addSintelestis($data);

            return redirect(route('TheatrikiParagwgi.show', compact('id')));
        }
    }

    public function removeSintelestis($id, $sintelestis_id, Request $request)
    {
        if ($paragwgi = $this->isOwnParagwgi($id, $request)) {
            $paragwgi_id = $id;
            $idiotita = $request->get('idiotita');
            SintelestisRepository::delete($paragwgi_id, $sintelestis_id, $idiotita);

            return redirect(route('TheatrikiParagwgi.show', $paragwgi_id));
        }
    }

    public function isOwnParagwgi($id, Request $request) {
        if ($request->user() && $request->user()->type == 1 && !is_null($request->user()->ep_afm)) {
            $paragwgi = TheatrikiParagwgiRepository::getById($id);

            if ($paragwgi->Εταιρεία_Παραγωγής == $request->user()->ep_afm)
                return $paragwgi;
        }

        return false;
    }
}
