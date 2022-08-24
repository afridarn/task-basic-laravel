<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = [
            [
                'title'      => 'Blog 1',
                'author'   => 'John Doe',
                'content'     => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus officiis libero inventore ex voluptates expedita cupiditate ad error dolores tenetur.',

            ],
            [
                'title'      => 'Blog 2',
                'author'   => 'Tailor Otwell',
                'content'     => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dolore repellendus voluptates beatae quia aliquam suscipit enim reprehenderit vel quas possimus amet, quos minima eius exercitationem numquam et excepturi ex perspiciatis veritatis porro magnam, laboriosam, eos id. Beatae, repellat tempora?',
            ],
            [
                'title'      => 'Blog 3',
                'author'   => 'Steve Schigler',
                'content'     => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel vero beatae recusandae voluptatum veniam nostrum? Ab accusamus accusantium aliquid voluptates natus fugit similique sint eum, maiores eligendi fuga veniam eius. Quisquam, quidem.',
            ],
            [
                'title'      => 'Blog 4',
                'author'   => 'John Doe',
                'content'     => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus officiis libero inventore ex voluptates expedita cupiditate ad error dolores tenetur.',
            ]

        ];

        return view('blogs', [
            'blogs' => $blogs,
        ]);
    }
}
