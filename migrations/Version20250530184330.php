<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250530184330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE episodio (id INT AUTO_INCREMENT NOT NULL, temporada_id INT NOT NULL, numero INT NOT NULL, INDEX IDX_C5614D9E6E1CF8A8 (temporada_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE temporada (id INT AUTO_INCREMENT NOT NULL, series_id INT NOT NULL, numero INT NOT NULL, INDEX IDX_9A6BDEBD5278319C (series_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE episodio ADD CONSTRAINT FK_C5614D9E6E1CF8A8 FOREIGN KEY (temporada_id) REFERENCES temporada (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE temporada ADD CONSTRAINT FK_9A6BDEBD5278319C FOREIGN KEY (series_id) REFERENCES series (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE episodio DROP FOREIGN KEY FK_C5614D9E6E1CF8A8
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE temporada DROP FOREIGN KEY FK_9A6BDEBD5278319C
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE episodio
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE temporada
        SQL);
    }
}
