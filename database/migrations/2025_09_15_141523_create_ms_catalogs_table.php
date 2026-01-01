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
        Schema::create('ms_catalogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mscatalog_categorys_id')->nullable()->constrained('ms_catalog_categorys');
            $table->foreignId('mscatalog_groups_id')->nullable()->constrained('ms_catalog_groups');
            $table->string('name')->unique();
            $table->string('sku')->unique();
            $table->longText('description')->nullable();
            $table->unsignedInteger('duration')->default(0);
            $table->unsignedInteger('minstock')->default(0);
            $table->unsignedInteger('maxstock')->default(0);
            $table->unsignedInteger('stock')->default(0);
            $table->foreignId('mscurrencies_id')->nullable()->constrained('ms_currencies');
            $table->decimal('price', 11, 2)->default(0);
            $table->boolean('is_priority')->default(false);
            $table->boolean('is_active')->default(true);
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_catalogs');
    }
};
