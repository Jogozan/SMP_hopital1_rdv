<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211116122810 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE indisponibilite DROP FOREIGN KEY FK_8717036F8035548C');
        $this->addSql('ALTER TABLE indisponibilite DROP FOREIGN KEY FK_8717036FA1799A53');
        $this->addSql('DROP INDEX IDX_8717036FA1799A53 ON indisponibilite');
        $this->addSql('DROP INDEX IDX_8717036F8035548C ON indisponibilite');
        $this->addSql('ALTER TABLE indisponibilite DROP id_medecin_id, DROP id_motif_id');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86A1799A53');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86CE0312AE');
        $this->addSql('DROP INDEX IDX_10C31F86A1799A53 ON rdv');
        $this->addSql('DROP INDEX IDX_10C31F86CE0312AE ON rdv');
        $this->addSql('ALTER TABLE rdv DROP id_patient_id, DROP id_medecin_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE indisponibilite ADD id_medecin_id INT DEFAULT NULL, ADD id_motif_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE indisponibilite ADD CONSTRAINT FK_8717036F8035548C FOREIGN KEY (id_motif_id) REFERENCES motif (id)');
        $this->addSql('ALTER TABLE indisponibilite ADD CONSTRAINT FK_8717036FA1799A53 FOREIGN KEY (id_medecin_id) REFERENCES medecin (id)');
        $this->addSql('CREATE INDEX IDX_8717036FA1799A53 ON indisponibilite (id_medecin_id)');
        $this->addSql('CREATE INDEX IDX_8717036F8035548C ON indisponibilite (id_motif_id)');
        $this->addSql('ALTER TABLE rdv ADD id_patient_id INT DEFAULT NULL, ADD id_medecin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86A1799A53 FOREIGN KEY (id_medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86CE0312AE FOREIGN KEY (id_patient_id) REFERENCES patient (id)');
        $this->addSql('CREATE INDEX IDX_10C31F86A1799A53 ON rdv (id_medecin_id)');
        $this->addSql('CREATE INDEX IDX_10C31F86CE0312AE ON rdv (id_patient_id)');
    }
}
