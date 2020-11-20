<?php

namespace App\Controllers;

use App\Services\AdsService;

class AdsController
{
    /**
     * Return the html for the create action.
     */
    public function createAd(): array
    {
        $result = [];

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
            $result = [$html, ($isOk ? 'success' : 'danger')];
        }

        return $result;
    }

    /**
     * Return the html for the read action.
     */
    public function getAds(): array
    {
        /*$html = '';

         Get all ads :
        $adsService = new AdsService();
        $ads = $adsService->getAds();

         Get html :
        foreach ($ads as $ad) {
            $html .=
                '#' . $ad->getId() . ' ' .
                $ad->getTitle() . ' ' .
                $ad->getDescription() . ' ' .
                $ad->getUserId() . ' ' .
                $ad->getCarId() . '<br />';
        }

        return $html;*/


        // Get all ads :
        $adsService = new AdsService();
        $ads = $adsService->getAds();

        return $ads;
    }

    /*
     * Get an Ad Id 
     

     public function getAdId():string
     {
         $id = '';

         $ad = new AdsService;
         $adId = $ad->getAdIds();
         foreach ($adId as $id){
             $id = $id->setAdId();
         }
         var_dump($id); die();
         return $id;
     }*/

    /**
     * Update the ad.
     */
    public function updateAd(): array
    {

        $result = [];

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

            //for bootstrap flash message
            $result = [$html, ($isOk ? "success" : "danger")];
        }

        return $result;
    }

    /**
     * Delete an ad.
     */
    public function deleteAd()
    {

        $result = [];

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
            //for bootstrap flash message
            $result = [$html, ($isOk ? "success" : "danger")];
        }
        
        return $result;
    }
}
