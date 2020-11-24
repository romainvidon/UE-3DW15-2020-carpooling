<?php

namespace App\Controllers;

use App\Services\CommentsService;

class CommentsController
{
    /**
     * Return the html for the create action.
     */
    public function createComment(): string
    {
        $html = "";

        // If the form have been submitted :
        if (isset($_POST['message']) &&
            isset($_POST['user_id']) &&
            isset($_POST['ad_id'])) {
            // Create the comment :
            $commentsService = new CommentsService();
            $isOk = $commentsService->setComment(
                null,
                $_POST['message'],
                $_POST['user_id'],
                $_POST['ad_id']
            );
            if ($isOk) {
                $html = 'Commentaire créée avec succès.';
            } else {
                $html = 'Erreur lors de la création du commentaire.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getComments(): string
    {
        $html = '';

        // Get all comments :
        $commentService = new CommentsService();
        $comments = $commentService->getComments();

        // Get html :
        foreach ($comments as $comment) {
            $html .=
                '#' . $comment->getId() . ' ' .
                $comment->getMessage() . ' ' .
                $comment->getUserId() . ' ' .
                $comment->getAdId() . '<br />';
        }

        return $html;
    }

    public function updateComment(): string
    {
        $html = "";

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['message']) &&
            isset($_POST['user_id']) &&
            isset($_POST['ad_id'])) {
            // Create the comment :
            $commentsService = new CommentsService();
            $isOk = $commentsService->setComment(
                $_POST['id'],
                $_POST['message'],
                $_POST['user_id'],
                $_POST['ad_id']
            );
            if ($isOk) {
                $html = 'Commentaire modifié avec succès.';
            } else {
                $html = 'Erreur lors de la modification du commentaire.';
            }
        }

        return $html;
    }
    /**
     * Delete a car.
     */
    public function deleteComment(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the car :
            $commentService = new CommentsService();
            $isOk = $commentService->deleteComment($_POST['id']);
            if ($isOk) {
                $html = 'Commentaire supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression du commentaire.';
            }
        }

        return $html;
    }

    public function getCommentsOptions() : string
    {
        $html = "";
        
        // Get all ads :
        $commentsService = new CommentsService();
        $comments = $commentsService->getComments();
        
        // Get html :
        foreach ($comments as $comment) {
            $html .=
                "<option value=\""
                . $comment->getId()
                . "\">"
                . $comment->getId()
                . " : "
                . $comment->getMessage() . ' '
                . "</option>";
        }


        return $html;
    }
}
