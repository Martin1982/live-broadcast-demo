<?php

namespace App\Controller;

use Martin1982\LiveBroadcastBundle\Broadcaster\Scheduler;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    protected $scheduler;

    public function __construct(Scheduler $scheduler)
    {
        $this->scheduler = $scheduler;
    }

    /**
     * @Route("/", name="homepage")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function indexAction(Request $request): Response
    {
        $schedule = null;

        if ($request->get('schedule') === '1') {
            $this->scheduler->applySchedule();

            $schedule = 'Running scheduler..';
        }

        return $this->render('default/index.html.twig', [
            'schedule' => $schedule,
        ]);
    }
}
