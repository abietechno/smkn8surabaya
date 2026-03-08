<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menu_links', function (Blueprint $table) {
            $table->foreignId('parent_id')->nullable()->after('id')->constrained('menu_links')->cascadeOnDelete();
            $table->text('description')->nullable()->after('url');
            $table->string('icon')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('menu_links', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn(['parent_id', 'description', 'icon']);
        });
    }
};
