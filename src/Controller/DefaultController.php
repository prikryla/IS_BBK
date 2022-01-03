<?php

namespace App\Controller;


use App\Form\UserChangePasswordType;
use App\Form\UserEditType;
use App\Form\UserRegisterType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\Users;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends AbstractController{

    /**
     * @Route("/", name="default")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request): Response
    {
        return $this->redirectToRoute('login');
    }

    /**
     * @Route("/home", name="homepage")
     * @param Request $request
     * @return Response
     */
    public function showHomepage(Request $request): Response
    {
        return $this->render('homepage.html.twig');
    }

    /**
     * @Route("/register", name="user_registration")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return RedirectResponse|Response
     * @throws Exception
     */
    public function usersRegistration(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

// 1) build the form
        $user = new Users();
        $form = $this->createForm(UserRegisterType::class, $user);

// 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $randomBytes = random_bytes(32);
            $user->setSalt(bin2hex($randomBytes));

            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            //      $user->setUsername($user->getEmail());
            //$user->setUsername($user->getEmail());
            $user->setAuthRole('ROLE_PLAYER');
            $user->setFines(0);
            $user->setDressNumber(0);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // dump($user);

            $session = new Session();
            $session->getFlashBag()->add('notice', 'Profil vytvořen.');

            $this->addFlash(
                'notice',
                'Uživatel byl úspěšně zaregistrován! Nyní se můžete přihlásit!'
            );

            return $this->redirectToRoute('login');
        }

        return $this->render(
            'registration.html.twig', array('form' => $form->createView())
        );
    }

    /**
     * @Route("/profil", name="user-detail")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function showUsersProfile(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
//        if(!$user = $this->getUser()) {
//            return $this->redirectToRoute('login');
//        }

        $user = $this->getUser();

        return $this->render('userProfile.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/profil/{userId}", name="user-profile")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param $userId
     * @return Response
     */
    public function showUsersProfileDetail(Request $request, UserPasswordEncoderInterface $passwordEncoder, $userId)
    {
//        if(!$user = $this->getUser()) {
//            return $this->redirectToRoute('login');
//        }

        $user = $this->getDoctrine()->getRepository('App:Users')->findOneBy(array('id' => $userId));

        return $this->render('userProfileTeam.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/profil/edit/{userId}", name="user-edit")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param $userId
     * @return Response
     */
    public function editUsersProfile(Request $request, EntityManagerInterface $em, $userId)
    {
        $user = $this->getDoctrine()->getRepository('App:Users')->findOneBy(array('id' => $userId));

        $form = $this->createForm(UserEditType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();

            $em->persist($user);
            $em->flush();

            $this->addFlash(
                'notice',
                'Změny byly uloženy!'
            );

            return $this->redirectToRoute('user-detail');
        }
        return $this->render('userEdit.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route ("/profil/changePassword/{userId}", name="user-changePassword")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param $userId
     * @param \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface $tokenStorage
     * @return Response
     * @throws \Exception
     */
    public function changeUsersPassword(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder, $userId, TokenStorageInterface $tokenStorage){
        $user = $this->getDoctrine()->getRepository('App:Users')->findOneBy(array('id' => $userId));

        $form = $this->createForm(UserChangePasswordType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            if ($user->getPlainPassword()) {
                $randomBytes = random_bytes(32);
                $user->setSalt(bin2hex($randomBytes));
                $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($password);
            }
            $tokenStorage->setToken();

            $em->persist($user);
            $em->flush();

            $this->addFlash(
                'notice',
                'Nové heslo bylo uloženo!'
            );


            return $this->redirectToRoute('login');
        }
        return $this->render('userChangePassword.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route ("/user/delete/{usersId}/{userId}", name="delete-user")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param $userId
     * @param $usersId
     * @return RedirectResponse
     */
    public function deleteUsers(Request $request, EntityManagerInterface $em, $userId, $usersId){

            $em = $this->getDoctrine()->getManager();

            $user = $em->getRepository('App:Users')->find($userId);

            $currentUser = $usersId;
            $em->remove($user);
            $em->flush();

            $this->addFlash(
                'warning',
                'Uživatel byl odstraněn!'
            );

            return $this->redirectToRoute('show-club');
    }


}
