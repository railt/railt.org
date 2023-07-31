<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210331082854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creation menu table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'sql'
            CREATE TABLE menu (
                id UUID NOT NULL,
                parent_id UUID DEFAULT NULL,
                title VARCHAR(255) NOT NULL,
                url VARCHAR(255) DEFAULT NULL,
                priority INTEGER DEFAULT 0,
                created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL,
                updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL,
                PRIMARY KEY(id)
            )
        sql);

        $this->addSql(<<<'sql'
            CREATE INDEX IDX_7D053A93727ACA70 ON menu (parent_id)
        sql);
    }

    public function down(Schema $schema): void
    {
        $this->addSql(<<<'sql'
            DROP TABLE menu
        sql);
    }
}
