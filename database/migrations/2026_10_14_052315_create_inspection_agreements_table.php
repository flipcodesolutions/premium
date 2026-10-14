<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inspection_agreements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id')->nullable()->index();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('property_address');
            $table->string('agent_mobile')->nullable();
            $table->string('service_type')->default('Pre-Purchase Inspection Agreement (AS 4349.1-2007 & AS 4349.3-2010)');
            $table->string('agreement_version')->default('AS 4349.1-2007 & AS 4349.3-2010');
            $table->string('status')->default('accepted');
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspection_agreements');
    }
};
