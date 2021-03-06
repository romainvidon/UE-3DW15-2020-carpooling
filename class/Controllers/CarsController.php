<?php

namespace App\Controllers;

use App\Services\CarsService;

class CarsController
{
    /**
     * Return the html for the create action.
     */
    public function createCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['brand']) &&
            isset($_POST['model']) &&
            isset($_POST['maxslots']) &&
            isset($_POST['user_id'])) {
            // Create the car :
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                null,
                $_POST['brand'],
                $_POST['model'],
                $_POST['maxslots'],
                $_POST['user_id']
            );
            if ($isOk) {
                $html = 'Voiture créée avec succès.';
            } else {
                $html = 'Erreur lors de la création de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getCars(): string
    {
        $html = '';

        // Get all cars :
        $carsService = new CarsService();
        $cars = $carsService->getCars();

        // Get html :
        foreach ($cars as $car) {
            $html .=
                '#' . $car->getId() . ' ' .
                $car->getBrand() . ' ' .
                $car->getModel() . ' ' .
                $car->getMaxSlots() . ' ' .
                $car->getUserId() . '<br />';
        }

        return $html;
    }

    /**
     * Update a car.
     */
    public function updateCar(): string
    {

        // TODO : cars
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['brand']) &&
            isset($_POST['model']) &&
            isset($_POST['maxslots']) &&
            isset($_POST['user_id'])) {
            // Update the car :
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                $_POST['id'],
                $_POST['brand'],
                $_POST['model'],
                $_POST['maxslots'],
                $_POST['user_id']
            );
            if ($isOk) {
                $html = 'Voiture modifiée avec succès.';
            } else {
                $html = 'Erreur lors de la modification de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the car :
            $CarsService = new CarsService();
            $isOk = $CarsService->deleteCar($_POST['id']);
            if ($isOk) {
                $html = 'Voiture supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la voiture.';
            }
        }

        return $html;
    }

    public function getCarsOptions() : string
    {
        $html = "";
        
        // Get all cars :
        $carsService = new CarsService();
        $cars = $carsService->getCars();
        
        // Get html :
        foreach ($cars as $car) {
            $html .=
                "<option value=\""
                . $car->getId()
                . "\">"
                . $car->getId()
                . " : "
                . $car->getBrand() . ' '
                . $car->getModel() . ' '
                . "</option>";
        }


        return $html;
    }
}
