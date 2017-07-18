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
   		//echo env('')
    	$response = $this->post(route('create_baby_path'), [
    		'name' => 'Jesus',
    		'genre' => 'male',
    		'city' => 'Madrid',
    		'user_id' => 1,
    		'birthdate' => '01-01-2010',
    		'baby_photo' => UploadedFile::fake()->image('my_image.jpg'),    		
    		]);

    	//dd($response);

    	$this->assertSame(\App\Baby::count(),1);
    }

    /** @test */


    public function CanDeleteBaby()
    {
    	$baby = factory(\App\Baby::class)->create();    	

    	Auth::loginUsingId($baby->user_id);

    	$response = $this->delete(route('delete_baby_path',[
    		'baby' => $baby->id,
    		]));

    	$this->assertSame(0,\App\Baby::count());

    	$response->assertRedirect(route('all_babies_path'));

    }

    /** @test */

    public function CantDeleteBabyNotYour()
    {
    	$babies = factory(\App\Baby::class,2)->create(); //baby 1 user_id 1 | baby 2 user_id 2

    	
    	Auth::loginUsingId(1);

    	$response = $this->delete(route('delete_baby_path',[
    		'baby' => 2
    		]));

    	$this->assertSame(\App\Baby::count(),2);
    	$response->assertRedirect(route('all_babies_path'));
    }
  
}
