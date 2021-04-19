<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->constrained()->onDelete('cascade');
			$table->foreignId('payment_gateway_id')->constrained()->onDelete('cascade');
			$table->integer('amount');
			$table->string('bank_name')->nullable();
			$table->string('branch_code')->nullable();
			$table->string('account_holder_name')->nullable();
			$table->string('account_iban')->nullable();
			$table->string('reference_number')->nullable();
			$table->string('approved_transaction_id')->nullable();
			$table->boolean('status')->default(0);
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdraws');
    }
}
