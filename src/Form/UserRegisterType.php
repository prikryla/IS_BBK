<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Users;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;

class UserRegisterType extends AbstractType
{
    /**  formular pro create
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array('label' => "Uživatelské jméno", 'attr' => ['placeholder' => "uživatelské jméno"]))
            ->add('firstName', TextType::class, array('label' => "Jméno", 'attr' => ['placeholder' => "jméno"]))
            ->add('lastName', TextType::class, array('label' => "Příjmení", 'attr' => ['placeholder' => "příjmení"]))
            ->add('email', EmailType::class, array('label' => "Email", 'attr' => ['placeholder' => "email@email.cz"]))

            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'Zadaná hesla nejsou stejná.',
                'first_options' => array('label' => "Heslo", 'attr' => ['placeholder' => "heslo"]),
                'second_options' => array('label' => "Heslo znovu", 'attr' => ['placeholder' => "heslo"])
            ))
            ->add('address', TextType::class, array('label' => "Adresa"))
            ->add('city', TextType::class, array('label' => "Město"))
            ->add('postalCode', TextType::class, array('label' => "PSČ"))
            ->add('school', TextType::class, array('label' => "Škola"))
            ->add('dateOfBirth', DateTimeType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'html5' => false
            ))
            ->add('phoneNumberPlayer', TextType::class, array(
                'label' => "Telefon na hráče",
                'empty_data' => ''
            ))
            ->add('phoneNumberMother', TextType::class, array(
                'label' => "Telefon na matku",
                'empty_data' => ''
            ))
            ->add('phoneNumberFather', TextType::class, array(
                'label' => "Telefon na otce",
                'empty_data' => ''
            ))
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
            'data_class' => 'App\Entity\Users'
        ]);
    }
}