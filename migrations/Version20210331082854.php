<?php

/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210331082854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'sql'
            CREATE TABLE menu (
                id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
                parent_id INTEGER DEFAULT NULL, 
                title VARCHAR(255) NOT NULL, 
                url VARCHAR(255) DEFAULT NULL,
                priority INTEGER DEFAULT 0,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL
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
