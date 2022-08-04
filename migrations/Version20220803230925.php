<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220803230925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pizza (
            id INT AUTO_INCREMENT NOT NULL,
            name VARCHAR(255) NOT NULL,
            price INT NOT NULL, 
            size INT NOT NULL, 
            vegan TINYINT(1) DEFAULT 0 NOT NULL, 
            vegetarian TINYINT(1) DEFAULT 0 NOT NULL, 
            glutenfree TINYINT(1) DEFAULT 0 NOT NULL, 
            spicy TINYINT(1) DEFAULT 0 NOT NULL, 
            sweet TINYINT(1) DEFAULT 0 NOT NULL, 
            UNIQUE INDEX UNIQ_CFDD826F5E237E06 (name), 
            PRIMARY KEY(id)
        )
        DEFAULT CHARACTER SET utf8mb4 
        COLLATE `utf8mb4_unicode_ci` 
        ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pizza');
    }
}
