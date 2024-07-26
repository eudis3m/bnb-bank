<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('banks', function (Blueprint $table) {
            $table->string('customerId')->primary();
            $table->string('customerName',300);
            $table->string('customerPin');
            $table->string('customerAccountType',300);
            $table->longText('customerAccountNo');
            $table->string('customerAccountBalance',300);
            $table->integer('customerAadhar');
            $table->integer('customerPan');
            $table->integer('customerContac');
            $table->string('customerEmail',300);
            $table->date('updated_at')->nullable();
        });
     

    
            DB::table('banks')->insert(
                [
                  'customerId' => '1234',
                  'customerName' => 'Raju',
                  'customerPin' =>  '9899',
                  'customerAccountType' => 'savings',
                  'customerAccountNo' => 8765678,
                  'customerAccountBalance' =>  '12,450',
                  'customerAadhar' => 1234567,
                  'customerPan' =>  1234567,
                  'customerContac' => 1234567,
                  'customerEmail' => 'raju@email.com'
                ]
              );

              Schema::create('customer_transactions', function (Blueprint $table) {
                $table->increments('id')->primary();
                $table->string('customerId')->foreign()->references('customerId')->on('banks');
                $table->integer('transactionId');
                $table->date('transactionDate');
                $table->integer('transactionAmount');
                $table->string('transactionType',300);
                $table->date('updated_at')->nullable();
            });

              DB::table('customer_transactions')->insert(
                [
                    'customerId' => '1234',
                    'transactionId' =>  1466,
                    'transactionDate' => '2023-02-12',
                    'transactionAmount' => 5500,
                    'transactionType' =>  "debit"
                ]);
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('banks');
        Schema::dropIfExists('customerTransactions');
    }

 
}

;