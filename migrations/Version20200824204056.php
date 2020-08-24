<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200824204056 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, moral_id INT DEFAULT NULL, physique_id INT DEFAULT NULL, typecompte_id INT DEFAULT NULL, user_id INT DEFAULT NULL, num_agence VARCHAR(255) NOT NULL, num_compte VARCHAR(255) NOT NULL, rib VARCHAR(255) DEFAULT NULL, montant VARCHAR(255) DEFAULT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, INDEX IDX_CFF65260597AF0A1 (moral_id), INDEX IDX_CFF6526053D0E798 (physique_id), INDEX IDX_CFF6526011FA04BC (typecompte_id), INDEX IDX_CFF65260A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moral (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom_empl VARCHAR(255) NOT NULL, ninea VARCHAR(255) DEFAULT NULL, rc VARCHAR(255) DEFAULT NULL, raison_social VARCHAR(255) DEFAULT NULL, adress_empl VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_AB52681FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation (id INT AUTO_INCREMENT NOT NULL, montant VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE physique (id INT AUTO_INCREMENT NOT NULL, moral_id INT DEFAULT NULL, user_id INT DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, telephone VARCHAR(20) DEFAULT NULL, sexe VARCHAR(20) NOT NULL, profession VARCHAR(255) DEFAULT NULL, cni VARCHAR(20) NOT NULL, salaire VARCHAR(255) DEFAULT NULL, INDEX IDX_9FF928E7597AF0A1 (moral_id), UNIQUE INDEX UNIQ_9FF928E7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typecompte (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260597AF0A1 FOREIGN KEY (moral_id) REFERENCES moral (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526053D0E798 FOREIGN KEY (physique_id) REFERENCES physique (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526011FA04BC FOREIGN KEY (typecompte_id) REFERENCES typecompte (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE moral ADD CONSTRAINT FK_AB52681FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE physique ADD CONSTRAINT FK_9FF928E7597AF0A1 FOREIGN KEY (moral_id) REFERENCES moral (id)');
        $this->addSql('ALTER TABLE physique ADD CONSTRAINT FK_9FF928E7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260597AF0A1');
        $this->addSql('ALTER TABLE physique DROP FOREIGN KEY FK_9FF928E7597AF0A1');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526053D0E798');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526011FA04BC');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260A76ED395');
        $this->addSql('ALTER TABLE moral DROP FOREIGN KEY FK_AB52681FA76ED395');
        $this->addSql('ALTER TABLE physique DROP FOREIGN KEY FK_9FF928E7A76ED395');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE moral');
        $this->addSql('DROP TABLE operation');
        $this->addSql('DROP TABLE physique');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE typecompte');
        $this->addSql('DROP TABLE user');
    }
}
