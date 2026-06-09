<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barangs', function (Blueprint $table) {

            $table->string('satuan')->nullable()->after('stok');

            $table->integer('stok_minimum')
                ->default(10)
                ->after('satuan');

            $table->bigInteger('harga_beli')
                ->nullable()
                ->after('harga');

        });
    }

    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {

            $table->dropColumn([
                'satuan',
                'stok_minimum',
                'harga_beli'
            ]);

        });
    }
};
