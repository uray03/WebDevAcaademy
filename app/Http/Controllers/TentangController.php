<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        $team = [
            [
                'name' => 'Uray Fauzan Al Hafizh',
                'role' => 'Fullstack Developer',
                'image' => 'uray.jpeg',
                'hobbies' => 'Basket, Coding, Traveling',
                'quote' => 'Teknologi adalah cara kita membangun masa depan.',
            ],
            [
                'name' => 'Nama Anggota 2',
                'role' => 'Frontend Developer',
                'image' => 'ura.jpeg',
                'hobbies' => 'Desain, Traveling',
                'quote' => 'Desain adalah seni mempermudah hidup.',
            ],
            [
                'name' => 'Nama Anggota 3',
                'role' => 'Backend Developer',
                'image' => 'ura.jpeg',
                'hobbies' => 'Coding, Musik',
                'quote' => 'Logika adalah pondasi sistem.',
            ],
            [
                'name' => 'Nama Anggota 4',
                'role' => 'UI/UX Designer',
                'image' => 'ura.jpeg',
                'hobbies' => 'Sketching, Gaming',
                'quote' => 'Tampilan yang baik membangun kepercayaan.',
            ],
        ];

    return view('tentang.index', compact('team'));

    }
}

