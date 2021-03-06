<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200824204818 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation ADD moral_id INT DEFAULT NULL, ADD physique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D597AF0A1 FOREIGN KEY (moral_id) REFERENCES moral (id)');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D53D0E798 FOREIGN KEY (physique_id) REFERENCES physique (id)');
        $this->addSql('CREATE INDEX IDX_1981A66D597AF0A1 ON operation (moral_id)');
        $this->addSql('CREATE INDEX IDX_1981A66D53D0E798 ON operation (physique_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D597AF0A1');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D53D0E798');
        $this->addSql('DROP INDEX IDX_1981A66D597AF0A1 ON operation');
        $this->addSql('DROP INDEX IDX_1981A66D53D0E798 ON operation');
        $this->addSql('ALTER TABLE operation DROP moral_id, DROP physique_id');
    }
}
