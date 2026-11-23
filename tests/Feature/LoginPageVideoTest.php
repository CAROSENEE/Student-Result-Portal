<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginPageVideoTest extends TestCase
{
    public function test_guest_can_play_the_demo_video_from_the_login_page()
    {
        $response = $this->get(route('login'));

        $response->assertOk()
            ->assertSee('videos/student-result-portal-demo.mp4')
            ->assertSee('controls');
    }
}
