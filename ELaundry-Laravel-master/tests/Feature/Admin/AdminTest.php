<?php

namespace Tests\Feature\Admin;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tabel_admin()
    {
        $response = $this->get('/admin/admin');

        $response->assertSeeText('Table Admin');
        $response->assertSeeText('User id');
        $response->assertSeeText('hp');
        $response->assertSeeText('alamat');
        $response->assertStatus(200);
    }

    public function test_admin_tambah_data(){
        $response = $this->get('/admin/admin/create');

        $response->assertSee('admin');
        $response->assertStatus(200);
    }

    public function test_table_admin_from_database(){
        $this->assertDatabaseHas('admin', [
            'id' => 'INV1655554359',
        ]);
    }

    public function test_tambah_data_admin(){
        $response = $this->followingRedirects()->post('/admin/admin', [
            'admin' => 'admin test',
        ]);
        //redirect to home
        $response->assertStatus(200);
    }
}