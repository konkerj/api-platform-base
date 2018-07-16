<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180716205939 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE greeting_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE app_users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE app_users (id INT NOT NULL, username VARCHAR(50) NOT NULL, email VARCHAR(250) NOT NULL, password VARCHAR(70) NOT NULL, name VARCHAR(150) NOT NULL, is_active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C2502824F85E0677 ON app_users (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C2502824E7927C74 ON app_users (email)');
        $this->addSql('DROP TABLE greeting');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE app_users_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE greeting (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE app_users');
    }
}
