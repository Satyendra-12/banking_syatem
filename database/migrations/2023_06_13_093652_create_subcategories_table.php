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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('sub_category_name');
            $table->string('sub_category_photo')->nullable();
            $table->string('sub_category_icon')->nullable();
            $table->bigInteger('created_by')->nullable()->unsigned();
            $table->string('slug')->nullable();
            $table->string('type')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 for inactive , 1 for active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
