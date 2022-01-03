<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarsEditType extends AbstractType{
    /**  formular pro create
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('carName', TextType::class, array('label' => "Model", 'attr' => ['placeholder' => "model auta"]))
            ->add('spz', TextType::class, array('label' => "SPZ", 'attr' => ['placeholder' => "spz"]))
            ->add('numberOfSeats', TextType::class, array('label' => "Počet míst", 'attr' => ['placeholder' => "počet míst"]))
            ->add('driverFirstName', TextType::class, array('label' => "Jméno majitele", 'attr' => ['placeholder' => "jméno řidiče"]))
            ->add('driverLastName', TextType::class, array('label' => "Příjmení majitele", 'attr' => ['placeholder' => "příjmení řidiče"]))
            ->add('save', SubmitType::class, array(
                'label' => 'Uložit změny',
                'attr' => array('class'=>'button expanded')
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => 'App\Entity\Cars'
        ]);
    }
}