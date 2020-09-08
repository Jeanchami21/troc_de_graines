<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200908124535 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE espece (id INT AUTO_INCREMENT NOT NULL, famille_id INT DEFAULT NULL, nom_commum VARCHAR(255) NOT NULL, nom_binominal VARCHAR(255) DEFAULT NULL, genre VARCHAR(255) DEFAULT NULL, INDEX IDX_1A2A1B197A77B84 (famille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE variete (id INT AUTO_INCREMENT NOT NULL, espece_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, lot_indicatif VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_2CD7CD582D191E7A (espece_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE espece ADD CONSTRAINT FK_1A2A1B197A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('ALTER TABLE variete ADD CONSTRAINT FK_2CD7CD582D191E7A FOREIGN KEY (espece_id) REFERENCES espece (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE variete DROP FOREIGN KEY FK_2CD7CD582D191E7A');
        $this->addSql('ALTER TABLE espece DROP FOREIGN KEY FK_1A2A1B197A77B84');
        $this->addSql('DROP TABLE espece');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE variete');
    }
}
