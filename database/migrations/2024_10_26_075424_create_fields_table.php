<?php

use App\Models\FieldType;
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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->string('class')->nullable();
            $table->foreignIdFor(FieldType::class);
//            $table->foreignIdFor(\App\Models\Category::class);

            $table->string('placeholder')->nullable();
            $table->string('multiple')->nullable();
            $table->string('required')->nullable();

            $table->string('name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
