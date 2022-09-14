<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210528214209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clubs (id INT AUTO_INCREMENT NOT NULL, clubname VARCHAR(30) NOT NULL, clubmail VARCHAR(100) NOT NULL, clubnumber VARCHAR(20) NOT NULL, clubadresse VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE seances DROP FOREIGN KEY seances_ibfk_1');
        $this->addSql('ALTER TABLE seances DROP FOREIGN KEY seances_ibfk_2');
        $this->addSql('DROP INDEX idm ON seances');
        $this->addSql('DROP INDEX ida ON seances');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE clubs');
        $this->addSql('ALTER TABLE seances ADD CONSTRAINT seances_ibfk_1 FOREIGN KEY (idm) REFERENCES moniteur (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seances ADD CONSTRAINT seances_ibfk_2 FOREIGN KEY (ida) REFERENCES adheren (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX idm ON seances (idm)');
        $this->addSql('CREATE INDEX ida ON seances (ida)');
    }
}
