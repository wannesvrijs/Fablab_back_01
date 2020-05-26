<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200526103251 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE machine_link (id INT AUTO_INCREMENT NOT NULL, mlink_mach_id INT NOT NULL, mlink_titel VARCHAR(255) DEFAULT NULL, mlink_pad VARCHAR(255) NOT NULL, INDEX IDX_60A672884DBD80CF (mlink_mach_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shopmateriaal (id INT AUTO_INCREMENT NOT NULL, smat_naam VARCHAR(255) NOT NULL, smat_omschrijving VARCHAR(255) DEFAULT NULL, smat_afmeting VARCHAR(255) DEFAULT NULL, smat_prijs INT NOT NULL, smat_in_stock TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fab_img (id INT AUTO_INCREMENT NOT NULL, fabimg_fab_id INT NOT NULL, fabimg_img_pad VARCHAR(255) NOT NULL, fabimg_img_alt VARCHAR(255) NOT NULL, INDEX IDX_82BD5039E790A43A (fabimg_fab_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE land (id INT AUTO_INCREMENT NOT NULL, land_naam VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, eve_titel VARCHAR(255) NOT NULL, eve_omschrijving LONGTEXT NOT NULL, eve_img_pad VARCHAR(255) DEFAULT NULL, eve_img_alt VARCHAR(255) DEFAULT NULL, eve_max_pers INT DEFAULT NULL, eve_start DATETIME NOT NULL, eve_stop DATETIME NOT NULL, eve_prijs INT DEFAULT NULL, eve_google_id VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE machine (id INT AUTO_INCREMENT NOT NULL, mach_mcat_id INT NOT NULL, mach_naam VARCHAR(255) NOT NULL, mach_omschrijving LONGTEXT NOT NULL, mach_afmeting VARCHAR(255) DEFAULT NULL, mach_files VARCHAR(255) DEFAULT NULL, mach_mat VARCHAR(255) NOT NULL, mach_img_pad VARCHAR(255) DEFAULT NULL, mach_img_alt VARCHAR(255) DEFAULT NULL, mach_video_pad VARCHAR(255) DEFAULT NULL, mach_video_title VARCHAR(255) DEFAULT NULL, INDEX IDX_1505DF84B011BA11 (mach_mcat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fab_mat (id INT AUTO_INCREMENT NOT NULL, fabmat_fab_id INT NOT NULL, fabmat_mat_id INT NOT NULL, INDEX IDX_ADBFF637FA7BC19C (fabmat_fab_id), INDEX IDX_ADBFF637E5CE391C (fabmat_mat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiaal (id INT AUTO_INCREMENT NOT NULL, mat_naam VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, use_land_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, use_vn VARCHAR(40) NOT NULL, use_an VARCHAR(40) NOT NULL, use_geboorte DATE NOT NULL, use_gemeente VARCHAR(40) DEFAULT NULL, use_postcode VARCHAR(12) DEFAULT NULL, use_beroep VARCHAR(40) NOT NULL, use_school VARCHAR(120) DEFAULT NULL, use_richting VARCHAR(120) DEFAULT NULL, use_is_actief TINYINT(1) NOT NULL, use_fabworthy INT NOT NULL, use_regkey VARCHAR(255) NOT NULL, use_is_blocked TINYINT(1) NOT NULL, use_is_deleted TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649E7861B73 (use_land_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq_categorie (id INT AUTO_INCREMENT NOT NULL, faqcat_naam VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE machine_file (id INT AUTO_INCREMENT NOT NULL, mfile_mach_id INT NOT NULL, mfile_titel VARCHAR(255) DEFAULT NULL, mfile_pad VARCHAR(255) NOT NULL, INDEX IDX_DA95DD696BBD6301 (mfile_mach_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gemeente (id INT AUTO_INCREMENT NOT NULL, gem_postcode VARCHAR(12) NOT NULL, gem_naam VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE machine_log (id INT AUTO_INCREMENT NOT NULL, mlog_use_id INT NOT NULL, mlog_mach_id INT NOT NULL, mlog_in DATETIME NOT NULL, mlog_uit DATETIME DEFAULT NULL, INDEX IDX_361032F0C710EDDA (mlog_use_id), INDEX IDX_361032F093C7C205 (mlog_mach_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cheese_listing (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, title VARCHAR(190) NOT NULL, description LONGTEXT NOT NULL, price INT NOT NULL, created_at DATETIME NOT NULL, is_published TINYINT(1) NOT NULL, INDEX IDX_356577D47E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE machine_recht (id INT AUTO_INCREMENT NOT NULL, mrecht_use_id INT NOT NULL, mrech_mach_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_D09AA103FFD05E36 (mrecht_use_id), INDEX IDX_D09AA1036EFD9B9F (mrech_mach_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE machine_categorie (id INT AUTO_INCREMENT NOT NULL, mcat_naam VARCHAR(255) NOT NULL, mcat_omschrijving VARCHAR(255) NOT NULL, mcat_img_pad VARCHAR(255) DEFAULT NULL, mcat_img_alt VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE machine_staat (id INT AUTO_INCREMENT NOT NULL, mstaat_mach_id INT NOT NULL, mstaat_naam INT NOT NULL, mstaat_start DATETIME DEFAULT NULL, mstaat_stop DATETIME DEFAULT NULL, mstaat_google_id VARCHAR(255) DEFAULT NULL, INDEX IDX_D719D76ED41146F8 (mstaat_mach_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nieuws (id INT AUTO_INCREMENT NOT NULL, nws_titel VARCHAR(255) NOT NULL, nws_omschrijving LONGTEXT NOT NULL, nws_img_pad VARCHAR(255) DEFAULT NULL, nws_img_alt VARCHAR(255) DEFAULT NULL, nws_start DATETIME DEFAULT NULL, nws_stop DATETIME DEFAULT NULL, nws_delete DATETIME DEFAULT NULL, nws_google_id VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq (id INT AUTO_INCREMENT NOT NULL, faq_faqcat_id INT DEFAULT NULL, faq_vraag LONGTEXT NOT NULL, faq_antwoord LONGTEXT NOT NULL, faq_sort INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_E8FF75CC4B6EB8E4 (faq_faqcat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE regels (id INT AUTO_INCREMENT NOT NULL, reg_naam LONGTEXT DEFAULT NULL, reg_omschrijving LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, stage_subtitel VARCHAR(255) DEFAULT NULL, stage_omschrijving LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fabmoment (id INT AUTO_INCREMENT NOT NULL, fab_use_id INT DEFAULT NULL, fab_titel VARCHAR(255) NOT NULL, fab_omschrijving LONGTEXT NOT NULL, fab_datum DATE DEFAULT NULL, fab_is_posted TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_4D563868435DAA40 (fab_use_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fab_file (id INT AUTO_INCREMENT NOT NULL, fabfile_fab_id INT NOT NULL, fabfile_omschrijving VARCHAR(255) DEFAULT NULL, fabfile_pad VARCHAR(255) NOT NULL, INDEX IDX_CC32E43A22AEBF4 (fabfile_fab_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fablab_info (id INT AUTO_INCREMENT NOT NULL, info_subtitel LONGTEXT DEFAULT NULL, info_omschrijving LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inschrijving (id INT AUTO_INCREMENT NOT NULL, ins_use_id INT NOT NULL, ins_eve_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_1166587DDDFE0FA9 (ins_use_id), INDEX IDX_1166587D16C88242 (ins_eve_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fab_mach (id INT AUTO_INCREMENT NOT NULL, fabmach_mach_id INT NOT NULL, fabmach_fab_id INT NOT NULL, INDEX IDX_2CF898882E69F58E (fabmach_mach_id), INDEX IDX_2CF89888D660F644 (fabmach_fab_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE machine_link ADD CONSTRAINT FK_60A672884DBD80CF FOREIGN KEY (mlink_mach_id) REFERENCES machine (id)');
        $this->addSql('ALTER TABLE fab_img ADD CONSTRAINT FK_82BD5039E790A43A FOREIGN KEY (fabimg_fab_id) REFERENCES fabmoment (id)');
        $this->addSql('ALTER TABLE machine ADD CONSTRAINT FK_1505DF84B011BA11 FOREIGN KEY (mach_mcat_id) REFERENCES machine_categorie (id)');
        $this->addSql('ALTER TABLE fab_mat ADD CONSTRAINT FK_ADBFF637FA7BC19C FOREIGN KEY (fabmat_fab_id) REFERENCES fabmoment (id)');
        $this->addSql('ALTER TABLE fab_mat ADD CONSTRAINT FK_ADBFF637E5CE391C FOREIGN KEY (fabmat_mat_id) REFERENCES materiaal (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E7861B73 FOREIGN KEY (use_land_id) REFERENCES land (id)');
        $this->addSql('ALTER TABLE machine_file ADD CONSTRAINT FK_DA95DD696BBD6301 FOREIGN KEY (mfile_mach_id) REFERENCES machine (id)');
        $this->addSql('ALTER TABLE machine_log ADD CONSTRAINT FK_361032F0C710EDDA FOREIGN KEY (mlog_use_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE machine_log ADD CONSTRAINT FK_361032F093C7C205 FOREIGN KEY (mlog_mach_id) REFERENCES machine (id)');
        $this->addSql('ALTER TABLE cheese_listing ADD CONSTRAINT FK_356577D47E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE machine_recht ADD CONSTRAINT FK_D09AA103FFD05E36 FOREIGN KEY (mrecht_use_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE machine_recht ADD CONSTRAINT FK_D09AA1036EFD9B9F FOREIGN KEY (mrech_mach_id) REFERENCES machine (id)');
        $this->addSql('ALTER TABLE machine_staat ADD CONSTRAINT FK_D719D76ED41146F8 FOREIGN KEY (mstaat_mach_id) REFERENCES machine (id)');
        $this->addSql('ALTER TABLE faq ADD CONSTRAINT FK_E8FF75CC4B6EB8E4 FOREIGN KEY (faq_faqcat_id) REFERENCES faq_categorie (id)');
        $this->addSql('ALTER TABLE fabmoment ADD CONSTRAINT FK_4D563868435DAA40 FOREIGN KEY (fab_use_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE fab_file ADD CONSTRAINT FK_CC32E43A22AEBF4 FOREIGN KEY (fabfile_fab_id) REFERENCES fabmoment (id)');
        $this->addSql('ALTER TABLE inschrijving ADD CONSTRAINT FK_1166587DDDFE0FA9 FOREIGN KEY (ins_use_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE inschrijving ADD CONSTRAINT FK_1166587D16C88242 FOREIGN KEY (ins_eve_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE fab_mach ADD CONSTRAINT FK_2CF898882E69F58E FOREIGN KEY (fabmach_mach_id) REFERENCES machine (id)');
        $this->addSql('ALTER TABLE fab_mach ADD CONSTRAINT FK_2CF89888D660F644 FOREIGN KEY (fabmach_fab_id) REFERENCES fabmoment (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E7861B73');
        $this->addSql('ALTER TABLE inschrijving DROP FOREIGN KEY FK_1166587D16C88242');
        $this->addSql('ALTER TABLE machine_link DROP FOREIGN KEY FK_60A672884DBD80CF');
        $this->addSql('ALTER TABLE machine_file DROP FOREIGN KEY FK_DA95DD696BBD6301');
        $this->addSql('ALTER TABLE machine_log DROP FOREIGN KEY FK_361032F093C7C205');
        $this->addSql('ALTER TABLE machine_recht DROP FOREIGN KEY FK_D09AA1036EFD9B9F');
        $this->addSql('ALTER TABLE machine_staat DROP FOREIGN KEY FK_D719D76ED41146F8');
        $this->addSql('ALTER TABLE fab_mach DROP FOREIGN KEY FK_2CF898882E69F58E');
        $this->addSql('ALTER TABLE fab_mat DROP FOREIGN KEY FK_ADBFF637E5CE391C');
        $this->addSql('ALTER TABLE machine_log DROP FOREIGN KEY FK_361032F0C710EDDA');
        $this->addSql('ALTER TABLE cheese_listing DROP FOREIGN KEY FK_356577D47E3C61F9');
        $this->addSql('ALTER TABLE machine_recht DROP FOREIGN KEY FK_D09AA103FFD05E36');
        $this->addSql('ALTER TABLE fabmoment DROP FOREIGN KEY FK_4D563868435DAA40');
        $this->addSql('ALTER TABLE inschrijving DROP FOREIGN KEY FK_1166587DDDFE0FA9');
        $this->addSql('ALTER TABLE faq DROP FOREIGN KEY FK_E8FF75CC4B6EB8E4');
        $this->addSql('ALTER TABLE machine DROP FOREIGN KEY FK_1505DF84B011BA11');
        $this->addSql('ALTER TABLE fab_img DROP FOREIGN KEY FK_82BD5039E790A43A');
        $this->addSql('ALTER TABLE fab_mat DROP FOREIGN KEY FK_ADBFF637FA7BC19C');
        $this->addSql('ALTER TABLE fab_file DROP FOREIGN KEY FK_CC32E43A22AEBF4');
        $this->addSql('ALTER TABLE fab_mach DROP FOREIGN KEY FK_2CF89888D660F644');
        $this->addSql('DROP TABLE machine_link');
        $this->addSql('DROP TABLE shopmateriaal');
        $this->addSql('DROP TABLE fab_img');
        $this->addSql('DROP TABLE land');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE machine');
        $this->addSql('DROP TABLE fab_mat');
        $this->addSql('DROP TABLE materiaal');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE faq_categorie');
        $this->addSql('DROP TABLE machine_file');
        $this->addSql('DROP TABLE gemeente');
        $this->addSql('DROP TABLE machine_log');
        $this->addSql('DROP TABLE cheese_listing');
        $this->addSql('DROP TABLE machine_recht');
        $this->addSql('DROP TABLE machine_categorie');
        $this->addSql('DROP TABLE machine_staat');
        $this->addSql('DROP TABLE nieuws');
        $this->addSql('DROP TABLE faq');
        $this->addSql('DROP TABLE regels');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE fabmoment');
        $this->addSql('DROP TABLE fab_file');
        $this->addSql('DROP TABLE fablab_info');
        $this->addSql('DROP TABLE inschrijving');
        $this->addSql('DROP TABLE fab_mach');
    }
}
