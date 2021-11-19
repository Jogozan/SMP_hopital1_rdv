<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211119150823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assistant ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD nom VARCHAR(50) NOT NULL, ADD prenom VARCHAR(50) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C2997CD1E7927C74 ON assistant (email)');
        $this->addSql('ALTER TABLE medecin ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD nom VARCHAR(50) NOT NULL, ADD prenom VARCHAR(50) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1BDA53C6E7927C74 ON medecin (email)');
        $this->addSql('ALTER TABLE patient ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD nom VARCHAR(50) NOT NULL, ADD prenom VARCHAR(50) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EBE7927C74 ON patient (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_C2997CD1E7927C74 ON assistant');
        $this->addSql('ALTER TABLE assistant DROP email, DROP roles, DROP password, DROP nom, DROP prenom');
        $this->addSql('DROP INDEX UNIQ_1BDA53C6E7927C74 ON medecin');
        $this->addSql('ALTER TABLE medecin DROP email, DROP roles, DROP password, DROP nom, DROP prenom');
        $this->addSql('DROP INDEX UNIQ_1ADAD7EBE7927C74 ON patient');
        $this->addSql('ALTER TABLE patient DROP email, DROP roles, DROP password, DROP nom, DROP prenom');
    }
}
