<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\User;
class DonationAppealTest extends TestCase
{
    
    // public function test_store_donation_appeal()
    // {
    //     $user = User::where('id' , 32)->first();
    //     $response = $this->actingAs($user)->postJson('/api/appeals' , [
    //         'user_id' => 32 , 
    //         'name' => "osid2023",
    //         'blood_type' => "A+" , 
    //         'location' => "Dair al balah" , 
    //         'phone_number' => '0599608424' , 
    //         'id_number' => '111111111' ,
    //         'description' => 'We need blood group form A+ type quickly'
    //     ]);
    //     $response->assertStatus(201);

    // }


    // public function test_view_donation_appeals()
    // {
    //     $user = User::where('id' , 32)->first();
    //     $response = $this->actingAs($user)->getJson('api/appeals');
    //     $response->assertStatus(200);
    // }

    // public function test_view_all_donation_appeals()
    // {
    //  //   $user = User::where('id' , 32)->first();
    //   $response = $this->getJson('/api/public-appeals');
    //   $response->assertStatus(200);
    // }

    public function test_update_specific_donation_appeal()
    {
      $user = User::where('id' , 32)->first();
      $response = $this->actingAs($user)->putJson('/api/appeals/'. 10 , [
            'user_id' => 32 , 
            'name' => "khaled",
            'blood_type' => "B+" , 
            'location' => "Gaza" , 
            'phone_number' => '0599608424' , 
            'description' => 'We need blood group form B+ type quickly'
      ]);
      $response->assertStatus(201);
    }
}
