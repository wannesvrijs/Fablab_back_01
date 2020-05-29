<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200529091516 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fabmoment_helper DROP FOREIGN KEY FK_F059A1FADE3B1F33');
        $this->addSql('DROP INDEX UNIQ_F059A1FADE3B1F33 ON fabmoment_helper');
        $this->addSql('ALTER TABLE fabmoment_helper DROP fabhelp_fab_id');
        $this->addSql('ALTER TABLE fabmoment ADD fabmoment_helper_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fabmoment ADD CONSTRAINT FK_4D5638687BB9573E FOREIGN KEY (fabmoment_helper_id) REFERENCES fabmoment_helper (id)');
        $this->addSql('CREATE INDEX IDX_4D5638687BB9573E ON fabmoment (fabmoment_helper_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fabmoment DROP FOREIGN KEY FK_4D5638687BB9573E');
        $this->addSql('DROP INDEX IDX_4D5638687BB9573E ON fabmoment');
        $this->addSql('ALTER TABLE fabmoment DROP fabmoment_helper_id');
        $this->addSql('ALTER TABLE fabmoment_helper ADD fabhelp_fab_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fabmoment_helper ADD CONSTRAINT FK_F059A1FADE3B1F33 FOREIGN KEY (fabhelp_fab_id) REFERENCES fabmoment (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F059A1FADE3B1F33 ON fabmoment_helper (fabhelp_fab_id)');
    }
}
