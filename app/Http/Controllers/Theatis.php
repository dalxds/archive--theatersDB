<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Repositories\Theatis as TheatisRepository;
use App\Repositories\Axiologisi as AxiologisiRepository;

class Theatis extends Controller
{
    public function show(Request $request, $id)
    {
        $theatis = TheatisRepository::getById($id);

        if (!$theatis)
            throw new NotFoundHttpException();

        $axiologiseis = AxiologisiRepository::getByTheatisId($id);

        // Prosopiko profil
        if ($request->user() && $request->user()->spectator_id == $theatis->ΘΕ_ID) {
            $tickets = \App\Repositories\Eisitirio::getAllOfSpectator($id);

            $past_tickets = [];
            $upcoming_tickets = [];

            foreach ($tickets as $ticket) {
                $date = \Carbon\Carbon::parse($ticket->Έναρξη);
                if ($date->gt(new \Carbon\Carbon()))
                {
                    $upcoming_tickets[] = $ticket;
                }
                else {
                    $past_tickets[] = $ticket;
                }
            }

            return view ('Theatis.show_own', compact('theatis', 'past_tickets', 'upcoming_tickets', 'axiologiseis'));
        }

        return view ('Theatis.show', compact('theatis', 'axiologiseis'));
    }

    public function update(Request $request, $id) {
        // Authorization
        if (!TheatisRepository::getById($id))
            throw new NotFoundHttpException();

        if (!$request->user()
            || (intval($id) !== $request->user()->spectator_id))
            throw new \Illuminate\Auth\Access\AuthorizationException();

        $data = $request->only([
            'onoma', 'epwnymo', 'email', 'tilefwno'
        ]);

        TheatisRepository::update($id, $data);

        return redirect(route('Theatis.show', $id));
    }
}
