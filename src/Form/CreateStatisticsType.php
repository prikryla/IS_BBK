<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateStatisticsType extends AbstractType {

    /**  formular pro create
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('successfulFt', TextType::class, array('label' => "Úspěšné trestné hody"))
            ->add('unsuccessfulFt', TextType::class, array('label' => "Neúspěšné trestné hody"))
            ->add('twoPoints', TextType::class, array('label' => "Dvojky"))
            ->add('threePoints', TextType::class, array('label' => "Trojky"))
            ->add('fouls', TextType::class, array('label' => "Fauly"))
            ->add('points', TextType::class, array('label' => "Body celkem"))
            ->add('save', SubmitType::class, array(
                'label' => 'Uložit změny',
                'attr' => array('class'=>'button expanded')
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => 'App\Entity\Player_statistics'
        ]);
    }

}