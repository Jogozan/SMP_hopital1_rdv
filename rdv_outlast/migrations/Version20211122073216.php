<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211122073216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8610321EAD');
        $this->addSql('ALTER TABLE indisponibilite DROP FOREIGN KEY FK_8717036F65F36D13');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8665F36D13');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86A89E5EE');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, discr VARCHAR(255) NOT NULL, tel VARCHAR(255) DEFAULT NULL, num_secu INT DEFAULT NULL, des_rdv VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE assistant');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE patient');
        $this->addSql('ALTER TABLE indisponibilite DROP FOREIGN KEY FK_8717036F65F36D13');
        $this->addSql('ALTER TABLE indisponibilite ADD CONSTRAINT FK_8717036F65F36D13 FOREIGN KEY (un_medecin_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8610321EAD');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86A89E5EE');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8665F36D13');
        $this->addSql('ALTER TABLE rdv ADD ok TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8610321EAD FOREIGN KEY (un_assistant_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86A89E5EE FOREIGN KEY (un_patient_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8665F36D13 FOREIGN KEY (un_medecin_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE indisponibilite DROP FOREIGN KEY FK_8717036F65F36D13');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86A89E5EE');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8665F36D13');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8610321EAD');
        $this->addSql('CREATE TABLE assistant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, login VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mdp VARCHAR(65) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, login VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mdp VARCHAR(65) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, login VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mdp VARCHAR(65) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tel INT NOT NULL, num_secu INT NOT NULL, mail VARCHAR(70) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE indisponibilite DROP FOREIGN KEY FK_8717036F65F36D13');
        $this->addSql('ALTER TABLE indisponibilite ADD CONSTRAINT FK_8717036F65F36D13 FOREIGN KEY (un_medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86A89E5EE');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8665F36D13');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8610321EAD');
        $this->addSql('ALTER TABLE rdv DROP ok');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86A89E5EE FOREIGN KEY (un_patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8665F36D13 FOREIGN KEY (un_medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8610321EAD FOREIGN KEY (un_assistant_id) REFERENCES assistant (id)');
    }
}
