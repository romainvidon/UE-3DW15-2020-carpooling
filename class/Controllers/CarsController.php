<?php

namespace App\Controllers;

use App\Services\CarsService;
use App\Services\User;

class CarsController
{
    /**
     * Return the html for the create action.
     */
    public function createCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['model']) &&
            isset($_POST['user_id'])) {
            // Create the car :
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                null,
                $_POST['model'],
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
                $car->getModel() . ' ' .
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
        if (isset($_POST['id']) &&
            isset($_POST['model']) &&
            isset($_POST['user_id'])) {
            // Update the car :
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                $_POST['id'],
                $_POST['model'],
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
        
        // Get all users, to get their names
        $usersService = new UserService();
        $users = $usersService->getUsers();
        
        // Get html :
        foreach ($cars as $car) {
            $html .=
                "<option value=\""
                . $car->getId()
                . "\">"
                . $car->getFirstname() . ' '
                . $car->getLastname() . ' '
                . "</option>";
        }


        return $html;
    }

}
