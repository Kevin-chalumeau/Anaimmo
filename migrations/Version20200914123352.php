<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200914123352 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rent (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, month_price INT NOT NULL, living_space INT NOT NULL, land_space INT NOT NULL, rooms INT NOT NULL, meuble TINYINT(1) NOT NULL, not_meuble TINYINT(1) NOT NULL, dpe VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rent_option (rent_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_786568FBE5FD6250 (rent_id), INDEX IDX_786568FBA7C41D6F (option_id), PRIMARY KEY(rent_id, option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sale (id INT AUTO_INCREMENT NOT NULL, mandat_number INT NOT NULL, type VARCHAR(255) NOT NULL, annonce_title VARCHAR(255) NOT NULL, price_fai INT NOT NULL, net_seller_price INT NOT NULL, pourcentage DOUBLE PRECISION NOT NULL, honorary INT NOT NULL, living_area INT NOT NULL, land_area INT NOT NULL, descriptif LONGTEXT NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sale_option (sale_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_2EE70E724A7E4868 (sale_id), INDEX IDX_2EE70E72A7C41D6F (option_id), PRIMARY KEY(sale_id, option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rent_option ADD CONSTRAINT FK_786568FBE5FD6250 FOREIGN KEY (rent_id) REFERENCES rent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rent_option ADD CONSTRAINT FK_786568FBA7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sale_option ADD CONSTRAINT FK_2EE70E724A7E4868 FOREIGN KEY (sale_id) REFERENCES sale (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sale_option ADD CONSTRAINT FK_2EE70E72A7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rent_option DROP FOREIGN KEY FK_786568FBA7C41D6F');
        $this->addSql('ALTER TABLE sale_option DROP FOREIGN KEY FK_2EE70E72A7C41D6F');
        $this->addSql('ALTER TABLE rent_option DROP FOREIGN KEY FK_786568FBE5FD6250');
        $this->addSql('ALTER TABLE sale_option DROP FOREIGN KEY FK_2EE70E724A7E4868');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE rent');
        $this->addSql('DROP TABLE rent_option');
        $this->addSql('DROP TABLE sale');
        $this->addSql('DROP TABLE sale_option');
        $this->addSql('DROP TABLE user');
    }
}
