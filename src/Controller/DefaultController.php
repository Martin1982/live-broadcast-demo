<?php

namespace App\Controller;

use Martin1982\LiveBroadcastBundle\Broadcaster\Scheduler;
use Martin1982\LiveBroadcastBundle\Exception\LiveBroadcastException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
     *
     * @throws LiveBroadcastException
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

    /**
     * @Route("/terms-of-use")
     *
     * Terms of use page
     *
     * @param Request $request
     *
     * @return Response
     */
    public function termsOfUseAction(Request $request): Response
    {
        return $this->render('default/terms_of_use.html.twig', [
            'broadcast_app_name' => $this->getParameter('app.name'),
            'broadcast_owner' => $this->getParameter('app.owner'),
            'broadcast_url' => $request->getSchemeAndHttpHost(),
        ]);
    }

    /**
     * @Route("/privacy-policy")
     *
     * Privacy policy page
     *
     * @param Request $request
     *
     * @return Response
     */
    public function privacyPolicyAction(Request $request): Response
    {
        return $this->render('default/privacy_policy.html.twig', [
            'broadcast_app_name' => $this->getParameter('app.name'),
            'broadcast_owner' => $this->getParameter('app.owner'),
            'broadcast_url' => $request->getSchemeAndHttpHost(),
        ]);
    }
}
