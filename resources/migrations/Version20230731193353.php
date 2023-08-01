<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230731193353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create "search_index" table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE search_index (
            id UUID NOT NULL,
            page_id UUID NOT NULL,
            title VARCHAR(255) NOT NULL,
            level INT NOT NULL,
            created_at TIMESTAMP(0) WITH TIME ZONE NOT NULL,
            updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL,
            PRIMARY KEY(id)
        )');

        $this->addSql('CREATE INDEX IDX_B446A4E8C4663E4 ON search_index (page_id)');
        $this->addSql('ALTER TABLE search_index 
            ADD CONSTRAINT FK_B446A4E8C4663E4 FOREIGN KEY (page_id) 
                REFERENCES documentation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');

        $this->addSql('COMMENT ON COLUMN search_index.id IS \'(DC2Type:App\\Domain\\Search\\IndexId)\'');
        $this->addSql('COMMENT ON COLUMN search_index.page_id IS \'(DC2Type:App\\Domain\\Documentation\\PageId)\'');
        $this->addSql('COMMENT ON COLUMN search_index.created_at IS \'(DC2Type:datetimetz_immutable)\'');
        $this->addSql('COMMENT ON COLUMN search_index.updated_at IS \'(DC2Type:datetimetz_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE search_index DROP CONSTRAINT FK_B446A4E8C4663E4');
        $this->addSql('DROP TABLE search_index');
    }
}
