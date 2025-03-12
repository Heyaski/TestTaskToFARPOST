<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250312055620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE process (id INT AUTO_INCREMENT NOT NULL, memory_required INT NOT NULL, cpu_required INT NOT NULL, worcker_machine_id INT DEFAULT NULL, INDEX IDX_861D1896178C540A (worcker_machine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE worcker_machine (id INT AUTO_INCREMENT NOT NULL, memory_total INT NOT NULL, cpu_total INT NOT NULL, memory_available DOUBLE PRECISION NOT NULL, cpu_availble DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE process ADD CONSTRAINT FK_861D1896178C540A FOREIGN KEY (worcker_machine_id) REFERENCES worcker_machine (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE process DROP FOREIGN KEY FK_861D1896178C540A');
        $this->addSql('DROP TABLE process');
        $this->addSql('DROP TABLE worcker_machine');
    }
}
