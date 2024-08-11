<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbSubmateri extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel news
        $this->forge->addField([
            'id_submateri'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'sub_materi'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'penjelasan' => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        // Membuat primary key
        $this->forge->addKey('id_submateri', TRUE);

        // Membuat tabel news
        $this->forge->createTable('tb_submateri', TRUE);
    }

    public function down()
    {
        // menghapus tabel news
		$this->forge->dropTable('tb_submateri');
    }
}
