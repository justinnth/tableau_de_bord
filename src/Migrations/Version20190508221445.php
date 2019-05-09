<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190508221445 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE evenement_planning (id INT AUTO_INCREMENT NOT NULL, formateur_id INT DEFAULT NULL, begin_at DATETIME NOT NULL, end_at DATETIME DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_5BFF241E155D8F51 (formateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_de_naissance DATE NOT NULL, mail VARCHAR(255) NOT NULL, telephone INT NOT NULL, meilleur_diplome VARCHAR(255) NOT NULL, salarie TINYINT(1) NOT NULL, fonction_actuelle VARCHAR(255) NOT NULL, domaine_expertise LONGTEXT NOT NULL, mode_acquisition LONGTEXT NOT NULL, type_formations LONGTEXT NOT NULL, zone_execution LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', formation_iperia LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_ED767E4F5126AC48 (mail), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(50) NOT NULL, duree INT DEFAULT NULL, reference VARCHAR(10) DEFAULT NULL, pedagogie VARCHAR(100) DEFAULT NULL, public_vise VARCHAR(10) DEFAULT NULL, formateur VARCHAR(10) DEFAULT NULL, prerequis VARCHAR(50) DEFAULT NULL, lieu VARCHAR(20) DEFAULT NULL, cpf TINYINT(1) DEFAULT NULL, photo VARCHAR(10) DEFAULT NULL, lien VARCHAR(10) DEFAULT NULL, facebook VARCHAR(10) DEFAULT NULL, trame_arealiser TINYINT(1) DEFAULT NULL, trame_valider_iperia TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evenement_planning ADD CONSTRAINT FK_5BFF241E155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE evenement_planning DROP FOREIGN KEY FK_5BFF241E155D8F51');
        $this->addSql('DROP TABLE evenement_planning');
        $this->addSql('DROP TABLE formateur');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE user');
    }
}
