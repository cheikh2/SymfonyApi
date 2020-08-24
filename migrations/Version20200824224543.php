<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200824224543 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE physique (id INT AUTO_INCREMENT NOT NULL, moral_id INT DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, telephone VARCHAR(20) DEFAULT NULL, sexe VARCHAR(20) NOT NULL, profession VARCHAR(255) DEFAULT NULL, cni VARCHAR(20) NOT NULL, salaire VARCHAR(255) DEFAULT NULL, INDEX IDX_9FF928E7597AF0A1 (moral_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE physique ADD CONSTRAINT FK_9FF928E7597AF0A1 FOREIGN KEY (moral_id) REFERENCES moral (id)');
        $this->addSql('ALTER TABLE compte ADD physique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526053D0E798 FOREIGN KEY (physique_id) REFERENCES physique (id)');
        $this->addSql('CREATE INDEX IDX_CFF6526053D0E798 ON compte (physique_id)');
        $this->addSql('ALTER TABLE operation ADD physique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D53D0E798 FOREIGN KEY (physique_id) REFERENCES physique (id)');
        $this->addSql('CREATE INDEX IDX_1981A66D53D0E798 ON operation (physique_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526053D0E798');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D53D0E798');
        $this->addSql('DROP TABLE physique');
        $this->addSql('DROP INDEX IDX_CFF6526053D0E798 ON compte');
        $this->addSql('ALTER TABLE compte DROP physique_id');
        $this->addSql('DROP INDEX IDX_1981A66D53D0E798 ON operation');
        $this->addSql('ALTER TABLE operation DROP physique_id');
    }
}
