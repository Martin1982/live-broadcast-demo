<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $schedule = null;

        if ($request->get('schedule') === '1') {
            $scheduler = $this->get('live.broadcast.scheduler');
            $scheduler->applySchedule();

            $schedule = 'Running scheduler..';
        }

        return $this->render('default/index.html.twig', [
            'schedule' => $schedule,
        ]);
    }
}
