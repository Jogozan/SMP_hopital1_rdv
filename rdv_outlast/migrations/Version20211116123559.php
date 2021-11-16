<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211116123559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE indisponibilite ADD un_medecin_id INT DEFAULT NULL, ADD un_motif_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE indisponibilite ADD CONSTRAINT FK_8717036F65F36D13 FOREIGN KEY (un_medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE indisponibilite ADD CONSTRAINT FK_8717036F33FB9249 FOREIGN KEY (un_motif_id) REFERENCES motif (id)');
        $this->addSql('CREATE INDEX IDX_8717036F65F36D13 ON indisponibilite (un_medecin_id)');
        $this->addSql('CREATE INDEX IDX_8717036F33FB9249 ON indisponibilite (un_motif_id)');
        $this->addSql('ALTER TABLE rdv ADD un_patient_id INT DEFAULT NULL, ADD un_medecin_id INT DEFAULT NULL, ADD un_assistant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86A89E5EE FOREIGN KEY (un_patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8665F36D13 FOREIGN KEY (un_medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8610321EAD FOREIGN KEY (un_assistant_id) REFERENCES assistant (id)');
        $this->addSql('CREATE INDEX IDX_10C31F86A89E5EE ON rdv (un_patient_id)');
        $this->addSql('CREATE INDEX IDX_10C31F8665F36D13 ON rdv (un_medecin_id)');
        $this->addSql('CREATE INDEX IDX_10C31F8610321EAD ON rdv (un_assistant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE indisponibilite DROP FOREIGN KEY FK_8717036F65F36D13');
        $this->addSql('ALTER TABLE indisponibilite DROP FOREIGN KEY FK_8717036F33FB9249');
        $this->addSql('DROP INDEX IDX_8717036F65F36D13 ON indisponibilite');
        $this->addSql('DROP INDEX IDX_8717036F33FB9249 ON indisponibilite');
        $this->addSql('ALTER TABLE indisponibilite DROP un_medecin_id, DROP un_motif_id');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86A89E5EE');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8665F36D13');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8610321EAD');
        $this->addSql('DROP INDEX IDX_10C31F86A89E5EE ON rdv');
        $this->addSql('DROP INDEX IDX_10C31F8665F36D13 ON rdv');
        $this->addSql('DROP INDEX IDX_10C31F8610321EAD ON rdv');
        $this->addSql('ALTER TABLE rdv DROP un_patient_id, DROP un_medecin_id, DROP un_assistant_id');
    }
}
