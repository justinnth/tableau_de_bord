<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190523134617 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE assistante_maternelle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone1 VARCHAR(255) NOT NULL, telephone2 VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) NOT NULL, adresse_postale VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, nom_jeune_fille VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_de_naissance DATE NOT NULL, mail VARCHAR(255) NOT NULL, telephone INT NOT NULL, meilleur_diplome VARCHAR(255) NOT NULL, salarie TINYINT(1) NOT NULL, fonction_actuelle VARCHAR(255) NOT NULL, domaine_expertise LONGTEXT NOT NULL, mode_acquisition LONGTEXT NOT NULL, type_formations LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', zone_execution LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', formation_iperia LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_ED767E4F5126AC48 (mail), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, duree INT DEFAULT NULL, reference VARCHAR(255) DEFAULT NULL, pedagogie VARCHAR(255) DEFAULT NULL, public_vise VARCHAR(255) DEFAULT NULL, prerequis VARCHAR(255) DEFAULT NULL, lieu VARCHAR(255) DEFAULT NULL, cpf TINYINT(1) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, lien VARCHAR(255) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, trame_arealiser TINYINT(1) DEFAULT NULL, trame_valider_iperia TINYINT(1) DEFAULT NULL, numero_cpf INT DEFAULT NULL, theme VARCHAR(255) DEFAULT NULL, descriptif TEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_formateur (formation_id INT NOT NULL, formateur_id INT NOT NULL, INDEX IDX_270B2E925200282E (formation_id), INDEX IDX_270B2E92155D8F51 (formateur_id), PRIMARY KEY(formation_id, formateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parent_facilitateur (id INT AUTO_INCREMENT NOT NULL, assistante_maternelle_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_5C179D96B646A5A3 (assistante_maternelle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_formation (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, begin_at DATETIME NOT NULL, end_at DATETIME NOT NULL, title VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_3A264B55200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_formation_formateur (session_formation_id INT NOT NULL, formateur_id INT NOT NULL, INDEX IDX_103AB5EB9C9D95AF (session_formation_id), INDEX IDX_103AB5EB155D8F51 (formateur_id), PRIMARY KEY(session_formation_id, formateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_formation_assistante_maternelle (session_formation_id INT NOT NULL, assistante_maternelle_id INT NOT NULL, INDEX IDX_E553259F9C9D95AF (session_formation_id), INDEX IDX_E553259FB646A5A3 (assistante_maternelle_id), PRIMARY KEY(session_formation_id, assistante_maternelle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_formation_parent_facilitateur (session_formation_id INT NOT NULL, parent_facilitateur_id INT NOT NULL, INDEX IDX_BDAD26139C9D95AF (session_formation_id), INDEX IDX_BDAD2613D8E370BE (parent_facilitateur_id), PRIMARY KEY(session_formation_id, parent_facilitateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation_formateur ADD CONSTRAINT FK_270B2E925200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_formateur ADD CONSTRAINT FK_270B2E92155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parent_facilitateur ADD CONSTRAINT FK_5C179D96B646A5A3 FOREIGN KEY (assistante_maternelle_id) REFERENCES assistante_maternelle (id)');
        $this->addSql('ALTER TABLE session_formation ADD CONSTRAINT FK_3A264B55200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE session_formation_formateur ADD CONSTRAINT FK_103AB5EB9C9D95AF FOREIGN KEY (session_formation_id) REFERENCES session_formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_formation_formateur ADD CONSTRAINT FK_103AB5EB155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_formation_assistante_maternelle ADD CONSTRAINT FK_E553259F9C9D95AF FOREIGN KEY (session_formation_id) REFERENCES session_formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_formation_assistante_maternelle ADD CONSTRAINT FK_E553259FB646A5A3 FOREIGN KEY (assistante_maternelle_id) REFERENCES assistante_maternelle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_formation_parent_facilitateur ADD CONSTRAINT FK_BDAD26139C9D95AF FOREIGN KEY (session_formation_id) REFERENCES session_formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_formation_parent_facilitateur ADD CONSTRAINT FK_BDAD2613D8E370BE FOREIGN KEY (parent_facilitateur_id) REFERENCES parent_facilitateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE parent_facilitateur DROP FOREIGN KEY FK_5C179D96B646A5A3');
        $this->addSql('ALTER TABLE session_formation_assistante_maternelle DROP FOREIGN KEY FK_E553259FB646A5A3');
        $this->addSql('ALTER TABLE formation_formateur DROP FOREIGN KEY FK_270B2E92155D8F51');
        $this->addSql('ALTER TABLE session_formation_formateur DROP FOREIGN KEY FK_103AB5EB155D8F51');
        $this->addSql('ALTER TABLE formation_formateur DROP FOREIGN KEY FK_270B2E925200282E');
        $this->addSql('ALTER TABLE session_formation DROP FOREIGN KEY FK_3A264B55200282E');
        $this->addSql('ALTER TABLE session_formation_parent_facilitateur DROP FOREIGN KEY FK_BDAD2613D8E370BE');
        $this->addSql('ALTER TABLE session_formation_formateur DROP FOREIGN KEY FK_103AB5EB9C9D95AF');
        $this->addSql('ALTER TABLE session_formation_assistante_maternelle DROP FOREIGN KEY FK_E553259F9C9D95AF');
        $this->addSql('ALTER TABLE session_formation_parent_facilitateur DROP FOREIGN KEY FK_BDAD26139C9D95AF');
        $this->addSql('DROP TABLE assistante_maternelle');
        $this->addSql('DROP TABLE formateur');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE formation_formateur');
        $this->addSql('DROP TABLE parent_facilitateur');
        $this->addSql('DROP TABLE session_formation');
        $this->addSql('DROP TABLE session_formation_formateur');
        $this->addSql('DROP TABLE session_formation_assistante_maternelle');
        $this->addSql('DROP TABLE session_formation_parent_facilitateur');
        $this->addSql('DROP TABLE user');
    }
}
