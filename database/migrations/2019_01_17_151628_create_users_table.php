<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('email', 250)->unique()->charset('utf8');
            $table->string('first-name', 250);
            $table->string('second-name', 250);
            $table->string('last-name', 250);
            $table->string('country', 250);
            $table->string('citizenship', 250);
            $table->string('place-of-birth', 250);
            $table->string('mobile', 250);
            $table->string('land-line', 250)->nullable();
            $table->string('address', 250);
            $table->string('city', 250);
            $table->string('zip', 250);
            $table->string('employment', 250);
            $table->string('industry', 250);
            $table->string('annual-income', 250);
            $table->string('savings', 250);
            $table->string('source-of-funds', 250);
            $table->string('trading-frequency', 250);
            $table->string('invest-annually', 250);
            $table->string('funding-method', 250);
            $table->string('name-of-bank', 250)->nullable();
            $table->string('bank-location', 250)->nullable();
            $table->string('credit-card', 250)->nullable();
            $table->string('e-wallet', 250)->nullable();
            $table->string('country-taxes', 250);
            $table->string('tax-id', 250);
            $table->date('date-of-birth');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('role', ['individual', 'business', 'admin']);
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

//        DB::table('users')->insert(
//            array(
//                'email' => 'dummy@sample.com',
//                'login' => 'dummy',
//                'password' => 'you cant login with this',
//                'role' => 'user',
//            )
//        );

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
