<?php

namespace tomsyrovy\ContentEditableBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tomsyrovy\Controller\DefaultControllerInterface;

class DefaultController extends Controller implements DefaultControllerInterface
{

    /**
     * @inheritdoc
     */
    public function loadAction($contentEditable_id){

    }

    /**
     * @inheritdoc
     */
    public function saveAction($contentEditable_id, $content)
    {

    }
}
