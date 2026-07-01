<?php

namespace Tests\Feature;

use App\Models\WebsiteSetting;
use Tests\TestCase;

class WebsiteSettingTest extends TestCase
{
    public function test_frontend_uses_website_settings(): void
    {
        $original = optional(WebsiteSetting::find(1))->getAttributes();

        try {
            WebsiteSetting::updateOrCreate(
                ['id' => 1],
                [
                    'site_title' => 'Test College Website',
                    'college_name' => 'Test College',
                    'college_name_hindi' => 'Test Hindi Name',
                    'meta_description' => 'Test meta description',
                    'affiliation_text' => 'Test University',
                    'aishe_code' => 'TEST-123',
                    'naac_text' => 'Test NAAC',
                    'address' => 'Test Address',
                    'phone' => '1234567890',
                    'alternate_phone' => '0987654321',
                    'email' => 'test@example.com',
                    'admission_url' => 'https://example.com/admission',
                    'map_embed_url' => 'https://example.com/map',
                    'map_direction_url' => 'https://example.com/direction',
                ]
            );

            $response = $this->get(route('frontend.home'));

            $response->assertOk();
            $response->assertSee('Test College Website');
            $response->assertSee('Test College');
            $response->assertSee('test@example.com');
        } finally {
            if ($original) {
                WebsiteSetting::where('id', 1)->update($original);
            } else {
                WebsiteSetting::where('id', 1)->delete();
            }
        }
    }
}
