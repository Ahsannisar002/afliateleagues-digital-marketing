<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_memberships', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->constrained()->onDelete('cascade');
			$table->foreignId('membership_id')->constrained()->onDelete('cascade');
			$table->foreignId('payment_gateway_id')->constrained()->onDelete('cascade');
			$table->boolean('status')->default('0');
			$table->string('transaction_id');
			$table->string('rejectionReason')->nullable();
			$table->integer('transaction_amount');
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
        Schema::dropIfExists('pending_memberships');
    }
}
