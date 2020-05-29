<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200529090343 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fabmoment_helper (id INT AUTO_INCREMENT NOT NULL, fabhelp_fab_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_F059A1FADE3B1F33 (fabhelp_fab_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fabmoment_helper ADD CONSTRAINT FK_F059A1FADE3B1F33 FOREIGN KEY (fabhelp_fab_id) REFERENCES fabmoment (id)');
        $this->addSql('DROP TABLE fab_moment_public');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fab_moment_public (id INT AUTO_INCREMENT NOT NULL, fabmoments_public_moments_id INT NOT NULL, UNIQUE INDEX UNIQ_4DF7085AF43D7511 (fabmoments_public_moments_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE fab_moment_public ADD CONSTRAINT FK_4DF7085AF43D7511 FOREIGN KEY (fabmoments_public_moments_id) REFERENCES fabmoment (id)');
        $this->addSql('DROP TABLE fabmoment_helper');
    }
}
