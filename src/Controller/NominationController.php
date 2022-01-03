<?php


namespace App\Controller;


use App\Entity\Nomination;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Routing\Annotation\Route;

class NominationController extends AbstractController{

    /**
     * @Route("/matches/nomination/{matchId}", name="create-nomination")
     * @param Request $request
     * @param $matchId
     * @param UserInterface $user
     * @return Response
     */
    public function createNomination(Request $request, $matchId, UserInterface $user): Response
    {
        $match = $this->getDoctrine()->getRepository('App:Matches')->findOneBy(array('id' => $matchId));
        $players = $this->getDoctrine()->getRepository('App:Users')->findAll();
        $nomination = $this->getDoctrine()->getRepository('App:Nomination')->findBy(array('matches_id' => $matchId));
        $get = $this->get('security.token_storage')->getToken()->getUser();
        $user = $get->getCategoryId();

        $team = [];

        foreach ($players as $player){
            if ($user == $player->getCategoryId())
                array_push($team, $player);
        }

        return $this->render('createNomination.html.twig',[
            'team' => $team,
            'match' => $match,
            'nomination' => $nomination
        ]);
    }

    /**
     * @Route("/matches/nomination/{matchId}/{userId}", name="submit-nomination")
     * @param Request $request
     * @param $matchId
     * @param $userId
     * @return Response
     */
    public function submitCreateNomination(Request $request, $matchId, $userId): Response{

        $em = $this->getDoctrine()->getManager();

        $user = $this->getDoctrine()->getRepository('App:Users')->findOneBy(array('id' => $userId));
        $match = $this->getDoctrine()->getRepository('App:Matches')->findOneBy(array('id' => $matchId));

        $nomination = new Nomination();

        $nomination->setMatchesId($matchId);
        $nomination->setUsersId($userId);
        $nomination->setMatches($match);
        $nomination->setUsers($user);

        $em->persist($nomination);
        $em->flush();

        $this->addFlash(
            'notice',
            'Nominace byla potvrzena!'
        );

        return $this->redirectToRoute('create-nomination', array(
            'matchId' => $matchId
        ));
    }

    /**
     * @Route("/matches/nomination/{matchId}/{userId}/delete", name="delete-nomination")
     * @param Request $request
     * @param $matchId
     * @param $userId
     * @return Response
     */
    public function deleteNomination(Request $request, $matchId, $userId): Response{

        $em = $this->getDoctrine()->getManager();

        $nomination = $em->getRepository('App:Nomination')->findOneBy(array(
            'matches_id' => $matchId,
            'users_id' => $userId
        ));

        $em->remove($nomination);
        $em->flush();

        $this->addFlash(
            'warning',
            'Nominace byla odstraněna!'
        );

        return $this->redirectToRoute('create-nomination', [
            'matchId' => $matchId
        ]);
    }
}