<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210714171339 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE apprenant_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE benevole_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE apprenant (id INT NOT NULL, userid_id INT NOT NULL, date_of_birth DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C4EB462E58E0A285 ON apprenant (userid_id)');
        $this->addSql('CREATE TABLE benevole (id INT NOT NULL, userid_id INT NOT NULL, date_of_entry DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B4014FDB58E0A285 ON benevole (userid_id)');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462E58E0A285 FOREIGN KEY (userid_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE benevole ADD CONSTRAINT FK_B4014FDB58E0A285 FOREIGN KEY (userid_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD firstname VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD lastname VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE apprenant_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE benevole_id_seq CASCADE');
        $this->addSql('DROP TABLE apprenant');
        $this->addSql('DROP TABLE benevole');
        $this->addSql('ALTER TABLE "user" DROP firstname');
        $this->addSql('ALTER TABLE "user" DROP lastname');
    }
}
