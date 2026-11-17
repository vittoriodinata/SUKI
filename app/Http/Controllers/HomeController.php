<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Static sample data so the page works today.
        // Later, replace each block with a query, e.g.
        //   'competitions' => Competition::where('status', 'published')->latest('published_at')->take(3)->get()
        // and keep the keys the Blade components read (title, category, prize, ...).

        return view('home', [
            'stats' => [
                ['value' => 'usertablecount', 'label' => 'Students'],
                ['value' => 'usertableuniqueuniv',  'label' => 'Universities'],
                ['value' => 'usertblecount',   'label' => 'Countries'],
            ],

            'featured' => [
                'host'         => 'SUKI × Global Futures Lab',
                'title'        => 'AI for Social Good Challenge 2026',
                'deadline'     => 'May 24',
                'participants' => '1,284',
                'prize'        => '$25,000',
                'url'          => '#competitions',
            ],

            'competitions' => [
                [
                    'category'     => 'Technology',
                    'title'        => 'Jordan',
                    'description'  => 'Build an AI-powered solution that creates meaningful impact in your local community.',
                    'deadline'     => 'May 24, 2026',
                    'participants' => '1,284',
                    'prize'        => '$25,000',
                    'accent'       => 'tech',
                    'icon'         => 'code-slash',
                    'url'          => '#',
                ],
                [
                    'category'     => 'Design',
                    'title'        => 'Aaron',
                    'description'  => 'Reimagine the university experience through thoughtful, human-centered design.',
                    'deadline'     => 'Jun 08, 2025',
                    'participants' => '856',
                    'prize'        => '$12,000',
                    'accent'       => 'design',
                    'icon'         => 'box',
                    'url'          => '#',
                ],
                [
                    'category'     => 'Science',
                    'title'        => 'Vitto',
                    'description'  => 'Present bold research ideas to address the most urgent challenges facing our planet.',
                    'deadline'     => 'Jun 21, 2025',
                    'participants' => '642',
                    'prize'        => '$18,000',
                    'accent'       => 'science',
                    'icon'         => 'globe-americas', // any Bootstrap Icons name works
                    'url'          => '#',
                ],
            ],

            'winners' => [
                ['initials' => 'JA', 'name' => 'Johannes Aaron',    'university' => 'BINUS',            'competition' => 'Global Data Challenge',   'tone' => 'blue'],
                ['initials' => 'NS', 'name' => 'Nevan Sebastian',      'university' => 'BINUS', 'competition' => 'Future Cities Hackathon', 'tone' => 'violet'],
                ['initials' => 'VD', 'name' => 'Vittorio Dinata', 'university' => 'BINUS',          'competition' => 'Climate Innovation Cup',  'tone' => 'green'],
            ],

            'organizations' => [
                ['name' => 'SIGMA',     'color' => '#188cca'],
                ['name' => 'MEWING',    'color' => '#665ed1'],
                ['name' => 'LARPING', 'color' => '#17a18d'],
                ['name' => 'MOGGING',    'color' => '#e89532'],
                ['name' => 'MAXXING',    'color' => '#2d6da2'],
            ],
        ]);
    }
}