<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DtPenjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'id_penjualan' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'id_produk' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'jumlah_produk' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'subtotal' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_detail', true);
        $this->forge->createTable('dt_penjualan');
    }

    public function down()
    {
        $this->forge->dropTable('dt_penjualan', true);
    }
}
