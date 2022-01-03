<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Player_statistics
 * @package App\Entity
 * @ORM\Entity
 */
class Player_statistics{
        /**
         * @var integer
         * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="ID"})
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="SEQUENCE")
         * @ORM\SequenceGenerator(sequenceName="seq_player_statistics_id", allocationSize=1, initialValue=1)
         */
        private $id;

        /**
         * @var integer
         * @ORM\Column(name="successful_ft", type="integer", nullable=false, options={"comment"="Successful_ft"})
         */
        private $successful_ft;

        /**
         * @var integer
         * @ORM\Column(name="unsuccessful_ft", type="integer", nullable=false, options={"comment"="Unsuccessful_ft"})
         */
        private $unsuccessful_ft;

        /**
         * @var integer
         * @ORM\Column(name="two_points", type="integer", nullable=false, options={"comment"="Two_points"})
         */
        private $two_points;

        /**
         * @var integer
         * @ORM\Column(name="three_points", type="integer", nullable=false, options={"comment"="Three_points"})
         */
        private $three_points;

        /**
         * @var integer
         * @ORM\Column(name="fouls", type="integer", nullable=false, options={"comment"="Fouls"})
         */
        private $fouls;

        /**
         * @var integer
         * @ORM\Column(name="points", type="integer", nullable=false, options={"comment"="Points"})
         */
        private $points;

        /**
         * @var Users
         * @ORM\ManyToOne(targetEntity="App\Entity\Users")
         * @ORM\JoinColumn(name="users_id", referencedColumnName="id", nullable=false)
         */
        private $users;

        /**
         * @var integer
         * @ORM\Column(name="users_id", type="integer", nullable=false, options={"comment"="Users_id"})

         */
        protected $users_id;

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
         * @return int
         */
        public function getSuccessfulFt(): int
        {
            return $this->successful_ft;
        }

        /**
         * @param int $successful_ft
         */
        public function setSuccessfulFt(int $successful_ft): void
        {
            $this->successful_ft = $successful_ft;
        }

        /**
         * @return int
         */
        public function getUnsuccessfulFt(): int
        {
            return $this->unsuccessful_ft;
        }

        /**
         * @param int $unsuccessful_ft
         */
        public function setUnsuccessfulFt(int $unsuccessful_ft): void
        {
            $this->unsuccessful_ft = $unsuccessful_ft;
        }

        /**
         * @return int
         */
        public function getTwoPoints(): int
        {
            return $this->two_points;
        }

        /**
         * @param int $two_points
         */
        public function setTwoPoints(int $two_points): void
        {
            $this->two_points = $two_points;
        }

        /**
         * @return int
         */
        public function getThreePoints(): int
        {
            return $this->three_points;
        }

        /**
         * @param int $three_points
         */
        public function setThreePoints(int $three_points): void
        {
            $this->three_points = $three_points;
        }

        /**
         * @return int
         */
        public function getFouls(): int
        {
            return $this->fouls;
        }

        /**
         * @param int $fouls
         */
        public function setFouls(int $fouls): void
        {
            $this->fouls = $fouls;
        }

        /**
         * @return int
         */
        public function getPoints(): int
        {
            return $this->points;
        }

        /**
         * @param int $points
         */
        public function setPoints(int $points): void
        {
            $this->points = $points;
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
}


