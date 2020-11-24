<?php

namespace App\Services;

use App\Entities\Comment;

class CommentsService
{
    /**
     * Create or update a comment.
     */
    public function setComment(?string $id, string $message, string $user_id, string $ad_id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createComment($message, $user_id, $ad_id);
        } else {
            $isOk = $dataBaseService->updateComment($id, $message, $user_id, $ad_id);
        }

        return $isOk;
    }

    /**
     * Return all users.
     */
    public function getComments(): array
    {
        $comments = [];

        $dataBaseService = new DataBaseService();
        $commentDTO = $dataBaseService->getComments();
        if (!empty($commentDTO)) {
            foreach ($commentDTO as $commentDTO) {
                $comment = new Comment();
                $comment->setId($commentDTO['id']);
                $comment->setMessage($commentDTO['message']);
                $comment->setUserId($commentDTO['user_id']);
                $comment->setAdId($commentDTO['ad_id']);
                $comments[] = $comment;
            }
        }

        return $comments;
    }

    /**
     * Delete a comment.
     */
    public function deleteComment(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteComment($id);

        return $isOk;
    }
}
