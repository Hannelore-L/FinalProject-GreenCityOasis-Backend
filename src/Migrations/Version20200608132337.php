<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200608132337 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, event_desc LONGTEXT NOT NULL, event_start_date DATE NOT NULL, event_end_date DATE NOT NULL, event_times VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_location (event_id INT NOT NULL, location_id INT NOT NULL, INDEX IDX_1872601B71F7E88B (event_id), INDEX IDX_1872601B64D218E (location_id), PRIMARY KEY(event_id, location_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, tag_desc VARCHAR(512) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_location (tag_id INT NOT NULL, location_id INT NOT NULL, INDEX IDX_68AFF210BAD26311 (tag_id), INDEX IDX_68AFF21064D218E (location_id), PRIMARY KEY(tag_id, location_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_location ADD CONSTRAINT FK_1872601B71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_location ADD CONSTRAINT FK_1872601B64D218E FOREIGN KEY (location_id) REFERENCES location (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_location ADD CONSTRAINT FK_68AFF210BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_location ADD CONSTRAINT FK_68AFF21064D218E FOREIGN KEY (location_id) REFERENCES location (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event_location DROP FOREIGN KEY FK_1872601B71F7E88B');
        $this->addSql('ALTER TABLE tag_location DROP FOREIGN KEY FK_68AFF210BAD26311');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_location');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_location');
    }
}
