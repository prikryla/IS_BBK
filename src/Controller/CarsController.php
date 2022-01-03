<?php


namespace App\Controller;


use App\Entity\Cars;
use App\Form\CarsAddType;
use App\Form\CarsEditType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarsController extends AbstractController {

    /**
     * @Route("/cars", name="show-cars")
     * @param Request $request
     * @return Response
     */
    public function showCars(Request $request): Response
    {
        $cars = $this->getDoctrine()->getRepository('App:Cars')->findAll();

        $allCars = [];

        foreach ($cars as $car){
            array_push($allCars, $car);
        }

        return $this->render('showCars.html.twig',[
            'cars' => $allCars,
        ]);
    }

    /**
     * @Route("/cars/create", name="create-cars")
     * @param Request $request
     * @return Response
     */
    public function addCars(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        $car = new Cars();
        $form = $this->createForm(CarsAddType::class, $car);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $car = $form->getData();
            $em->persist($car);
            $em->flush();

            $this->addFlash(
                'notice',
                'Nové auto bylo úspěšně přidáno!'
            );

            return $this->redirectToRoute('show-cars');
        }

        return $this->render('addCars.html.twig', [
            'car' => $car,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/cars/edit/{carsId}", name="edit-cars")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param $carsId
     * @return Response
     */
    public function editCars(Request $request, $carsId, EntityManagerInterface $em): Response
    {
        $car = $this->getDoctrine()->getRepository('App:Cars')->findOneBy(array('id' => $carsId));

        $form = $this->createForm(CarsEditType::class, $car);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $car = $form->getData();

            $em->persist($car);
            $em->flush();

            $this->addFlash(
                'notice',
                'Změny byly uloženy!'
            );

            return $this->redirectToRoute('show-cars');
        }

        return $this->render('editCar.html.twig',[
           'car' => $car,
           'form' => $form->createView()
        ]);
    }



}