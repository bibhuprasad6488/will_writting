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
        Schema::table('our_stories', function (Blueprint $table) {
            $table->string('page_title')->after('id')->default('Our Story');
            $table->string('banner_image')->nullable()->after('page_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('our_stories', function (Blueprint $table) {
            $table->dropColumn(['page_title', 'banner_image']);
        });
    }
};
