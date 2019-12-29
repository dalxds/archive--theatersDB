<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Theatis extends Controller
{
    public function show(Request $request, $id)
    {
        $theatis = \App\Repositories\Theatis::getById($id);

        if (!$theatis)
            throw new NotFoundHttpException();

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

            return view ('Theatis.show_own', compact('theatis', 'past_tickets', 'upcoming_tickets'));
        }

        return view ('Theatis.show', compact('theatis'));
    }
}
