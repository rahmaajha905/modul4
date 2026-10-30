<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Ganti nama kolom hanya jika masih menggunakan nama lama
        if (Schema::hasColumn('laporan', 'tinggi_air')) {
            Schema::table('laporan', function (Blueprint $table) {
                $table->renameColumn('tinggi_air', 'tinggi_genangan');
            });
        }

        // Tambahkan tanggal kejadian jika belum tersedia
        if (!Schema::hasColumn('laporan', 'tanggal_kejadian')) {
            Schema::table('laporan', function (Blueprint $table) {
                $table->date('tanggal_kejadian')->nullable();
            });
        }

        // Jadikan keterangan dan foto boleh kosong
        DB::statement('ALTER TABLE laporan MODIFY keterangan TEXT NULL');
        DB::statement('ALTER TABLE laporan MODIFY foto VARCHAR(255) NULL');
    }

    public function down(): void
    {
        // Tidak menghapus data atau mengembalikan perubahan kolom
    }
};
