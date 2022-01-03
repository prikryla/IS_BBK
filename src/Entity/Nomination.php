<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Nomination
 * @package App\Entity
 * @ORM\Entity
 */
class Nomination{
        /**
         * @var integer
         * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="ID"})
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="SEQUENCE")
         * @ORM\SequenceGenerator(sequenceName="seq_nomination_id", allocationSize=1, initialValue=1)
         */
        private $id;

        /**
         * @var Users
         * @ORM\ManyToOne(targetEntity="App\Entity\Users")
         * @ORM\JoinColumn(name="users_id", referencedColumnName="id", nullable=false)
         */
        private $users;

        /**
         * @var Matches
         * @ORM\ManyToOne(targetEntity="App\Entity\Matches")
         * @ORM\JoinColumn(name="matches_id", referencedColumnName="id", nullable=false)
         */
        private $matches;

        /**
         * @var integer
         * @ORM\Column(name="users_id", type="integer", nullable=false, options={"comment"="Users_id"})
         */
        protected $users_id;

        /**
         * @var integer
         * @ORM\Column(name="matches_id", type="integer", nullable=false, options={"comment"="Matches_id"})

         */
        protected $matches_id;

        /**
         * @return int
         */
        public function getId(): int
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
         * @return Users
         */
        public function getUsers(): Users
        {
            return $this->users;
        }

        /**
         * @param Users $users
         */
        public function setUsers(Users $users): void
        {
            $this->users = $users;
        }

        /**
         * @return Matches
         */
        public function getMatches(): Matches
        {
            return $this->matches;
        }

        /**
         * @param Matches $matches
         */
        public function setMatches(Matches $matches): void
        {
            $this->matches = $matches;
        }

        /**
         * @return int
         */
        public function getUsersId(): int
        {
            return $this->users_id;
        }

        /**
         * @param int $users_id
         */
        public function setUsersId(int $users_id): void
        {
            $this->users_id = $users_id;
        }

        /**
         * @return int
         */
        public function getMatchesId(): int
        {
            return $this->matches_id;
        }

        /**
         * @param int $matches_id
         */
        public function setMatchesId(int $matches_id): void
        {
            $this->matches_id = $matches_id;
        }


}
