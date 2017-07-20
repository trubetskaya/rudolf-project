<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.07.14
 * Time: 23:00
 */
namespace Application\Entity {

    use Zend\Form\Annotation as Form;
    use Doctrine\ORM\Mapping as ORM;
    use Doctrine\Common\Collections\ArrayCollection;

    use Lib\Entity\ { Document, ECommerceTrait };
    use Application\Entity\Options\{ Fuel, Transmission, Equipment };

    /**
     * Class Vehicle
     * @package Application
     *
     * @ORM\Entity
     * @ORM\Table(name="vehicle")
     *
     * @Form\Name("vehicle-form")
     */
    class Vehicle extends Document
    {
        use ECommerceTrait;

        /**
         * @var int
         * @Form\Type("Number")
         * @Form\Flags({"priority": 49})
         * @Form\Options({"label": "Registration date"})
         * @Form\Attributes({
         *      "id": "registration-date",
         *      "data-parsley-required"          : "true",
         *      "data-parsley-required-message"  : "Registration date value must be digit",
         *      "data-parsley-type"              : "number",
         *
         *      "class"     : "form-control",
         *      "min"       : 1930
         * })
         * @ORM\Column(name="registration_date", type="smallint", nullable=false, options={"default": 0, "comment": "Registration year"})
         */
        protected $registrationDate;

        /**
         * @var float
         * @Form\Type("Number")
         * @Form\Flags({"priority": 48})
         * @Form\Options({"label": "Engine volume"})
         * @Form\Attributes({
         *      "data-parsley-required": "true",
         *      "data-parsley-required-message": "Volume cant be empty",
         *
         *      "data-parsley-numeric": "true",
         *      "data-parsley-numeric-message": "Volume format: 99.99",
         *      "data-bv-numeric-separator": ".",
         *
         *      "id": "engine-volume",
         *      "class": "form-control",
         *      "autocomplete": "Engine volume",
         *      "pattern": "^\d+(\.\d+)?$",
         *      "step": 0.01,
         *      "min": 0.00
         * })
         * @ORM\Column(name="volume", type="decimal", precision=20, scale=2, nullable=false, unique=false, options={"default": 0, "comment": "engine volume"})
         */
        protected $volume;

        /**
         * @var float
         * @Form\Type("Number")
         * @Form\Flags({"priority": 47})
         * @Form\Options({"label": "Mileage", "id": "mileage-range"})
         * @Form\Attributes({
         *      "data-parsley-required"             : "true",
         *      "data-parsley-required-message"     : "Mileage cant be empty",
         *      "data-parsley-type"                 : "number",
         *
         *      "class"     : "form-control",
         *      "id"        : "mileage-range",
         *      "min"       : 0
         * })
         * @ORM\Column(name="mileage", type="integer", nullable=false, unique=false)
         */
        protected $mileage;

        /**
         * @var Fuel
         * @Form\Type("\DoctrineORMModule\Form\Element\EntitySelect")
         * @Form\Flags({"priority": 46})
         * @Form\Options({
         *      "label"         : "Fuel",
         *      "target_class"  : "Application\Entity\Options\Fuel",
         *      "property"      : "name",
         *      "is_method"     : true,
         *      "find_method"   : {
         *          "name"      : "findBy",
         *          "params"    : {
         *              "criteria"  : { "active" : 1 },
         *              "orderBy"   : { "index" : "ASC" }
         *          }
         *      },
         *      "allow_empty"           : false
         * })
         * @Form\Attributes({
         *      "data-parsley-required": "true",
         *      "data-parsley-required-message": "Fuel type required",
         *      "class": "form-control select2_multiple",
         *      "id": "vehicle-fuel"
         * })
         *
         * @ORM\ManyToOne(targetEntity=Options\Fuel::class)
         * @ORM\JoinColumn(name="fuel", referencedColumnName="id", nullable=false)
         **/
        protected $fuel;

        /**
         * @var Transmission
         * @Form\Type("\DoctrineORMModule\Form\Element\EntitySelect")
         * @Form\Flags({"priority": 45})
         * @Form\Options({
         *      "label"         : "Transmission",
         *      "target_class"  : "Application\Entity\Options\Transmission",
         *      "property"      : "name",
         *      "is_method"     : true,
         *      "find_method"   : {
         *          "name"      : "findBy",
         *          "params"    : {
         *              "criteria"  : { "active" : 1 },
         *              "orderBy"   : { "index" : "ASC" }
         *          }
         *      },
         *      "allow_empty"           : false
         * })
         * @Form\Attributes({
         *      "data-parsley-required": "true",
         *      "data-parsley-required-message": "Transmission type required",
         *      "class": "form-control select2_multiple",
         *      "id": "vehicle-transmission"
         * })
         *
         * @ORM\ManyToOne(targetEntity=Options\Transmission::class)
         * @ORM\JoinColumn(name="transmission", referencedColumnName="id", nullable=false)
         **/
        protected $transmission;

        /**
         * @var ArrayCollection
         * @Form\Type("\DoctrineORMModule\Form\Element\EntitySelect")
         * @Form\Flags({"priority": 44})
         * @Form\Options({
         *      "label"         : "Equipment",
         *      "target_class"  : "Application\Entity\Options\Equipment",
         *      "property"      : "name",
         *      "is_method"     : true,
         *      "find_method"   : {
         *          "name"      : "findBy",
         *          "params"    : {
         *              "criteria"  : { "active" : 1 },
         *              "orderBy"   : { "index" : "ASC" }
         *          }
         *      },
         *      "optgroup_identifier"   : "rootName",
         *      "allow_empty"           : false
         * })
         * @Form\Attributes({
         *      "data-parsley-required": "true",
         *      "data-parsley-required-message": "Options required",
         *      "class": "form-control select2_multiple",
         *      "id": "vehicle-options"
         * })
         *
         * @ORM\ManyToMany(targetEntity=Options\Equipment::class, cascade={"persist"}, inversedBy="documents")
         * @ORM\JoinTable(name="vehicle_options")
         **/
        protected $options;

        /**
         * Get transmission
         * @return Transmission
         */
        public function getTransmission()
        {
            return $this->transmission;
        }

        /**
         * Set transmission
         * @param Transmission $transmission
         * @return $this
         */
        public function setTransmission(Transmission $transmission)
        {
            $this->transmission = $transmission;
            return $this;
        }

        /**
         * Get fuel
         * @return Fuel
         */
        public function getFuel()
        {
            return $this->fuel;
        }

        /**
         * Set fuel
         * @param int $fuel
         * @return $this
         */
        public function setFuel($fuel)
        {
            $this->fuel = $fuel;
            return $this;
        }

        /**
         * Get volume
         * @return float
         */
        public function getVolume()
        {
            return $this->volume;
        }

        /**
         * Set volume
         * @param float $volume
         * @return $this
         */
        public function setVolume($volume)
        {
            $this->volume = $volume;
            return $this;
        }

        /**
         * Get mileage
         * @return float
         */
        public function getMileage()
        {
            return $this->mileage;
        }

        /**
         * Set mileage
         * @param float $mileage
         * @return $this
         */
        public function setMileage($mileage)
        {
            $this->mileage = $mileage;
            return $this;
        }

        /**
         * Get registrationDate
         * @return int
         */
        public function getRegistrationDate()
        {
            return $this->registrationDate;
        }

        /**
         * Get registrationDate
         * @param int $registrationDate
         * @return $this
         */
        public function setRegistrationDate($registrationDate)
        {
            $this->registrationDate = $registrationDate;
            return $this;
        }

        /**
         * Add option
         * @param Equipment $option
         * @return $this
         */
        public function addOptions(Equipment $option)
        {
            $this->options->add($option);
            $option->addDocuments($this);

            return $this;
        }

        /**
         * Remove option
         * @param Equipment $option
         * @return $this
         */
        public function removeOptions(Equipment $option)
        {
            $this->options->remove($option);
            return $this;
        }

        /**
         * Get options
         * @return ArrayCollection
         */
        public function getOptions()
        {
            return $this->options;
        }


        /**
         * Function jsonSerialize
         * @return array
         */
        function jsonSerialize()
        {
            return [
                "DT_RowId" => "row-{$this->getId()}",
                "doc" => [
                    "name" => $this->getName(),
                    "description" => $this->getDescription(),
                    "preview" => $this->preview(),
                    "condition" => [
                        "id" => $this->getCondition()->getId(),
                        "name" => $this->getCondition()->getName()
                    ],

                    "index" => $this->getIndex(),
                    "price" => $this->getAmount(),
                    "updated" => $this->getUpdated()
                        ->format(\DateTime::W3C)
                ],
                "links" => [
                    "edit" => '/dashboard/commerce/edit/' . $this->getId(),
                    "drop" => '/dashboard/commerce/remove/' . $this->getId(),
                ]
            ];
        }
    }
}

