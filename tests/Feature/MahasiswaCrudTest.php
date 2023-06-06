<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Mahasiswa;
use App\Models\User;

class MahasiswaCrudTest extends TestCase
{
    
    public function test_create_mahasiswa(): void
    {
        $this->actingAs(User::where('role', 'admin')->first());

        $response = $this->get(route('mahasiswa.add'));
        $response->assertStatus(200);
        $response->assertSee('Tambah Data');

        $response = $this->post(route('mahasiswa.create'), [
            'nama' => 'User Testing Belum Update',
            'nim' => '1462100000',
            'alamat' => 'Jl. Jalan',
            'jenis_kelamin' => 'L',
            'fakultas_id' => 1,
            'program_studi_id' => 5
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('mahasiswa.index'));

        $this->assertDatabaseHas('mahasiswa', [
            'nama' => 'User Testing Belum Update',
            'nim' => '1462100000',
            'alamat' => 'Jl. Jalan',
            'jenis_kelamin' => 'L',
            'fakultas_id' => 1,
            'program_studi_id' => 5
        ]);
    }
    
    public function test_update_mahasiswa(): void
    {
        $this->actingAs(User::where('role', 'admin')->first());
        
        $user = Mahasiswa::where('nim', '1462100000')->first();

        $response = $this->get(route('mahasiswa.edit', ['id' => $user->id]));
        $response->assertStatus(200);
        $response->assertSee('Edit Data');
        $response->assertSee($user->nim);
        
        $response = $this->post(route('mahasiswa.update'), [
            'id' => $user->id,
            'nama' => 'User Testing Sudah Update',
            'nim' => '1462100000',
            'alamat' => 'Surabaya',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('mahasiswa.index'));

        $this->assertDatabaseHas('mahasiswa', [
            'nama' => 'User Testing Sudah Update',
            'nim' => '1462100000',
            'alamat' => 'Surabaya',
        ]);
    }

    public function test_delete_mahasiswa(): void
    {
        $this->actingAs(User::where('role', 'admin')->first());

        $user = Mahasiswa::where('nim', '1462100000')->first();

        $response = $this->get(route('mahasiswa.delete', ['id' => $user->id]));

        $response->assertStatus(302);
        $response->assertRedirect(route('mahasiswa.index'));

        $this->assertDatabaseMissing('mahasiswa', [
            'nama' => 'User Testing Sudah Update',
            'nim' => '1462100000',
            'alamat' => 'Surabaya',
            'jenis_kelamin' => 'L',
            'fakultas_id' => 1,
            'program_studi_id' => 5
        ]);
    }
}
