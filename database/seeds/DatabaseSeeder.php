<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*$this->call(theloaiSeeder::class);*/
        $this->call(loaitinSeeder::class);
    }
}
/**
* 
*/
/*class theloaiSeeder extends Seeder
{
	public function run()
	{
		DB::table('theloai')->insert([
			['ten'=>'Xã Hội','alias'=>'xa-hoi'],
			['ten'=>'Công Nghệ','alias'=>'cong-nghe'],
			]);
	}
}*/
/**
* 
*/
class loaitinSeeder extends Seeder
{
	public function run()
	{
		DB::table('loaitin')->insert([
			['ten'=>'Trong nước','alias'=>'trong-nuoc','idTheloai'=>1,'theloai_id'=>1],
			['ten'=>'Quốc tế','alias'=>'quoc-te','idTheloai'=>1,'theloai_id'=>1],
			]);
	}
}
