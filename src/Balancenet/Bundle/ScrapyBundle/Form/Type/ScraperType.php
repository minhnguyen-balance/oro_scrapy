<?php

namespace Nearest\Bundle\FranchiseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FranchiseeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            // do not allow user to disable his own account
            ->add(
                'enabled',
                'choice',
                array(
                    'label'           => 'Status',
                    'required'        => true,
                    'choices'         => array('Inactive', 'Active'),
                    'empty_value'     => 'Please select',
                    'empty_data'      => '',
                    'auto_initialize' => false
                )
            )

            ->add('street')
            ->add('street2')
            ->add('city')
            ->add('postalCode')
            ->add('country')
            ->add('region')
            ->add('longitude')
            ->add('latitude')


            ->add('phone')
            ->add('fax')
            ->add('email')
            ->add('url')

            ->add('parent')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nearest\Bundle\FranchiseBundle\Entity\Franchisee'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nearest_franchise_franchisee';
    }
}
