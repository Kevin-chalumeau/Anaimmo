<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200820153343 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC5BB66C05');
        $this->addSql('ALTER TABLE sale DROP FOREIGN KEY FK_E54BC0055BB66C05');
        $this->addSql('DROP TABLE poster');
        $this->addSql('DROP INDEX IDX_2784DCC5BB66C05 ON rent');
        $this->addSql('ALTER TABLE rent ADD filename VARCHAR(255) NOT NULL, ADD updated_at DATETIME NOT NULL, DROP poster_id');
        $this->addSql('DROP INDEX IDX_E54BC0055BB66C05 ON sale');
        $this->addSql('ALTER TABLE sale ADD filename VARCHAR(255) NOT NULL, ADD updated_at DATETIME NOT NULL, DROP poster_id, CHANGE type type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE poster (id INT AUTO_INCREMENT NOT NULL, file_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE rent ADD poster_id INT DEFAULT NULL, DROP filename, DROP updated_at');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC5BB66C05 FOREIGN KEY (poster_id) REFERENCES poster (id)');
        $this->addSql('CREATE INDEX IDX_2784DCC5BB66C05 ON rent (poster_id)');
        $this->addSql('ALTER TABLE sale ADD poster_id INT DEFAULT NULL, DROP filename, DROP updated_at, CHANGE type type LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE sale ADD CONSTRAINT FK_E54BC0055BB66C05 FOREIGN KEY (poster_id) REFERENCES poster (id)');
        $this->addSql('CREATE INDEX IDX_E54BC0055BB66C05 ON sale (poster_id)');
    }
}
