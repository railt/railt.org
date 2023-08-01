<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230731193008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create "menu" table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE menu (
            id UUID NOT NULL,
            title VARCHAR(255) NOT NULL,
            priority SMALLINT NOT NULL CHECK (priority >= 0),
            created_at TIMESTAMP(0) WITH TIME ZONE NOT NULL,
            updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL,
            PRIMARY KEY(id)
        )');

        $this->addSql('CREATE INDEX menu_priority_idx ON menu (priority ASC NULLS FIRST)');

        $this->addSql('COMMENT ON COLUMN menu.id IS \'(DC2Type:App\\Domain\\Documentation\\MenuId)\'');
        $this->addSql('COMMENT ON COLUMN menu.created_at IS \'(DC2Type:datetimetz_immutable)\'');
        $this->addSql('COMMENT ON COLUMN menu.updated_at IS \'(DC2Type:datetimetz_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX menu_priority_idx');
        $this->addSql('DROP TABLE menu');
    }
}
