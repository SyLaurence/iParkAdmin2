<?php

use Illuminate\Database\Seeder;

class ParkInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$arrStartDate = array();
    	$arrEndDate = array();
    	$arrPayDate = array();
    	$arrRec = array();
    	for($x = 0; $x < 50; $x++){
    		array_push($arrRec,"DM-00000000".($x+1));
	    	if($x <= 29){
	            array_push($arrStartDate,date("Y-m-d H:i:s",strtotime("now")));
	            array_push($arrEndDate,date("Y-m-d H:i:s",strtotime("+3 hours")));
	            array_push($arrPayDate,date("Y-m-d H:i:s",strtotime("+1 hour")));
	        } else if($x >= 40 && $x <= 49){
	        	array_push($arrStartDate,date("Y-m-d H:i:s",strtotime("+2 days")));
	            array_push($arrEndDate,date("Y-m-d H:i:s",strtotime("+2 days +3 hours")));
	            array_push($arrPayDate,date("Y-m-d H:i:s",strtotime("+1 hour")));
	        } else if($x >= 30 && $x <= 39){
	        	array_push($arrStartDate,date("Y-m-d H:i:s",strtotime("+1 day")));
	            array_push($arrEndDate,date("Y-m-d H:i:s",strtotime("+1 day +3 hours")));
	            array_push($arrPayDate,date("Y-m-d H:i:s",strtotime("+1 hour")));
	        }
	    }
        for($x = 0; $x < 50;$x++){
	        DB::table('park_infos')->insert([
                'id' => $x+1,
                'load_consumed' => '50.00',
                'entryimg' => 'sample.jpg',
                'exitimg' => 'sample.jpg',
                'entryterminal' => 'PLDTent01',
                'exitterminal' => 'PLDText01',
                'receiptnum' => $arrRec[$x],
                'user_info_id' => "syy",
                'created_at' =>  $arrStartDate[$x],
                'updated_at' => $arrEndDate[$x],
                'paydate' => $arrPayDate[$x]
	        ]);
    	}
        DB::table('terminal_infos')->insert([
            'id' => 1,
            'ipadd' => '127.0.0.1',
            'name' => 'PLDTent01',
            'comp_name' => 'teknopc1',
            'loop_status' => 1,
            'type' => 1,
            'created_at' => date("Y-m-d H:i:s",strtotime("now")),
            'updated_at' => date("Y-m-d H:i:s",strtotime("now"))
        ]);
        DB::table('terminal_infos')->insert([
            'id' => 2,
            'ipadd' => '127.0.0.1',
            'name' => 'PLDText01',
            'comp_name' => 'teknopc2',
            'loop_status' => 0,
            'type' => 0,
            'created_at' => date("Y-m-d H:i:s",strtotime("now")),
            'updated_at' => date("Y-m-d H:i:s",strtotime("now"))
        ]);
        DB::table('user_infos')->insert([
            'id' => 1,
            'username' => 'Syy',
            'password' => 'syy',
            'fname' => 'Laurence Ivan',
            'lname' => 'Sy',
            'privilege' => 'Admin',
            'created_at' => date("Y-m-d H:i:s",strtotime("now")),
            'updated_at' => date("Y-m-d H:i:s",strtotime("now"))
        ]);
        DB::table('user_infos')->insert([
            'id' => 2,
            'username' => 'asd',
            'password' => 'asd',
            'fname' => 'Roland',
            'lname' => 'Anyo',
            'privilege' => 'Admin',
            'created_at' => date("Y-m-d H:i:s",strtotime("now")),
            'updated_at' => date("Y-m-d H:i:s",strtotime("now"))
        ]);
    }
}
