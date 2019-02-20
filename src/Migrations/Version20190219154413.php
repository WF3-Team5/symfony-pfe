<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190219154413 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE ccam');
        $this->addSql('DROP TABLE rpps');
        $this->addSql('DROP TABLE user');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ccam (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(10) NOT NULL COLLATE utf8_general_ci, description VARCHAR(255) NOT NULL COLLATE utf8_general_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE rpps (numero VARCHAR(11) NOT NULL COLLATE utf8_general_ci, nom VARCHAR(100) NOT NULL COLLATE utf8_general_ci, prenom VARCHAR(100) NOT NULL COLLATE utf8_general_ci, certificat VARCHAR(255) NOT NULL COLLATE utf8_general_ci) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, birth_department_id INT NOT NULL, civility VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, gender VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, last_name VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci, first_name VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci, birth_name VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci, birth_date DATE NOT NULL, place_of_birth VARCHAR(50) DEFAULT NULL COLLATE utf8_unicode_ci, nationality VARCHAR(100) DEFAULT NULL COLLATE utf8_unicode_ci, email VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, address VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, postal_code INT NOT NULL, city VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, phone_number INT DEFAULT NULL, mobile_phone_number INT NOT NULL, password VARCHAR(20) NOT NULL COLLATE utf8_unicode_ci, status VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, role VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, INDEX IDX_8D93D6493CFB6167 (birth_department_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493CFB6167 FOREIGN KEY (birth_department_id) REFERENCES departement (id)');
    }
}
