<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210331143819 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql(<<<'sql'
            CREATE TABLE search_index (
                id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                page_id INTEGER NOT NULL,
                level INTEGER NOT NULL DEFAULT 0,
                title VARCHAR(255) NOT NULL,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL
           )
        sql);

        $this->addSql(<<<'sql'
            CREATE INDEX IDX_B446A4E8C4663E4 ON search_index (page_id)
        sql);
    }

    public function down(Schema $schema) : void
    {
        $this->addSql(<<<'sql'
            DROP TABLE search_index
        sql);
    }
}
