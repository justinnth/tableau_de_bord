<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190509101757 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE formation CHANGE titre titre VARCHAR(255) NOT NULL, CHANGE reference reference VARCHAR(255) DEFAULT NULL, CHANGE pedagogie pedagogie VARCHAR(255) DEFAULT NULL, CHANGE public_vise public_vise VARCHAR(255) DEFAULT NULL, CHANGE formateur formateur VARCHAR(255) DEFAULT NULL, CHANGE prerequis prerequis VARCHAR(255) DEFAULT NULL, CHANGE lieu lieu VARCHAR(255) DEFAULT NULL, CHANGE photo photo VARCHAR(255) DEFAULT NULL, CHANGE lien lien VARCHAR(255) DEFAULT NULL, CHANGE facebook facebook VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE formation CHANGE titre titre VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE reference reference VARCHAR(10) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE pedagogie pedagogie VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE public_vise public_vise VARCHAR(10) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE formateur formateur VARCHAR(10) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE prerequis prerequis VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE lieu lieu VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE photo photo VARCHAR(10) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE lien lien VARCHAR(10) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE facebook facebook VARCHAR(10) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
