<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200825150239 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526053D0E798');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260597AF0A1');
        $this->addSql('DROP INDEX IDX_CFF6526053D0E798 ON compte');
        $this->addSql('DROP INDEX IDX_CFF65260597AF0A1 ON compte');
        $this->addSql('ALTER TABLE compte DROP moral_id, DROP physique_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte ADD moral_id INT DEFAULT NULL, ADD physique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526053D0E798 FOREIGN KEY (physique_id) REFERENCES physique (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260597AF0A1 FOREIGN KEY (moral_id) REFERENCES moral (id)');
        $this->addSql('CREATE INDEX IDX_CFF6526053D0E798 ON compte (physique_id)');
        $this->addSql('CREATE INDEX IDX_CFF65260597AF0A1 ON compte (moral_id)');
    }
}
