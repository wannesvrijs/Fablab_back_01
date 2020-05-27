<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200527095557 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shopmateriaal ADD CONSTRAINT FK_56C9DAFB26C290FF FOREIGN KEY (smat_scat_id) REFERENCES shop_categorie (id)');
        $this->addSql('CREATE INDEX IDX_56C9DAFB26C290FF ON shopmateriaal (smat_scat_id)');
        $this->addSql('ALTER TABLE shop_categorie CHANGE s_cat_naam scat_naam VARCHAR(100) NOT NULL, CHANGE s_cat_order scat_order INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shop_categorie CHANGE scat_naam s_cat_naam VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE scat_order s_cat_order INT NOT NULL');
        $this->addSql('ALTER TABLE shopmateriaal DROP FOREIGN KEY FK_56C9DAFB26C290FF');
        $this->addSql('DROP INDEX IDX_56C9DAFB26C290FF ON shopmateriaal');
    }
}
