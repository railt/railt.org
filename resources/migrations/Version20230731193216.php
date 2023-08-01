<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230731193216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create "menu_links" table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE menu_links (
            id UUID NOT NULL,
            menu_id UUID DEFAULT NULL,
            type VARCHAR(255) NOT NULL,
            page_id UUID DEFAULT NULL,
            url VARCHAR(255) NOT NULL,
            title VARCHAR(255) NOT NULL,
            priority SMALLINT NOT NULL CHECK (priority >= 0),
            created_at TIMESTAMP(0) WITH TIME ZONE NOT NULL,
            updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL,
            PRIMARY KEY(id)
        )');

        $this->addSql('CREATE INDEX menu_links_priority_idx ON menu_links (priority ASC NULLS FIRST)');

        $this->addSql('CREATE INDEX IDX_402E827FCCD7E912 ON menu_links (menu_id)');
        $this->addSql('ALTER TABLE menu_links
            ADD CONSTRAINT FK_402E827FCCD7E912 FOREIGN KEY (menu_id)
                REFERENCES menu (id) NOT DEFERRABLE INITIALLY IMMEDIATE');

        $this->addSql('CREATE INDEX IDX_402E827FC4663E4 ON menu_links (page_id)');
        $this->addSql('ALTER TABLE menu_links
            ADD CONSTRAINT FK_402E827FC4663E4 FOREIGN KEY (page_id) 
                REFERENCES documentation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');

        $this->addSql('COMMENT ON COLUMN menu_links.id IS \'(DC2Type:App\\Domain\\Documentation\\Menu\\LinkId)\'');
        $this->addSql('COMMENT ON COLUMN menu_links.menu_id IS \'(DC2Type:App\\Domain\\Documentation\\Menu\\LinkId)\'');
        $this->addSql('COMMENT ON COLUMN menu_links.page_id IS \'(DC2Type:App\\Domain\\Documentation\\PageId)\'');
        $this->addSql('COMMENT ON COLUMN menu_links.created_at IS \'(DC2Type:datetimetz_immutable)\'');
        $this->addSql('COMMENT ON COLUMN menu_links.updated_at IS \'(DC2Type:datetimetz_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX IDX_402E827FCCD7E912');
        $this->addSql('ALTER TABLE menu_links DROP CONSTRAINT FK_402E827FCCD7E912');

        $this->addSql('DROP INDEX menu_links_priority_idx');
        $this->addSql('ALTER TABLE menu_links DROP CONSTRAINT FK_402E827FC4663E4');

        $this->addSql('DROP TABLE menu_links');
    }
}
