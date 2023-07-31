<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210331143819 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Creation search_index table';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql(<<<'sql'
            CREATE TABLE search_index (
                id UUID NOT NULL,
                page_id UUID NOT NULL,
                level INTEGER NOT NULL DEFAULT 0,
                title VARCHAR(255) NOT NULL,
                created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL,
                updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL,
                PRIMARY KEY(id)
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
