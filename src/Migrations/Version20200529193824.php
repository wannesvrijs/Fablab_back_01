<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200529193824 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE machine_staat DROP FOREIGN KEY FK_D719D76ED3DAC31B');
        $this->addSql('DROP TABLE machine_staat_naam');
        $this->addSql('DROP INDEX IDX_D719D76ED3DAC31B ON machine_staat');
        $this->addSql('ALTER TABLE machine_staat ADD mstaat_status VARCHAR(255) NOT NULL, DROP mstaat_status_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE machine_staat_naam (id INT AUTO_INCREMENT NOT NULL, mstaatnaam_status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE machine_staat ADD mstaat_status_id INT DEFAULT NULL, DROP mstaat_status');
        $this->addSql('ALTER TABLE machine_staat ADD CONSTRAINT FK_D719D76ED3DAC31B FOREIGN KEY (mstaat_status_id) REFERENCES machine_staat_naam (id)');
        $this->addSql('CREATE INDEX IDX_D719D76ED3DAC31B ON machine_staat (mstaat_status_id)');
    }
}
