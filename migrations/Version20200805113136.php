<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200805113136 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sale (id INT AUTO_INCREMENT NOT NULL, mandat_number INT NOT NULL, type LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', annonce_title VARCHAR(255) NOT NULL, price_fai INT NOT NULL, net_seller_price INT NOT NULL, pourcentage DOUBLE PRECISION NOT NULL, honorary INT NOT NULL, living_area INT NOT NULL, land_area INT NOT NULL, descriptif LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sale');
    }
}
