<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200627100610 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fab_mach ADD fabmach_mcat_id INT NOT NULL');
        $this->addSql('ALTER TABLE fab_mach ADD CONSTRAINT FK_2CF898883AEEFC2 FOREIGN KEY (fabmach_mcat_id) REFERENCES machine_categorie (id)');
        $this->addSql('CREATE INDEX IDX_2CF898883AEEFC2 ON fab_mach (fabmach_mcat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fab_mach DROP FOREIGN KEY FK_2CF898883AEEFC2');
        $this->addSql('DROP INDEX IDX_2CF898883AEEFC2 ON fab_mach');
        $this->addSql('ALTER TABLE fab_mach DROP fabmach_mcat_id');
    }
}
