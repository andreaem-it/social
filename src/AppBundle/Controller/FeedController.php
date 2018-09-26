<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Feeds;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FeedController extends Controller {

    public function feedAction() {


        return $this->render('template/feed.html.twig',[
            'feeds' => $this->getDoctrine()->getRepository(Feeds::class)->findAll(),
            'func' => $this
        ]);
    }

    /**
     * @Route("ajax/post/status" , name="ajax_post_status")
     */
    public function ajaxPostFeedAction() {

    }

    /**
     * @Route("post/action", name="post_action")
     */
    public function postAction($form) {



        return $this->render('template/status.bar.html.twig', [
            'form' => $form
            ]);
    }

    public function convertUIDName($uid) {
        return $this->getDoctrine()->getRepository(User::class)->find($uid)->getFirstname() . ' ' . $this->getDoctrine()->getRepository(User::class)->find($uid)->getLastname();
    }
}