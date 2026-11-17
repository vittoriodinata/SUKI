<?php

namespace Database\Seeders;

use App\Models\Organizer;
use Illuminate\Database\Seeder;

class OrganizerSeeder extends Seeder
{
    public function run(): void
    {
        $organizers = [
            [
                'organizer_name' => 'Google Developer Groups',
                'organizer_type' => 'Technology Community',
                'email' => 'contact@gdg.example',
                'website' => 'https://developers.google.com',
                'description' => 'Community for developers interested in Google technologies.',
            ],
            [
                'organizer_name' => 'IEEE',
                'organizer_type' => 'Professional Organization',
                'email' => 'contact@ieee.example',
                'website' => 'https://www.ieee.org',
                'description' => 'Professional organization for engineering and technology.',
            ],
            [
                'organizer_name' => 'BINUS University',
                'organizer_type' => 'University',
                'email' => 'info@binus.example',
                'website' => 'https://binus.ac.id',
                'description' => 'University organizing academic and student competitions.',
            ],
            [
                'organizer_name' => 'Microsoft',
                'organizer_type' => 'Company',
                'email' => 'contact@microsoft.example',
                'website' => 'https://www.microsoft.com',
                'description' => 'Technology company supporting innovation and developer competitions.',
            ],
            [
                'organizer_name' => 'NASA',
                'organizer_type' => 'Government Organization',
                'email' => 'contact@nasa.example',
                'website' => 'https://www.nasa.gov',
                'description' => 'Organization supporting science, aerospace, and innovation challenges.',
            ],
            [
                'organizer_name' => 'Kementerian Pendidikan Tinggi',
                'organizer_type' => 'Government',
                'email' => 'contact@kemdiktisaintek.example',
                'website' => 'https://kemdiktisaintek.go.id',
                'description' => 'Government institution supporting education and student activities.',
            ],
            [
                'organizer_name' => 'Startup Indonesia',
                'organizer_type' => 'Startup Community',
                'email' => 'hello@startupindonesia.example',
                'website' => 'https://example.com',
                'description' => 'Community supporting entrepreneurship and startup development.',
            ],
            [
                'organizer_name' => 'Indonesia Design Community',
                'organizer_type' => 'Creative Community',
                'email' => 'info@designcommunity.example',
                'website' => 'https://example.com',
                'description' => 'Community for creative professionals and design enthusiasts.',
            ],
        ];

        foreach ($organizers as $organizer) {
            Organizer::updateOrCreate(
                ['organizer_name' => $organizer['organizer_name']],
                [
                    'organizer_type' => $organizer['organizer_type'],
                    'email' => $organizer['email'],
                    'website' => $organizer['website'],
                    'description' => $organizer['description'],
                ]
            );
        }
    }
}
