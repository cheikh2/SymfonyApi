<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200825105216 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE physique ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE physique ADD CONSTRAINT FK_9FF928E7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9FF928E7A76ED395 ON physique (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE physique DROP FOREIGN KEY FK_9FF928E7A76ED395');
        $this->addSql('DROP INDEX IDX_9FF928E7A76ED395 ON physique');
        $this->addSql('ALTER TABLE physique DROP user_id');
    }
}
