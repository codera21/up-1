<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use User;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @throws \Exception
     */
    public function user_full_name()
    {
        /*$this->assertTrue(true);*/
        $user = User::create([
            'first_name' => 'ashish',
            'last_name'=>'bhandari',
            'email'=>'ashish@gmail.com'
        ]);
        $this->assertEquals('ashish',$user->first_name);
    }
}
