<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200322224717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Music Inventory';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE lyrics_sample_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE performer_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE track_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE lyrics_sample (id INT NOT NULL, track_id INT DEFAULT NULL, sample VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7B073FE65ED23C43 ON lyrics_sample (track_id)');
        $this->addSql('CREATE TABLE performer (id INT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE track (id INT NOT NULL, performer_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D6E3F8A66C6B33F3 ON track (performer_id)');
        $this->addSql('ALTER TABLE lyrics_sample ADD CONSTRAINT FK_7B073FE65ED23C43 FOREIGN KEY (track_id) REFERENCES track (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE track ADD CONSTRAINT FK_D6E3F8A66C6B33F3 FOREIGN KEY (performer_id) REFERENCES performer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE track DROP CONSTRAINT FK_D6E3F8A66C6B33F3');
        $this->addSql('ALTER TABLE lyrics_sample DROP CONSTRAINT FK_7B073FE65ED23C43');
        $this->addSql('DROP SEQUENCE lyrics_sample_seq CASCADE');
        $this->addSql('DROP SEQUENCE performer_seq CASCADE');
        $this->addSql('DROP SEQUENCE track_seq CASCADE');
        $this->addSql('DROP TABLE lyrics_sample');
        $this->addSql('DROP TABLE performer');
        $this->addSql('DROP TABLE track');
    }
}
