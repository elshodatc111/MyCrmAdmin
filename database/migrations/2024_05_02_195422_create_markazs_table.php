<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('markazs', function (Blueprint $table) {
            $table->id();
            $table->string('markaz');
            $table->string('drektor');
            $table->integer('phone');
            $table->string('link');
            $table->timestamps();
        });
    }
    public function down(): void{
        Schema::dropIfExists('markazs');
    }
};
