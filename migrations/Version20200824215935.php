<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200824215935 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526053D0E798');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D53D0E798');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64953D0E798');
        $this->addSql('DROP TABLE physique');
        $this->addSql('DROP INDEX IDX_CFF6526053D0E798 ON compte');
        $this->addSql('ALTER TABLE compte DROP physique_id');
        $this->addSql('DROP INDEX IDX_1981A66D53D0E798 ON operation');
        $this->addSql('ALTER TABLE operation DROP physique_id');
        $this->addSql('DROP INDEX UNIQ_8D93D64953D0E798 ON user');
        $this->addSql('ALTER TABLE user DROP physique_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE physique (id INT AUTO_INCREMENT NOT NULL, moral_id INT DEFAULT NULL, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adress VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, telephone VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, sexe VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, profession VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, cni VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, salaire VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_9FF928E7597AF0A1 (moral_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE physique ADD CONSTRAINT FK_9FF928E7597AF0A1 FOREIGN KEY (moral_id) REFERENCES moral (id)');
        $this->addSql('ALTER TABLE compte ADD physique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526053D0E798 FOREIGN KEY (physique_id) REFERENCES physique (id)');
        $this->addSql('CREATE INDEX IDX_CFF6526053D0E798 ON compte (physique_id)');
        $this->addSql('ALTER TABLE operation ADD physique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D53D0E798 FOREIGN KEY (physique_id) REFERENCES physique (id)');
        $this->addSql('CREATE INDEX IDX_1981A66D53D0E798 ON operation (physique_id)');
        $this->addSql('ALTER TABLE user ADD physique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64953D0E798 FOREIGN KEY (physique_id) REFERENCES physique (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64953D0E798 ON user (physique_id)');
    }
}
