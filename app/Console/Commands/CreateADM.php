<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateADM extends Command
{
    protected $signature = 'createadm';

    protected $description = 'Create a ADM';

    public function handle()
    {
        $admin = new User;
        $admin->email = 'adm@adm.com';
        $admin->name = 'Admin';
        $admin->password = Hash::make('admin123');
        $admin->save();
    }
}
