<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            [
                'name'      => 'John Doe',
                'email'     => 'john@mail.com',
                'twitter'   => 'johndoe'
            ],
            [
                'name'      => 'Tailor Otwell',
                'email'     => 'tailor@mail.com',
                'twitter'   => 'tailorott'
            ],
            [
                'name'      => 'Steve Schoger',
                'email'     => 'steve@mail.com',
                'twitter'   => 'steveschoger',
            ],
        ];

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function show($user)
    {
        return view('users.show', [
            'user' => $user,
        ]);
    }
}
