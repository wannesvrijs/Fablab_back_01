<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200527074639 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE shop_categorie (id INT AUTO_INCREMENT NOT NULL, s_cat_naam VARCHAR(100) NOT NULL, s_cat_order INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shopmateriaal ADD s_mat_scat_id INT NOT NULL');
        $this->addSql('ALTER TABLE shopmateriaal ADD CONSTRAINT FK_56C9DAFB48669621 FOREIGN KEY (s_mat_scat_id) REFERENCES shop_categorie (id)');
        $this->addSql('CREATE INDEX IDX_56C9DAFB48669621 ON shopmateriaal (s_mat_scat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shopmateriaal DROP FOREIGN KEY FK_56C9DAFB48669621');
        $this->addSql('DROP TABLE shop_categorie');
        $this->addSql('DROP INDEX IDX_56C9DAFB48669621 ON shopmateriaal');
        $this->addSql('ALTER TABLE shopmateriaal DROP s_mat_scat_id');
    }
}
