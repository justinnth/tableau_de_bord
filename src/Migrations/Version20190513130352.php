<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190513130352 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE formateur CHANGE type_formations type_formations LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE evenement_planning ADD formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement_planning ADD CONSTRAINT FK_5BFF241E5200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_5BFF241E5200282E ON evenement_planning (formation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE evenement_planning DROP FOREIGN KEY FK_5BFF241E5200282E');
        $this->addSql('DROP INDEX IDX_5BFF241E5200282E ON evenement_planning');
        $this->addSql('ALTER TABLE evenement_planning DROP formation_id');
        $this->addSql('ALTER TABLE formateur CHANGE type_formations type_formations LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
