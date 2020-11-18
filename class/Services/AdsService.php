<?php

namespace App\Services;

use App\Entities\Ad;

class AdsService
{
    /**
     * Create or update an ad.
     */
    public function setAd(?string $id, string $title, string $description, string $user_id, string $car_id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createAd($title, $description, $user_id, $car_id);
        } else {
            //* TODO : update an ad
        }

        return $isOk;
    }

    /**
     * Return all ads.
     */
    public function getAds(): array
    {
        $ads = [];

        $dataBaseService = new DataBaseService();
        $adsDTO = $dataBaseService->getAds();
        if (!empty($adsDTO)) {
            foreach ($adsDTO as $adDTO) {
                $ad = new Ad();
                $ad->setId($adDTO['id']);
                $ad->setTitle($adDTO['title']);
                $ad->setDescription($adDTO['description']);
                $ad->setUserId($adDTO['user_id']);
                $ad->setCarId($adDTO['car_id']);
                $ads[] = $ad;
            }
        }

        return $ads;
    }
}
