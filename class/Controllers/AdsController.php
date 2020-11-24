<?php

namespace App\Controllers;

use App\Services\AdsService;

class AdsController
{
    /**
     * Return the html for the create action.
     */
    public function createAd(): string
    {
        $html = "";

        // If the form have been submitted :
        if (isset($_POST['title']) &&
            isset($_POST['description']) &&
            isset($_POST['user_id']) &&
            isset($_POST['car_id'])) {
            // Create the ad :
            $adsService = new AdsService();
            $isOk = $adsService->setAd(
                null,
                $_POST['title'],
                $_POST['description'],
                $_POST['user_id'],
                $_POST['car_id']
            );
            if ($isOk) {
                $html = 'Annonce créée avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'annonce.';
            }

            //for bootstrap flash message
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getAds(): string
    {
        $html = '';


        $adsService = new AdsService();
        $ads = $adsService->getAds();

        foreach ($ads as $ad) {
            $html .=
                '#' . $ad->getId() . ' ' .
                $ad->getTitle() . ' ' .
                $ad->getDescription() . ' ' .
                $ad->getUserId() . ' ' .
                $ad->getCarId() . '<br />';
        }

        return $html;
    }

    /**
     * Update the ad.
     */
    public function updateAd(): string
    {
        $html = "";

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['title']) &&
            isset($_POST['description']) &&
            isset($_POST['user_id']) &&
            isset($_POST['car_id'])) {
            // Update the ad :
            $AdsService = new AdsService();
            $isOk = $AdsService->setAd(
                $_POST['id'],
                $_POST['title'],
                $_POST['description'],
                $_POST['user_id'],
                $_POST['car_id']
            );
            if ($isOk) {
                $html = 'Annonce mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'annonce.';
            }
        }

        return $html;
    }

    /**
     * Delete an ad.
     */
    public function deleteAd() : string
    {
        $html = "";

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the ad :
            $adsService = new AdsService();
            $isOk = $adsService->deleteAd($_POST['id']);
            if ($isOk) {
                $html = 'Annonce supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'annonce.';
            }
        }
        
        return $html;
    }

    public function getAdsOptions() : string
    {
        $html = "";
        
        // Get all ads :
        $adsService = new AdsService();
        $ads = $adsService->getAds();
        
        // Get html :
        foreach ($ads as $ad) {
            $html .=
                "<option value=\""
                . $ad->getId()
                . "\">"
                . $ad->getId()
                . " : "
                . $ad->getTitle() . ' '
                . "</option>";
        }


        return $html;
    }
}
