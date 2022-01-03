<?php


namespace App\Form;

use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddMatchFormType extends AbstractType{

    /**  formular pro create
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('homeTeam', TextType::class, array('label' => "Domácí tým"))
            ->add('awayTeam', TextType::class, array('label' => "Hostující tým"))
            ->add('matchTime', DateTimeType::class, array(
                'html5' => false,
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy HH:mm',
                'label' => "Datum a čas utkání (dd-MM-yyyy HH:mm)",
                'years' => range(2021, 2025),
            ))
            ->add('address', TextType::class, array('label' => "Adresa"))
            ->add('city', TextType::class, array('label' => "Město"))
            ->add('venue', TextType::class, array('label' => "Hala"))
            ->add('postalCode', TextType::class, array('label' => "PSČ"))
            ->add('category', NULL, array(
                'class' => Category::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.id', 'ASC');
                },
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Registrovat se',
                'attr' => array('class'=>'button expanded')
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => 'App\Entity\Matches'
        ]);
    }

}