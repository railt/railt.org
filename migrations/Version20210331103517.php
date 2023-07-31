<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210331103517 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Creation documentation table';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql(<<<'sql'
            CREATE TABLE documentation (
                id UUID NOT NULL,
                title VARCHAR(255) NOT NULL,
                url VARCHAR(255) NOT NULL,
                content TEXT NOT NULL DEFAULT '',
                created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL,
                updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL,
                PRIMARY KEY(id)
           )
        sql);
    }

    public function down(Schema $schema) : void
    {
        $this->addSql(<<<'sql'
            DROP TABLE documentation
        sql);
    }
}
