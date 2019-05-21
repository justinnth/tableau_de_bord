<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190521145314 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE session_formation (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, begin_at DATETIME NOT NULL, end_at DATETIME NOT NULL, title VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_3A264B55200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_formation_formateur (session_formation_id INT NOT NULL, formateur_id INT NOT NULL, INDEX IDX_103AB5EB9C9D95AF (session_formation_id), INDEX IDX_103AB5EB155D8F51 (formateur_id), PRIMARY KEY(session_formation_id, formateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_formation_assistante_maternelle (session_formation_id INT NOT NULL, assistante_maternelle_id INT NOT NULL, INDEX IDX_E553259F9C9D95AF (session_formation_id), INDEX IDX_E553259FB646A5A3 (assistante_maternelle_id), PRIMARY KEY(session_formation_id, assistante_maternelle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_formation_parent_facilitateur (session_formation_id INT NOT NULL, parent_facilitateur_id INT NOT NULL, INDEX IDX_BDAD26139C9D95AF (session_formation_id), INDEX IDX_BDAD2613D8E370BE (parent_facilitateur_id), PRIMARY KEY(session_formation_id, parent_facilitateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parent_facilitateur (id INT AUTO_INCREMENT NOT NULL, assistante_maternelle_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_5C179D96B646A5A3 (assistante_maternelle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE session_formation ADD CONSTRAINT FK_3A264B55200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE session_formation_formateur ADD CONSTRAINT FK_103AB5EB9C9D95AF FOREIGN KEY (session_formation_id) REFERENCES session_formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_formation_formateur ADD CONSTRAINT FK_103AB5EB155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_formation_assistante_maternelle ADD CONSTRAINT FK_E553259F9C9D95AF FOREIGN KEY (session_formation_id) REFERENCES session_formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_formation_assistante_maternelle ADD CONSTRAINT FK_E553259FB646A5A3 FOREIGN KEY (assistante_maternelle_id) REFERENCES assistante_maternelle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_formation_parent_facilitateur ADD CONSTRAINT FK_BDAD26139C9D95AF FOREIGN KEY (session_formation_id) REFERENCES session_formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_formation_parent_facilitateur ADD CONSTRAINT FK_BDAD2613D8E370BE FOREIGN KEY (parent_facilitateur_id) REFERENCES parent_facilitateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parent_facilitateur ADD CONSTRAINT FK_5C179D96B646A5A3 FOREIGN KEY (assistante_maternelle_id) REFERENCES assistante_maternelle (id)');
        $this->addSql('ALTER TABLE assistante_maternelle ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE session_formation_formateur DROP FOREIGN KEY FK_103AB5EB9C9D95AF');
        $this->addSql('ALTER TABLE session_formation_assistante_maternelle DROP FOREIGN KEY FK_E553259F9C9D95AF');
        $this->addSql('ALTER TABLE session_formation_parent_facilitateur DROP FOREIGN KEY FK_BDAD26139C9D95AF');
        $this->addSql('ALTER TABLE session_formation_parent_facilitateur DROP FOREIGN KEY FK_BDAD2613D8E370BE');
        $this->addSql('DROP TABLE session_formation');
        $this->addSql('DROP TABLE session_formation_formateur');
        $this->addSql('DROP TABLE session_formation_assistante_maternelle');
        $this->addSql('DROP TABLE session_formation_parent_facilitateur');
        $this->addSql('DROP TABLE parent_facilitateur');
        $this->addSql('ALTER TABLE assistante_maternelle DROP created_at, DROP updated_at');
    }
}
