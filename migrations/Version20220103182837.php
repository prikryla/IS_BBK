<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220103182837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ALTER first_name DROP NOT NULL');
        $this->addSql('ALTER TABLE users ALTER last_name DROP NOT NULL');
        $this->addSql('ALTER TABLE users ALTER email DROP NOT NULL');
        $this->addSql('ALTER TABLE users ALTER username DROP NOT NULL');
        $this->addSql('ALTER TABLE users ALTER password DROP NOT NULL');
        $this->addSql('ALTER TABLE users ALTER address DROP NOT NULL');
        $this->addSql('ALTER TABLE users ALTER city DROP NOT NULL');
        $this->addSql('ALTER TABLE users ALTER postal_code DROP NOT NULL');
        $this->addSql('ALTER TABLE users ALTER school DROP NOT NULL');
        $this->addSql('ALTER TABLE users ALTER date_of_birth TYPE TIMESTAMP(0) USING date_of_birth::timestamp(0) without time zone');
        $this->addSql('ALTER TABLE users ALTER date_of_birth DROP DEFAULT');
        $this->addSql('ALTER TABLE users ALTER fines DROP NOT NULL');
        $this->addSql('ALTER TABLE users ALTER dress_number DROP NOT NULL');
        $this->addSql('COMMENT ON COLUMN users.first_name IS \'First name\'');
        $this->addSql('COMMENT ON COLUMN users.last_name IS \'Last name\'');
        $this->addSql('COMMENT ON COLUMN users.postal_code IS \'Postal code\'');
        $this->addSql('COMMENT ON COLUMN users.date_of_birth IS \'Date of birth\'');
        $this->addSql('COMMENT ON COLUMN users.dress_number IS \'Dress number\'');
        $this->addSql('COMMENT ON COLUMN users.auth_role IS \'Auth role\'');
        $this->addSql('COMMENT ON COLUMN users.phone_number_player IS \'Phone number player\'');
        $this->addSql('COMMENT ON COLUMN users.phone_number_mother IS \'Phone number mother\'');
        $this->addSql('COMMENT ON COLUMN users.phone_number_father IS \'Phone number father\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE users ALTER first_name SET NOT NULL');
        $this->addSql('ALTER TABLE users ALTER last_name SET NOT NULL');
        $this->addSql('ALTER TABLE users ALTER email SET NOT NULL');
        $this->addSql('ALTER TABLE users ALTER username SET NOT NULL');
        $this->addSql('ALTER TABLE users ALTER password SET NOT NULL');
        $this->addSql('ALTER TABLE users ALTER address SET NOT NULL');
        $this->addSql('ALTER TABLE users ALTER City SET NOT NULL');
        $this->addSql('ALTER TABLE users ALTER postal_code SET NOT NULL');
        $this->addSql('ALTER TABLE users ALTER school SET NOT NULL');
        $this->addSql('ALTER TABLE users ALTER date_of_birth TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER date_of_birth DROP DEFAULT');
        $this->addSql('ALTER TABLE users ALTER fines SET NOT NULL');
        $this->addSql('ALTER TABLE users ALTER dress_number SET NOT NULL');
        $this->addSql('COMMENT ON COLUMN users.first_name IS \'First_name\'');
        $this->addSql('COMMENT ON COLUMN users.last_name IS \'Last_name\'');
        $this->addSql('COMMENT ON COLUMN users.postal_code IS \'Postal_code\'');
        $this->addSql('COMMENT ON COLUMN users.date_of_birth IS \'Date_of_birth\'');
        $this->addSql('COMMENT ON COLUMN users.dress_number IS \'Dress_number\'');
        $this->addSql('COMMENT ON COLUMN users.auth_role IS \'Auth_role\'');
        $this->addSql('COMMENT ON COLUMN users.phone_number_player IS \'Phone_number_player\'');
        $this->addSql('COMMENT ON COLUMN users.phone_number_mother IS \'Phone_number_mother\'');
        $this->addSql('COMMENT ON COLUMN users.phone_number_father IS \'Phone_number_father\'');
    }
}
