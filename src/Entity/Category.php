<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Category
 * @package App\Entity
 * @ORM\Entity
 */
class Category{

        /**
         * @var integer
         * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="ID"})
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="SEQUENCE")
         * @ORM\SequenceGenerator(sequenceName="seq_category_id", allocationSize=1, initialValue=1)
         */
        private $id;

        /**
         * @var string
         * @ORM\Column(name="name", type="string", nullable=false, options={"comment"="Name"})
         */
        private $name;


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
        public function getName(): string
        {
            return $this->name;
        }

        public function __toString(){
            return $this->getName();
        }



}
