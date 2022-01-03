<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTimeValidator;
use Symfony\Component\Validator\Constraints\DateTime;

/**
     * Class Users
     * @package App\Entity
     * @ORM\Entity
     */
    class Users implements UserInterface, \Serializable
    {

        /**
         * @var integer
         * @ORM\Column(name="id",
         *             type="integer",
         *             nullable=false,
         *             options={"comment"="Id"})
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="SEQUENCE")
         * @ORM\SequenceGenerator(sequenceName="seq_user_id",
         *                        allocationSize=1,
         *                        initialValue=1)
         */
        private $id;

        /**
         * @var string
         * @ORM\Column(name="first_name",
         *             type="string",
         *             nullable=true,
         *             options={"comment"="First name"})
         */
        private $firstName;

        /**
         * @var string
         * @ORM\Column(name="last_name",
         *             type="string",
         *             nullable=true,
         *             options={"comment"="Last name"})
         */
        private $lastName;

        /**
         * @var string
         * @ORM\Column(name="email", type="string", nullable=true, options={"comment"="Email"})
         */
        private $email;

        /**
         * @var string
         * @ORM\Column(name="username", type="string", nullable=true, options={"comment"="Username"})
         */
        private $username;

        /**
         * @var string
         * @ORM\Column(name="password", type="string", nullable=true, options={"comment"="Password"})
         */
        private $password;

        /**
         * @var string
         * @ORM\Column(name="salt", type="string", nullable=false, options={"default"="tmpSolution"})
         */
        private $salt;

        /**
         * @var string
         * @ORM\Column(name="address", type="string", nullable=true, options={"comment"="Address"})
         */
        private $address;

        /**
         * @var string
         * @ORM\Column(name="City", type="string", nullable=true, options={"comment"="City"})
         */
        private $city;

        /**
         * @var string
         * @ORM\Column(name="postal_code", type="string", nullable=true, options={"comment"="Postal code"})
         */
        private $postalCode;

        /**
         * @var string
         * @ORM\Column(name="school", type="string", nullable=true, options={"comment"="School"})
         */
        private $school;

        /**
         * @var DateTime
         * @ORM\Column(name="date_of_birth", type="datetime", nullable=false, options={"comment"="Date of birth"})
         */
        private DateTime $dateOfBirth;

        /**
         * @var integer
         * @ORM\Column(name="fines", type="integer", nullable=true, options={"comment"="Fines"})
         */
        private $fines;

        /**
         * @var integer
         * @ORM\Column(name="dress_number", type="integer", nullable=true, options={"comment"="Dress number"})
         */
        private $dressNumber;

        /**
         * @var string
         * @ORM\Column(name="auth_role", type="string", nullable=false, options={"comment"="Auth role"})
         */
        private $authRole;

        /**
         * @var string
         * @ORM\Column(name="phone_number_player", type="string", nullable=true, options={"comment"="Phone number player"})
         */
        private $phoneNumberPlayer;

        /**
         * @var string
         * @ORM\Column(name="phone_number_mother", type="string", nullable=true, options={"comment"="Phone number mother"})
         */
        private $phoneNumberMother;

        /**
         * @var string
         * @ORM\Column(name="phone_number_father", type="string", nullable=true, options={"comment"="Phone number father"})
         */
        private $phoneNumberFather;

        /**
         * @Assert\Length(min=7,
         *     minMessage="Heslo musí obsahovat minimálně 7 znaků.")
         * @Assert\Length(max=4096,
         *     maxMessage="Heslo může obsahovat maximálně 4096 znaků.")
         * @Assert\Regex(
         *     pattern="/\d/",
         *     match=true,
         *     message="Heslo musí obsahovat číslo."
         * )
         * @Assert\Regex(
         *     pattern="/[A-Z]/",
         *     match=true,
         *     message="Heslo musí obsahovat velké písmeno."
         * )
         * @Assert\Regex(
         *     pattern="/[a-z]/",
         *     match=true,
         *     message="Heslo musí obsahovat malé písmeno."
         * )
         */
        private $plainPassword;


        /**
         * @var \App\Entity\Category
         * @ORM\ManyToOne(targetEntity="App\Entity\Category")
         * @ORM\JoinColumn(name="category_id",
         *                 referencedColumnName="id",
         *                 nullable=true)
         */
        private $category;

        /**
         * @var integer
         * @ORM\Column(name="category_id",
         *             type="integer",
         *             nullable=true,
         *             options={"comment"="Category_id"})
         */
        protected $category_id;

        /**
         * @return int
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param int $id
         */
        public function setId(int $id): void
        {
            $this->id = $id;
        }

        /**
         * @return string
         */
        public function getFirstName()
        {
            return $this->firstName;
        }

        /**
         * @param string $firstName
         */
        public function setFirstName(string $firstName): void
        {
            $this->firstName = $firstName;
        }

        /**
         * @return string
         */
        public function getLastName()
        {
            return $this->lastName;
        }

        /**
         * @param string $lastName
         */
        public function setLastName(string $lastName): void
        {
            $this->lastName = $lastName;
        }

        /**
         * @return string
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param string $email
         */
        public function setEmail(string $email): void
        {
            $this->email = $email;
        }

        /**
         * @return string
         */
        public function getUsername(): string
        {
            return $this->username;
        }

        /**
         * @param string $username
         */
        public function setUsername(string $username): void
        {
            $this->username = $username;
        }

        /**
         * @return string
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param string $password
         */
        public function setPassword(string $password): void
        {
            $this->password = $password;
        }

        /**
         * @return string
         */
        public function getSalt()
        {
            return $this->salt;
        }

        /**
         * @param string $salt
         */
        public function setSalt(string $salt): void
        {
            $this->salt = $salt;
        }

        /**
         * @return string
         */
        public function getAddress()
        {
            return $this->address;
        }

        /**
         * @param string $address
         */
        public function setAddress(string $address): void
        {
            $this->address = $address;
        }

        /**
         * @return string
         */
        public function getCity()
        {
            return $this->city;
        }

        /**
         * @param string $city
         */
        public function setCity(string $city): void
        {
            $this->city = $city;
        }

        /**
         * @return string
         */
        public function getPostalCode()
        {
            return $this->postalCode;
        }

        /**
         * @param string $postalCode
         */
        public function setPostalCode(string $postalCode): void
        {
            $this->postalCode = $postalCode;
        }

        /**
         * @return string
         */
        public function getSchool()
        {
            return $this->school;
        }

        /**
         * @param string $school
         */
        public function setSchool(string $school): void
        {
            $this->school = $school;
        }

        public function getDateOfBirth()
        {
            return $this->dateOfBirth;
        }

        /**
         * @param DateTime $dateOfBirth
         */
        public function setDateOfBirth(DateTime $dateOfBirth)
        {
            $this->dateOfBirth = $dateOfBirth ;
        }

        /**
         * @return Category
         */
        public function getCategory(): ?Category
        {
            return $this->category;
        }

        /**
         * @param \App\Entity\Category|null $category
         */
        public function setCategory(Category $category = null): void
        {
            $this->category = $category;
        }

        /**
         * @return int
         */
        public function getCategoryId(): int
        {
            return $this->category_id;
        }

//        /**
//         * @param int $category_id
//         */
//        public function setCategoryId(int $category_id): void
//        {
//            $this->category_id = $category_id;
//        }

        /**
         * @return int
         */
        public function getFines()
        {
            return $this->fines;
        }

        /**
         * @param int $fines
         */
        public function setFines(int $fines): void
        {
            $this->fines = $fines;
        }

        /**
         * @return int
         */
        public function getDressNumber()
        {
            return $this->dressNumber;
        }

        /**
         * @param int $dressNumber
         */
        public function setDressNumber(int $dressNumber): void
        {
            $this->dressNumber = $dressNumber;
        }

        /**
         * @return string
         */
        public function getAuthRole()
        {
            return $this->authRole;
        }

        /**
         * @param string $authRole
         */
        public function setAuthRole(string $authRole): void
        {
            $this->authRole = $authRole;
        }

        /**
         * @return string
         */
        public function getPhoneNumberPlayer()
        {
            return $this->phoneNumberPlayer;
        }

        /**
         * @param string $phoneNumberPlayer
         */
        public function setPhoneNumberPlayer(string $phoneNumberPlayer): void
        {
            $this->phoneNumberPlayer = $phoneNumberPlayer;
        }

        /**
         * @return string
         */
        public function getPhoneNumberMother()
        {
            return $this->phoneNumberMother;
        }

        /**
         * @param string $phoneNumberMother
         */
        public function setPhoneNumberMother(string $phoneNumberMother): void
        {
            $this->phoneNumberMother = $phoneNumberMother;
        }

        /**
         * @return string
         */
        public function getPhoneNumberFather()
        {
            return $this->phoneNumberFather;
        }

        /**
         * @param string $phoneNumberFather
         */
        public function setPhoneNumberFather(string $phoneNumberFather): void
        {
            $this->phoneNumberFather = $phoneNumberFather;
        }

        /**
         * @return mixed
         */
        public function getPlainPassword()
        {
            return $this->plainPassword;
        }

        /**
         * @param mixed $plainPassword
         */
        public function setPlainPassword($plainPassword): void
        {
            $this->plainPassword = $plainPassword;
        }

        public function getRoles()
        {
            return array($this->getAuthRole());
        }

        public function eraseCredentials()
        {
        }

        /** @see \Serializable::serialize() */
        public function serialize()
        {
            return serialize(array(
                $this->id,
                $this->username,
                $this->password,
                // see section on salt below
                $this->salt,
            ));
        }

        /** @param $serialized
         * @see \Serializable::unserialize()
         */
        public function unserialize($serialized)
        {
            list (
                $this->id,
                $this->username,
                $this->password,
                // see section on salt below
                $this->salt
                ) = unserialize($serialized, array('allowed_classes' => false));
        }
    }