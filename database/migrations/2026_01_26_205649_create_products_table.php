<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->decimal('price', 10, 2);

            $table->text('description')->nullable();

            // دیتای اجباری
            $table->json('data');

            $table->string('color', 50)->nullable();

            $table->unsignedInteger('amount')->default(0);

            // درصد تخفیف
            $table->unsignedInteger('off')->nullable()
                  ->comment('discount percentage');

            $table->enum('type', [
                'labtopkeys',
                'mobilekeys',
                'watchkeys',
                'airpadkeys'
            ]);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
