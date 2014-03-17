<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140317134431 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE Site (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, address VARCHAR(100) NOT NULL, postcode VARCHAR(4) NOT NULL, city VARCHAR(50) NOT NULL, installdate DATE NOT NULL, remark LONGTEXT NOT NULL, INDEX IDX_C971A6DA19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE Site ADD CONSTRAINT FK_C971A6DA19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE Site");
    }
}
