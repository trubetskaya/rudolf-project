<?php

/**
 * Created by PhpStorm.
 * Date: 20.07.17
 * Time: 23:53
 */

namespace Application\Entity\Options {

    use Application\Entity\Vehicle;
    use Doctrine\Common\Collections\ArrayCollection;

    /**
     * Class OptionTrait
     * @package Application
     */
    trait OptionTrait
    {
        /**
         * @var  ArrayCollection
         */
        protected $vehicles;

        /**
         * Add vehicle
         * @param Vehicle $vehicle
         * @return $this
         */
        public function addVehicles(Vehicle $vehicle)
        {
            $this->vehicles->add($vehicle);
            return $this;
        }

        /**
         * Remove vehicle
         * @param Vehicle $vehicle
         * @return $this
         */
        public function removeVehicles(Vehicle $vehicle)
        {
            $this->vehicles->remove($vehicle);
            return $this;
        }

        /**
         * Get vehicles
         * @return ArrayCollection
         */
        public function getVehicles()
        {
            return $this->vehicles;
        }
    }
}
