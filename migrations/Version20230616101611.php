<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230616101611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__object756 AS SELECT id, nom, description FROM object756');
        $this->addSql('DROP TABLE object756');
        $this->addSql('CREATE TABLE object756 (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, proprietaire_id INTEGER NOT NULL, nom VARCHAR(50) NOT NULL, description CLOB NOT NULL, CONSTRAINT FK_F682EE3376C50E4A FOREIGN KEY (proprietaire_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO object756 (id, nom, description) SELECT id, nom, description FROM __temp__object756');
        $this->addSql('DROP TABLE __temp__object756');
        $this->addSql('CREATE INDEX IDX_F682EE3376C50E4A ON object756 (proprietaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__object756 AS SELECT id, nom, description FROM object756');
        $this->addSql('DROP TABLE object756');
        $this->addSql('CREATE TABLE object756 (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, description CLOB NOT NULL)');
        $this->addSql('INSERT INTO object756 (id, nom, description) SELECT id, nom, description FROM __temp__object756');
        $this->addSql('DROP TABLE __temp__object756');
    }
}
