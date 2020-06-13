<?php


namespace App\Form;


use App\Entity\MachineLink;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MlinkLinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('omschrijving',null,  array('property_path' => 'mlinkTitel'))
            ->add('Url',null,  array('property_path' => 'mlinkPad'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MachineLink::class,
        ]);
    }

}

