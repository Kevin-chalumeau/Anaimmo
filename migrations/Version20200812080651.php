<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200812080651 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rent (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, month_price INT NOT NULL, living_space INT NOT NULL, land_space INT NOT NULL, rooms INT NOT NULL, meuble TINYINT(1) NOT NULL, not_meuble TINYINT(1) NOT NULL, dpe VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sale (id INT AUTO_INCREMENT NOT NULL, mandat_number INT NOT NULL, type LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', annonce_title VARCHAR(255) NOT NULL, price_fai INT NOT NULL, net_seller_price INT NOT NULL, pourcentage DOUBLE PRECISION NOT NULL, honorary INT NOT NULL, living_area INT NOT NULL, land_area INT NOT NULL, descriptif LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rent');
        $this->addSql('DROP TABLE sale');
        $this->addSql('DROP TABLE user');
    }
}
