<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200523114233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE image (image_id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(512) NOT NULL, image_file_name VARCHAR(512) NOT NULL, image_extension VARCHAR(512) NOT NULL, image_uploaded_at DATETIME NOT NULL, image_user_id INT NOT NULL, image_location_id INT NOT NULL, image_coordinates VARCHAR(512) NOT NULL, image_is_deleted TINYINT(1) NOT NULL, PRIMARY KEY(image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (location_id INT AUTO_INCREMENT NOT NULL, location_title VARCHAR(512) NOT NULL, location_unique VARCHAR(512) NOT NULL, location_address_text VARCHAR(512) NOT NULL, location_address_info VARCHAR(512) NOT NULL, location_desc LONGTEXT NOT NULL, location_created_at DATETIME NOT NULL, location_edited_at DATETIME NOT NULL, location_is_deleted TINYINT(1) NOT NULL, PRIMARY KEY(location_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE city ADD city_province VARCHAR(512) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE location');
        $this->addSql('ALTER TABLE city DROP city_province');
    }
}
