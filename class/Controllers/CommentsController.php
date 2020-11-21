<?php

namespace App\Controllers;

use App\Services\CommentsService;

class CommentsController
{
    /**
     * Return the html for the create action.
     */
    public function createComment(): array
    {
        $result = [];

        // If the form have been submitted :
        if (isset($_POST['message'])) {
            // Create the com :
            $commentsService = new CommentsService();
            $isOk = $commentsService->createComment(
                null,
                $_POST['message']
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

}
