<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210224203332 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE airport (id INT UNSIGNED AUTO_INCREMENT NOT NULL, arp_map_point_id INT UNSIGNED DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, city_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX fk_airport_map_point1_idx (arp_map_point_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE map_point (id INT UNSIGNED AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, latitude NUMERIC(9, 6) NOT NULL, longitude NUMERIC(9, 6) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE runway (id INT UNSIGNED AUTO_INCREMENT NOT NULL, airport_id INT UNSIGNED NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, number TINYINT(1) NOT NULL, alignment CHAR(1) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, heading SMALLINT DEFAULT NULL, reverse_number TINYINT(1) DEFAULT NULL, reverse_alignment CHAR(1) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, reverse_heading SMALLINT DEFAULT NULL, length_in_feet SMALLINT DEFAULT NULL, length_in_meters SMALLINT DEFAULT NULL, INDEX fk_runway_airport_idx (airport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE runway_map_point (runway_id INT UNSIGNED NOT NULL, map_point_id INT UNSIGNED NOT NULL, INDEX fk_runway_has_map_point_runway1_idx (runway_id), INDEX fk_runway_has_map_point_map_point1_idx (map_point_id), PRIMARY KEY(runway_id, map_point_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE stand (id INT UNSIGNED AUTO_INCREMENT NOT NULL, airport_id INT UNSIGNED NOT NULL, map_point_id INT UNSIGNED DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, heading SMALLINT DEFAULT NULL, INDEX fk_stand_map_point1_idx (map_point_id), INDEX fk_stand_airport1_idx (airport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE taxiway (id INT UNSIGNED AUTO_INCREMENT NOT NULL, airport_id INT UNSIGNED NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX fk_taxiway_airport1_idx (airport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE taxiway_map_point (taxiway_id INT UNSIGNED NOT NULL, map_point_id INT UNSIGNED NOT NULL, INDEX fk_taxiway_has_map_point_map_point1_idx (map_point_id), INDEX fk_taxiway_has_map_point_taxiway1_idx (taxiway_id), PRIMARY KEY(taxiway_id, map_point_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE airport');
        $this->addSql('DROP TABLE map_point');
        $this->addSql('DROP TABLE runway');
        $this->addSql('DROP TABLE runway_map_point');
        $this->addSql('DROP TABLE stand');
        $this->addSql('DROP TABLE taxiway');
        $this->addSql('DROP TABLE taxiway_map_point');
    }
}
