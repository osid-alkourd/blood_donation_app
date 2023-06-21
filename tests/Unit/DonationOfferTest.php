<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use App\Models\User;
use Tests\TestCase;
class DonationOfferTest extends TestCase
{
  
    public function test_store_donation_offer()
    {
        $user = User::where('id' , 32)->first();
        $response = $this->actingAs($user)->postJson('/api/donations' , [
            'user_id' => 32 , 
            'name' => "osid2023",
            'blood_type' => "A+" , 
            'location' => "Dair al balah" , 
            'weight' => 70, 
            'age' => 22 , 
            'phone_number' => '0599608424' , 
            'id_number' => '111111111' ,
        ]);

        $response->assertStatus(201);
    }

    public function test_store_another_donation_offer()
    {
        $user = User::where('id' , 32)->first();
        $response = $this->actingAs($user)->postJson('/api/donations' , [
            'user_id' => 32 , 
            'name' => "osid2023",
            'blood_type' => "A+" , 
            'location' => "Dair al balah" , 
            'weight' => 70, 
            'age' => 22 , 
            'phone_number' => '0599608424' , 
            'id_number' => '111111111' ,
        ]);

        $response->assertStatus(201);
    }
}
