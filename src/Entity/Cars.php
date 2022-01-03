<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Cars
 * @package App\Entity
 * @ORM\Entity
 */
class Cars{
        /**
         * @var integer
         * @ORM\Column(name="id", type="integer", nullable=false,
         *             options={"comment"="ID"})
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="SEQUENCE")
         * @ORM\SequenceGenerator(sequenceName="seq_cars_id",
         *                        allocationSize=1, initialValue=1)
         */
        private $id;

        /**
         * @var string
         * @ORM\Column(name="car_name", type="string", nullable=false,
         *             options={"comment"="Car_name"})
         */
        private $car_name;

        /**
         * @var string
         * @ORM\Column(name="spz", type="string", nullable=false,
         *             options={"comment"="Spz"})
         */
        private $spz;

        /**
         * @var integer
         * @ORM\Column(name="number_of_seats", type="integer", nullable=false, options={"comment"="Number_of_seats"})
         */
        private $number_of_seats;

        /**
         * @var string
         * @ORM\Column(name="driver_first_name", type="string", nullable=false, options={"comment"="Driver_first_name"})
         */
        private $driver_first_name;

        /**
         * @var string
         * @ORM\Column(name="driver_last_name", type="string", nullable=false, options={"comment"="Driver_last_name"})
         */
        private $driver_last_name;

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
         * @return string
         */
        public function getCarName(): string
        {
            return $this->car_name;
        }

        /**
         * @param string $car_name
         */
        public function setCarName(string $car_name): void
        {
            $this->car_name = $car_name;
        }

        /**
         * @return string
         */
        public function getSpz(): string
        {
            return $this->spz;
        }

        /**
         * @param string $spz
         */
        public function setSpz(string $spz): void
        {
            $this->spz = $spz;
        }

        /**
         * @return int
         */
        public function getNumberOfSeats(): int
        {
            return $this->number_of_seats;
        }

        /**
         * @param int $number_of_seats
         */
        public function setNumberOfSeats(int $number_of_seats): void
        {
            $this->number_of_seats = $number_of_seats;
        }

        /**
         * @return string
         */
        public function getDriverFirstName(): string
        {
            return $this->driver_first_name;
        }

        /**
         * @param string $driver_first_name
         */
        public function setDriverFirstName(string $driver_first_name): void
        {
            $this->driver_first_name = $driver_first_name;
        }

        /**
         * @return string
         */
        public function getDriverLastName(): string
        {
            return $this->driver_last_name;
        }

        /**
         * @param string $driver_last_name
         */
        public function setDriverLastName(string $driver_last_name): void
        {
            $this->driver_last_name = $driver_last_name;
        }


}
