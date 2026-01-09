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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('operating_hours');
            $table->string('jakim_ref_no');
            $table->year('expiry_year');
            $table->string('halal_status');
            $table->string('proof_pdf');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
