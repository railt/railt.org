<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230731191723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create "documentation" table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE documentation (
            id UUID NOT NULL,
            title VARCHAR(255) NOT NULL,
            url VARCHAR(255) NOT NULL,
            content_source TEXT NOT NULL DEFAULT \'\',
            content_rendered TEXT DEFAULT NULL,
            created_at TIMESTAMP(0) WITH TIME ZONE NOT NULL,
            updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL,
            PRIMARY KEY(id)
        )');

        $this->addSql('CREATE INDEX documentation_url_idx ON documentation (url)');

        $this->addSql('COMMENT ON COLUMN documentation.id IS \'(DC2Type:App\\Domain\\Documentation\\PageId)\'');
        $this->addSql('COMMENT ON COLUMN documentation.created_at IS \'(DC2Type:datetimetz_immutable)\'');
        $this->addSql('COMMENT ON COLUMN documentation.updated_at IS \'(DC2Type:datetimetz_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX documentation_url_idx');
        $this->addSql('DROP TABLE documentation');
    }
}
