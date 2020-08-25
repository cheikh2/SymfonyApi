<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200825120548 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66DF2C56620');
        $this->addSql('DROP INDEX IDX_1981A66DF2C56620 ON operation');
        $this->addSql('ALTER TABLE operation DROP compte_id');
        $this->addSql('ALTER TABLE physique DROP FOREIGN KEY FK_9FF928E7A76ED395');
        $this->addSql('DROP INDEX IDX_9FF928E7A76ED395 ON physique');
        $this->addSql('ALTER TABLE physique DROP user_id, DROP username, DROP password, DROP roles');
        $this->addSql('ALTER TABLE user ADD moral_id INT DEFAULT NULL, ADD physique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649597AF0A1 FOREIGN KEY (moral_id) REFERENCES moral (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64953D0E798 FOREIGN KEY (physique_id) REFERENCES physique (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649597AF0A1 ON user (moral_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64953D0E798 ON user (physique_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation ADD compte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66DF2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('CREATE INDEX IDX_1981A66DF2C56620 ON operation (compte_id)');
        $this->addSql('ALTER TABLE physique ADD user_id INT DEFAULT NULL, ADD username VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD roles JSON NOT NULL');
        $this->addSql('ALTER TABLE physique ADD CONSTRAINT FK_9FF928E7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9FF928E7A76ED395 ON physique (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649597AF0A1');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64953D0E798');
        $this->addSql('DROP INDEX UNIQ_8D93D649597AF0A1 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D64953D0E798 ON user');
        $this->addSql('ALTER TABLE user DROP moral_id, DROP physique_id');
    }
}
