<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;


class BabiesControllerTest extends TestCase
{
    use DatabaseMigrations;
    //use WithoutMiddleware;

    /** @test */

    public function a_guest_can_see_babies()
    {
   	

    	$babies = factory(\App\Baby::class,10)->create();    	

    	$response = $this->get(route('all_babies_path',['user_id' => $babies->first()->user_id]));
    
    	$response->assertRedirect(route('login'));


    }

    /** @test */

    public function LoginUserCanOnlyShowHisBabies()
    {   	

    	$babies = factory(\App\Baby::class,2)->create();    	   	    

    	Auth::loginUsingId(1);
    	//\App\Auth::loginUsingId($user2->id);

    	$response = $this->get(route('show_baby_path',['baby' => $babies->where('user_id',2)->first()->id]));

    	$response->assertStatus(302);
    }

    /** @test */


    public function CanCreateBaby()
    {
    	$user = factory(\App\User::class)->create();

    	Auth::loginUsingId($user->id);
   		dump(csrf_token());
    	$response = $this->post(route('create_baby_path'), [
    		'name' => 'Jesus',
    		'genre' => 'male',
    		'city' => 'Madrid',
    		'user_id' => 1,
    		'birthdate' => '01-01-2010',
    		'baby_photo' => 'hola.jpg',
    		'_token' => csrf_token(), 
    		]);

    	//dd($response);

    	$this->assertSame(\App\Baby::count(),1);
    }
  
}
