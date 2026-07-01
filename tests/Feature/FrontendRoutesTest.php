<?php

namespace Tests\Feature;

use Tests\TestCase;

class FrontendRoutesTest extends TestCase
{
    public function test_frontend_alias_routes_are_real_pages_not_redirects(): void
    {
        $routes = [
            'frontend.administrative-staff',
            'frontend.certificate',
            'frontend.downloads',
            'frontend.notice-downloads',
            'frontend.event-downloads',
            'frontend.official-assets',
            'frontend.syllabus-downloads',
            'frontend.nss',
            'frontend.ncc',
            'frontend.startup-cell',
            'frontend.eco-club',
            'frontend.debate-club',
            'frontend.dramatics-society',
            'frontend.literary-society',
            'frontend.health-center',
            'frontend.feedback',
            'frontend.parents-feedback',
            'frontend.feedback-statistics',
            'frontend.placement-guidance-cell',
            'frontend.students-grievance-redressal',
            'frontend.demo',
        ];

        foreach ($routes as $route) {
            $this->get(route($route))->assertOk();
        }
    }
}
