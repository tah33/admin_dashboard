<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'role_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@site.com',
            'username' => 'admin',
            'phone' => '01836796052',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make(12345678)
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Pharmacist',
            'username' => 'pharmacist',
            'email' => 'pharmacist@site.com',
            'phone' => '01836796051',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make(12345678)
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
