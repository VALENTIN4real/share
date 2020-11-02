<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201006074842 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fichier (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, nom VARCHAR(50) NOT NULL, date DATETIME NOT NULL, extension VARCHAR(10) NOT NULL, taille DOUBLE PRECISION NOT NULL, INDEX IDX_9B76551FFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE telechargement (id INT AUTO_INCREMENT NOT NULL, fichier_id INT DEFAULT NULL, nb INT NOT NULL, INDEX IDX_E8C7D809F915CFE (fichier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, telechargement_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, datenaissance DATETIME NOT NULL, dateinscription DATETIME NOT NULL, INDEX IDX_1D1C63B32571E653 (telechargement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fichier_theme (fichier_id INT NOT NULL, theme_id INT NOT NULL, INDEX IDX_A02C5330F915CFE (fichier_id), INDEX IDX_A02C533059027487 (theme_id), PRIMARY KEY(fichier_id, theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, subject VARCHAR(50) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fichier ADD CONSTRAINT FK_9B76551FFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE telechargement ADD CONSTRAINT FK_E8C7D809F915CFE FOREIGN KEY (fichier_id) REFERENCES fichier (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B32571E653 FOREIGN KEY (telechargement_id) REFERENCES telechargement (id)');
        $this->addSql('ALTER TABLE fichier_theme ADD CONSTRAINT FK_A02C5330F915CFE FOREIGN KEY (fichier_id) REFERENCES fichier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fichier_theme ADD CONSTRAINT FK_A02C533059027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fichier_theme DROP FOREIGN KEY FK_A02C5330F915CFE');
        $this->addSql('ALTER TABLE telechargement DROP FOREIGN KEY FK_E8C7D809F915CFE');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B32571E653');
        $this->addSql('ALTER TABLE fichier_theme DROP FOREIGN KEY FK_A02C533059027487');
        $this->addSql('ALTER TABLE fichier DROP FOREIGN KEY FK_9B76551FFB88E14F');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE fichier');
        $this->addSql('DROP TABLE fichier_theme');
        $this->addSql('DROP TABLE telechargement');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE utilisateur');
    }
}
