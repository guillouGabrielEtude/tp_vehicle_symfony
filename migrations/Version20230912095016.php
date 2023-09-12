<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230912095016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT IDENTITY NOT NULL, name NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE customer (id INT IDENTITY NOT NULL, last_name NVARCHAR(255) NOT NULL, first_name NVARCHAR(255) NOT NULL, address NVARCHAR(255) NOT NULL, post_code NVARCHAR(255) NOT NULL, city NVARCHAR(255) NOT NULL, email NVARCHAR(255) NOT NULL, phone NVARCHAR(255) NOT NULL, driving_license NVARCHAR(255), PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE model (id INT IDENTITY NOT NULL, brand_id INT NOT NULL, name NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_D79572D944F5D008 ON model (brand_id)');
        $this->addSql('CREATE TABLE [option] (id INT IDENTITY NOT NULL, name NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE reservation (id INT IDENTITY NOT NULL, state_id INT NOT NULL, customer_id INT NOT NULL, vehicle_id INT NOT NULL, reference NVARCHAR(255) NOT NULL, date_start DATE NOT NULL, date_end DATE NOT NULL, number_rental_day INT, total_cost INT, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_42C849555D83CC1 ON reservation (state_id)');
        $this->addSql('CREATE INDEX IDX_42C849559395C3F3 ON reservation (customer_id)');
        $this->addSql('CREATE INDEX IDX_42C84955545317D1 ON reservation (vehicle_id)');
        $this->addSql('CREATE TABLE state (id INT IDENTITY NOT NULL, status NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE type (id INT IDENTITY NOT NULL, name NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE vehicle (id INT IDENTITY NOT NULL, model_id INT NOT NULL, type_id INT NOT NULL, capacity INT NOT NULL, price INT NOT NULL, number_plate NVARCHAR(255) NOT NULL, year INT NOT NULL, number_kilometers INT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_1B80E4867975B7E7 ON vehicle (model_id)');
        $this->addSql('CREATE INDEX IDX_1B80E486C54C8C93 ON vehicle (type_id)');
        $this->addSql('CREATE TABLE vehicle_option (vehicle_id INT NOT NULL, option_id INT NOT NULL, PRIMARY KEY (vehicle_id, option_id))');
        $this->addSql('CREATE INDEX IDX_F3580163545317D1 ON vehicle_option (vehicle_id)');
        $this->addSql('CREATE INDEX IDX_F3580163A7C41D6F ON vehicle_option (option_id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849555D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4867975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE vehicle_option ADD CONSTRAINT FK_F3580163545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vehicle_option ADD CONSTRAINT FK_F3580163A7C41D6F FOREIGN KEY (option_id) REFERENCES [option] (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE model DROP CONSTRAINT FK_D79572D944F5D008');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C849555D83CC1');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C849559395C3F3');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C84955545317D1');
        $this->addSql('ALTER TABLE vehicle DROP CONSTRAINT FK_1B80E4867975B7E7');
        $this->addSql('ALTER TABLE vehicle DROP CONSTRAINT FK_1B80E486C54C8C93');
        $this->addSql('ALTER TABLE vehicle_option DROP CONSTRAINT FK_F3580163545317D1');
        $this->addSql('ALTER TABLE vehicle_option DROP CONSTRAINT FK_F3580163A7C41D6F');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE [option]');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP TABLE vehicle_option');
    }
}
