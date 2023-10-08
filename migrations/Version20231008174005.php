<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231008174005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manga ADD day_of_week TEXT NOT NULL');
        $this->addSql('COMMENT ON COLUMN manga.day_of_week IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE manhwa ADD day_of_week TEXT NOT NULL');
        $this->addSql('COMMENT ON COLUMN manhwa.day_of_week IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE novel ADD day_of_week TEXT NOT NULL');
        $this->addSql('COMMENT ON COLUMN novel.day_of_week IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE readable ADD days_of_week TEXT NOT NULL');
        $this->addSql('COMMENT ON COLUMN readable.days_of_week IS \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE readable DROP days_of_week');
        $this->addSql('ALTER TABLE novel DROP day_of_week');
        $this->addSql('ALTER TABLE manhwa DROP day_of_week');
        $this->addSql('ALTER TABLE manga DROP day_of_week');
    }
}
