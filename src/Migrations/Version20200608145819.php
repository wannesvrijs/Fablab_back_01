<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200608145819 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E7861B73');
        $this->addSql('DROP TABLE land');
        $this->addSql('DROP INDEX IDX_8D93D649E7861B73 ON user');
        $this->addSql('ALTER TABLE user ADD use_land VARCHAR(40) NOT NULL, DROP use_land_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE land (id INT AUTO_INCREMENT NOT NULL, land_naam VARCHAR(80) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user ADD use_land_id INT NOT NULL, DROP use_land');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E7861B73 FOREIGN KEY (use_land_id) REFERENCES land (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649E7861B73 ON user (use_land_id)');
    }
}
