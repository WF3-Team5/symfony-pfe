<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190219142214 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(3) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD birth_department_id INT NOT NULL, ADD role ENUM(\'ROLE_USER\' , \'ROLE_ADMIN\'), DROP birth_department, CHANGE last_name last_name VARCHAR(50) NOT NULL, CHANGE first_name first_name VARCHAR(50) NOT NULL, CHANGE birth_name birth_name VARCHAR(50) NOT NULL, CHANGE place_of_birth place_of_birth VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493CFB6167 FOREIGN KEY (birth_department_id) REFERENCES departement (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6493CFB6167 ON user (birth_department_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493CFB6167');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP INDEX IDX_8D93D6493CFB6167 ON user');
        $this->addSql('ALTER TABLE user ADD birth_department INT DEFAULT NULL, DROP birth_department_id, DROP role, CHANGE last_name last_name VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, CHANGE first_name first_name VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, CHANGE birth_name birth_name VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, CHANGE place_of_birth place_of_birth VARCHAR(100) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
