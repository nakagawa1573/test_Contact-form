<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Database\Factories\ContactFactory;

class ContentTest extends TestCase
{
    use RefreshDatabase;

    public function testHello()
    {
        Schema::disableForeignKeyConstraints();

        $contact = Contact::factory()->create([
            'first_name' => '山田',
            'last_name' => '太郎',
            'category_id' => '5',
            'gender' => '1',
            'email' => 'test@test.com',
            'tell' => '09012345678',
            'address' => '岐阜県',
            'building' => 'マンション',
            'building' => 'test',
    ]);
        
        Schema::enableForeignKeyConstraints();

        // $this->assertDatabaseHas('contacts', [
        //     'first_name' => '山田',
        //     'last_name' => '太郎',
        //     'category_id' => '5',
        //     'gender' => '1',
        //     'email' => 'test@test.com',
        //     'tell' => '09012345678',
        //     'address' => '岐阜県',
        //     'building' => 'マンション',
        //     'building' => 'test',
        // ]);
    }
}
