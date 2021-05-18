<?php
namespace App\Controller;

use App\Model\Message;
use Base\AbstractController;
use Base\RedirectException;

class Admin extends AbstractController
{
    public function preDispatch()
    {
        parent::preDispatch();
        if(!$this->getUser() || !$this->getUser()->isAdmin()) {
            try {
                $this->redirect('/');
            } catch (RedirectException $e) {
            }
        }
    }

    public function deleteMessage()
    {
        $messageId = (int) $_GET['id'];
        Message::deleteMessage($messageId);
        $this->redirect('/blog');
    }
}