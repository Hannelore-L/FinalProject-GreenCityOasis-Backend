<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200522093847 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE city (city_id INT AUTO_INCREMENT NOT NULL, city_country_id INT NOT NULL, city_zip SMALLINT NOT NULL, city_name VARCHAR(512) NOT NULL, PRIMARY KEY(city_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (country_id INT AUTO_INCREMENT NOT NULL, country_name VARCHAR(512) NOT NULL, PRIMARY KEY(country_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (event_id INT AUTO_INCREMENT NOT NULL, event_desc LONGTEXT NOT NULL, event_start_date DATE NOT NULL, event_end_date DATE NOT NULL, event_time VARCHAR(512) NOT NULL, PRIMARY KEY(event_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_location (event_location_id INT AUTO_INCREMENT NOT NULL, event_location_location_id INT NOT NULL, event_location_event_id INT NOT NULL, PRIMARY KEY(event_location_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location_tag (location_tag_id INT AUTO_INCREMENT NOT NULL, location_tag_location_id INT NOT NULL, location_tag_tag_id INT NOT NULL, PRIMARY KEY(location_tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (review_id INT AUTO_INCREMENT NOT NULL, review_rating INT NOT NULL, review_desc LONGTEXT NOT NULL, review_location_id INT NOT NULL, review_user_id INT NOT NULL, PRIMARY KEY(review_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (tag_id INT AUTO_INCREMENT NOT NULL, tag_desc VARCHAR(512) NOT NULL, PRIMARY KEY(tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (user_id INT AUTO_INCREMENT NOT NULL, user_username VARCHAR(512) NOT NULL, user_first_name VARCHAR(512) NOT NULL, user_last_name VARCHAR(512) NOT NULL, user_city_id INT NOT NULL, user_country_id INT NOT NULL, user_email VARCHAR(512) NOT NULL, user_password VARCHAR(512) NOT NULL, user_is_admin TINYINT(1) NOT NULL, user_regkey VARCHAR(512) NOT NULL, PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE image DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE image CHANGE id image_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE image ADD PRIMARY KEY (image_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_location');
        $this->addSql('DROP TABLE location_tag');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE image MODIFY image_id INT NOT NULL');
        $this->addSql('ALTER TABLE image DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE image CHANGE image_id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE image ADD PRIMARY KEY (id)');
    }
}
