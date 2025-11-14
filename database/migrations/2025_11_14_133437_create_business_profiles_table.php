<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('business_name');
            $table->string('whatsapp');
            $table->string('city');
            $table->string('business_logo')->nullable(); 
            $table->string('state', 50);
            $table->string('zip_code', 100);
            $table->string('address_line_1', 100);
            $table->string('business_number');
            $table->string('business_email', 100);
            $table->string('company_website', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_profiles');
    }
};
