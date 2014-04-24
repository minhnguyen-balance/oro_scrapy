<?php

namespace Balancenet\Bundle\ScrapyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('scraper_scheduler_conf', 'textarea', array('label'=>'Scraper scheduler config'))
            ->add('checker_scheduler_conf', 'textarea', array('label'=>'Checker scheduler config'))
            ->add('comments')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Balancenet\Bundle\ScrapyBundle\Entity\ScrapedObjClass'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'balancenet_scrapy_scrapedobjclass';
    }
}
