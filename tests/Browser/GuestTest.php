<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GuestTest extends DuskTestCase
{
    // use DatabaseMigrations;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSeeLink('Login');
        });
    }

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testRegisterPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSeeLink('Register');
        });
    }

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testLoginPageProcess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSeeLink('Login')
                    ->visit('/login')
                    ->assertSeeLink('Forgot Your Password?');
        });
    }

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testRegisterPageProcess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSeeLink('Register')
                    ->visit('/register')
                    ->type('name', 'Saravanan')
                    ->type('email', 'admin@laracms.com')
                    ->type('password', 'Ac1dBun')
                    ->type('password_confirmation', 'Ac1dBurn')
                    ->press('Register')
                    ->assertSee('The email has already been taken.')
                    ->assertSee('The password confirmation does not match.');
        });
    }

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testRegistrationProcess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSeeLink('Register')
                    ->visit('/register')
                    ->type('name', 'Saravanan')
                    ->type('email', 'me@sarav.co')
                    ->type('password', 'Ac1dBurn')
                    ->type('password_confirmation', 'Ac1dBurn')
                    ->press('Register')
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard')
                    ->assertSeeLink('Saravanan')
                    ->clickLink('Saravanan')
                    ->assertSeeLink('Logout');
        });
    }
}
