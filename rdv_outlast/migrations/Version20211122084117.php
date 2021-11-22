<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211122084117 extends AbstractMigration
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
        $this->addSql('DROP TABLE assistant');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE patient');
        $this->addSql('ALTER TABLE indisponibilite DROP FOREIGN KEY FK_8717036F65F36D13');
        $this->addSql('ALTER TABLE indisponibilite ADD CONSTRAINT FK_8717036F65F36D13 FOREIGN KEY (un_medecin_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8610321EAD');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86A89E5EE');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8665F36D13');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8610321EAD FOREIGN KEY (un_assistant_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86A89E5EE FOREIGN KEY (un_patient_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8665F36D13 FOREIGN KEY (un_medecin_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE utilisateur ADD nom VARCHAR(50) NOT NULL, ADD prenom VARCHAR(50) NOT NULL, ADD discr VARCHAR(255) NOT NULL, ADD tel VARCHAR(255) DEFAULT NULL, ADD num_secu INT DEFAULT NULL, ADD des_rdv VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assistant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, des_rdv VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, des_rdv VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, num_secu INT NOT NULL, des_rdv VARCHAR(70) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE indisponibilite DROP FOREIGN KEY FK_8717036F65F36D13');
        $this->addSql('ALTER TABLE indisponibilite ADD CONSTRAINT FK_8717036F65F36D13 FOREIGN KEY (un_medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86A89E5EE');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8665F36D13');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8610321EAD');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86A89E5EE FOREIGN KEY (un_patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8665F36D13 FOREIGN KEY (un_medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8610321EAD FOREIGN KEY (un_assistant_id) REFERENCES assistant (id)');
        $this->addSql('ALTER TABLE utilisateur DROP nom, DROP prenom, DROP discr, DROP tel, DROP num_secu, DROP des_rdv');
    }
}
