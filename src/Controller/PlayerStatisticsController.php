<?php


namespace App\Controller;


use App\Entity\Player_statistics;
use App\Form\CreateStatisticsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerStatisticsController extends AbstractController {

    /**
     * @Route ("/statistics", name="show-statistics")
     * @param Request $request
     * @return Response
     */
    public function showStatistics(Request $request): Response
    {
        $statistics = $this->getDoctrine()->getRepository('App:Player_statistics')->findAll();

        return $this->render('showStatistics.html.twig',[
            'statistics' => $statistics
        ]);
    }

    /**
     * @Route ("/statistics/create", name="create-statistics")
     * @param Request $request
     * @return Response
     */
    public function createStatistics(Request $request): Response
    {
        $users = $this->getDoctrine()->getRepository('App:Users')->findAll();

        return $this->render('createStatistics.html.twig',[
            'users' => $users
        ]);
    }

    /**
     * @Route ("/statistics/create/{userId}", name="create-statistics-user")
     * @param Request $request
     * @param $userId
     * @return Response
     */
    public function createUsersStatistics(Request $request, $userId): Response
    {
        $statistic = new Player_statistics();

        $form = $this->createForm(CreateStatisticsType::class, $statistic);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()){

            $user = $this->getDoctrine()->getRepository('App:Users')->findOneBy(array('id' => $userId));
//            $statistic->setUsersId($userId);
            $statistic->setUsers($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($statistic);
            $em->flush();

            $this->addFlash(
                'notice',
                'Statistika byla uložena!'
            );

            return $this->redirectToRoute('show-statistics');
        }

        return $this->render('createStatisticsUser.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route ("/statistics/show/{userId}", name="show-statistics-user")
     * @param Request $request
     * @param $userId
     * @return Response
     */
    public function showUsersStatistics(Request $request, $userId): Response
    {
        $statistics = $this->getDoctrine()->getRepository('App:Player_statistics')->findBy(array('users_id' => $userId));

        return $this->render('showUsersStatistics.html.twig',[
            'statistics' => $statistics
        ]);
    }

}