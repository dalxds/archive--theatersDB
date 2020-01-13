<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'spectator_id' => null
    ];

    protected static function boot()
    {
        parent::boot();

        self::created(function ($model) {
            if ($model->spectator_id)
                return;

            $theatisid = \App\Repositories\Theatis::create();
            \App\Repositories\Theatis::update($theatisid, [
                'email' => $model->email,
                'onoma' => 'Ανώνυμος',
                'epwnymo' => 'Χρήστης'
            ]);

            $model->spectator_id = $theatisid;
            $model->save();
        });
    }
}
