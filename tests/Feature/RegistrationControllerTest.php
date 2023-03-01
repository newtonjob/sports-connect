<?php

namespace Tests\Feature;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class RegistrationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_root_url_redirects_to_login_page(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('login');
    }

    public function test_new_users_can_register_successfully(): void
    {
        Notification::fake();

        $this->postJson(route('api.register'), $data = [
            'name'  => 'Newton Job',
            'username'  => 'newtonjob',
            'email' => 'jobnewton3@gmail.com',
            'phone' => '07011227815',
            'password' => 'Pass123',
            'password_confirmation' => 'Pass123'
        ]);

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', Arr::only($data, ['email', 'phone']));
        Notification::assertSentTimes(VerifyEmail::class, 1);
    }
}
