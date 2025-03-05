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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->longText('short_description')->nullable();
            $table->enum('verfied_at',[0,1])->comment('1 for verfied,0 for unverfied');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable(); 
            $table->string('phone_number')->nullable()->unique();     
            $table->decimal('latitude',10,8)->nullable();
            $table->decimal('longitude',11,8)->nullable();        
            $table->string('type')->default(0)->comment('0 for free , 1 for paid');
            $table->tinyInteger('status')->default(1)->comment('0 for inactive , 1 for active');
            $table->bigInteger('created_by')->nullable()->unsigned();
            $table->softDeletes();
            $table->timestamps();            
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
