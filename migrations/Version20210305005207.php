<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210305005207 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_service (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(60) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fourniseur_service (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, service_id INT DEFAULT NULL, fourniseur VARCHAR(70) NOT NULL, contact VARCHAR(255) NOT NULL, numero VARCHAR(20) NOT NULL, gouvernorat VARCHAR(255) NOT NULL, delegation VARCHAR(255) NOT NULL, maplocation VARCHAR(255) DEFAULT NULL, INDEX IDX_B29BB859BCF5E72D (categorie_id), INDEX IDX_B29BB859ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, libelle VARCHAR(60) NOT NULL, INDEX IDX_E19D9AD2BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fourniseur_service ADD CONSTRAINT FK_B29BB859BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_service (id)');
        $this->addSql('ALTER TABLE fourniseur_service ADD CONSTRAINT FK_B29BB859ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_service (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fourniseur_service DROP FOREIGN KEY FK_B29BB859BCF5E72D');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2BCF5E72D');
        $this->addSql('ALTER TABLE fourniseur_service DROP FOREIGN KEY FK_B29BB859ED5CA9E6');
        $this->addSql('DROP TABLE categorie_service');
        $this->addSql('DROP TABLE fourniseur_service');
        $this->addSql('DROP TABLE service');
    }
}
