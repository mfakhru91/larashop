<?php

use Illuminate\Database\Seeder;

class Administratorseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = "administrator";
        $administrator->name = "Site Administrator";
        $administrator->email = "administrator@larashop.test";
        $administrator->roles = json_encode("ADMIN");
        $administrator->password = \Hash::make("larashop");
        $administrator->avatar = "saat-ini-tidak-ada-file.png";
        $administrator->address = "Karangnangka, Pagentan, Banjarneagara";

        $administrator->save();

        $this->command->info("user admin berhasil di insert");
    }
}
