<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbMateri extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_materi'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'materi'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'penjelasan' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
            'code' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        // Membuat primary key
        $this->forge->addKey('id_materi', TRUE);

        // Membuat tabel news
        $this->forge->createTable('tb_materi', TRUE);
    }

    public function down()
    {
        // menghapus tabel news
		$this->forge->dropTable('tb_materi');
    }
}
