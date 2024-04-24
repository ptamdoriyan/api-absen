<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreteDbAbsenSiang extends Migration
{
    public function up()
    {
        //membuat field untuk tabel absen siang
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'finger'       => [
                'type'           => 'int',
                'constraint'     => '8'
            ],
            'date'       => [
                'type'           => 'date'
            ],
            'jam_istirahat' => [
                'type'          => 'int',
                'null'          => true
            ],
            'jam_kembali' => [
                'type'          => 'int',
                'null'          => true
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);
        // Membuat tabel news
        $this->forge->createTable('tb_absen_siang', TRUE);
    }

    public function down()
    {
        // menghapus tabel news
        $this->forge->dropTable('tb_absen_siang');
    }
}
