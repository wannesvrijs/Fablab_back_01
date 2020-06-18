<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200618101128 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE machine_reservatie (id INT AUTO_INCREMENT NOT NULL, mres_mach_id INT NOT NULL, mres_start DATE NOT NULL, mres_stop DATE NOT NULL, mres_google_id VARCHAR(255) DEFAULT NULL, INDEX IDX_E1CBB8DE8949AE7C (mres_mach_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE machine_reservatie ADD CONSTRAINT FK_E1CBB8DE8949AE7C FOREIGN KEY (mres_mach_id) REFERENCES machine (id)');
        $this->addSql('DROP TABLE machine_staat');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE machine_staat (id INT AUTO_INCREMENT NOT NULL, mstaat_mach_id INT NOT NULL, mstaat_start DATE DEFAULT NULL, mstaat_stop DATE DEFAULT NULL, mstaat_google_id VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, mstaat_status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_D719D76ED41146F8 (mstaat_mach_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE machine_staat ADD CONSTRAINT FK_D719D76ED41146F8 FOREIGN KEY (mstaat_mach_id) REFERENCES machine (id)');
        $this->addSql('DROP TABLE machine_reservatie');
    }
}
