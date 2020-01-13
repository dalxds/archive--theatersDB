<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Parastasi extends Controller
{
    public function store(Request $request, $paragwgi_id)
    {
        if ($request->user()->type != 1 || !\App\Repositories\TheatrikiParagwgi::isOwnedByUser($paragwgi_id))
            throw new UnauthorizedHttpException('Not authorized');

        $data = $request->all();
        $data['paragwgi_id'] = $paragwgi_id;

        $id = \App\Repositories\Parastasi::create($data);

        return response()->json([
            'success' => true,
            'url' => route('Parastasi.show', $id)
        ]);
    }
}
