<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190522144652 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE evenement_planning');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE evenement_planning (id INT AUTO_INCREMENT NOT NULL, formateur_id INT DEFAULT NULL, formation_id INT DEFAULT NULL, begin_at DATETIME NOT NULL, end_at DATETIME DEFAULT NULL, title VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_5BFF241E5200282E (formation_id), INDEX IDX_5BFF241E155D8F51 (formateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE evenement_planning ADD CONSTRAINT FK_5BFF241E155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id)');
        $this->addSql('ALTER TABLE evenement_planning ADD CONSTRAINT FK_5BFF241E5200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
    }
}
