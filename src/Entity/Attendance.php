<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class Attendance
 * @package App\Entity
 * @ORM\Entity
 */
class Attendance{
        /**
         * @var integer
         * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="ID"})
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="SEQUENCE")
         * @ORM\SequenceGenerator(sequenceName="seq_attendance_id", allocationSize=1, initialValue=1)
         */
        private $id;

        /**
         * @var boolean
         * @ORM\Column(name="attendance_check", type="boolean", nullable=false, options={"comment"="Attendance_check"})
         */
        private $attendance_check;

        /**
         * @var string
         * @ORM\Column(name="date", type="string", nullable=false, options={"comment"="Date"})
         */
        private $date;

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
        protected $usersId;

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
         * @return bool
         */
        public function isAttendanceCheck(): bool
        {
            return $this->attendance_check;
        }

        /**
         * @param bool $attendance_check
         */
        public function setAttendanceCheck(bool $attendance_check): void
        {
            $this->attendance_check = $attendance_check;
        }

        public function getDate()
        {
            return $this->date;
        }

        /**
         * @param string $date
         */
        public function setDate(string $date): void
        {
            $this->date = $date;
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
            return $this->usersId;
        }

        /**
         * @param int $usersId
         */
        public function setUsersId(int $usersId): void
        {
            $this->usersId = $usersId;
        }



}
