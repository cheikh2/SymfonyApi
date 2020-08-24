<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200824213303 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE physique DROP FOREIGN KEY FK_9FF928E7A76ED395');
        $this->addSql('DROP INDEX UNIQ_9FF928E7A76ED395 ON physique');
        $this->addSql('ALTER TABLE physique DROP user_id');
        $this->addSql('ALTER TABLE user ADD physique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64953D0E798 FOREIGN KEY (physique_id) REFERENCES physique (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64953D0E798 ON user (physique_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE physique ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE physique ADD CONSTRAINT FK_9FF928E7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9FF928E7A76ED395 ON physique (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64953D0E798');
        $this->addSql('DROP INDEX UNIQ_8D93D64953D0E798 ON user');
        $this->addSql('ALTER TABLE user DROP physique_id');
    }
}
