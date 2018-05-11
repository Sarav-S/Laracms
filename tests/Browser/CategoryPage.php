<?php

namespace Tests\Browser;

use App\Category;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryPage extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCategoryCreation()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Category::truncate();
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@laracms.com')
                    ->type('password', 'admin123')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->assertSeeLink('Categories')
                    ->clickLink('Categories')
                    ->assertPathIs('/admin/categories')
                    ->assertSeeLink('Add Category')
                    ->clickLink('Add Category')
                    ->type('name', 'Sample')
                    ->press('Save Changes')
                    ->assertPathIs('/admin/categories');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCategoryValidation()
    {
        $this->browse(function (Browser $browser) {
            $browser->clickLink('Add Category')
                    ->type('name', 'Sample')
                    ->press('Save Changes')
                    ->assertSee('The name has already been taken.')
                    ->assertPathIs('/admin/categories/create');
        });
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
