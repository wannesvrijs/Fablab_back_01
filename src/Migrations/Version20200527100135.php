<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200527100135 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE faq_categorie ADD faqcat_order INT NOT NULL');
        $this->addSql('ALTER TABLE faq ADD faq_order INT NOT NULL, DROP faq_sort');
        $this->addSql('ALTER TABLE fablab_info ADD info_order INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fablab_info DROP info_order');
        $this->addSql('ALTER TABLE faq ADD faq_sort INT DEFAULT NULL, DROP faq_order');
        $this->addSql('ALTER TABLE faq_categorie DROP faqcat_order');
    }
}
