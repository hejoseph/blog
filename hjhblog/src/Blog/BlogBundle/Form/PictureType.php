<?php

namespace Blog\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PictureType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file','file', array('required' => false, 'label' => 'File Path'))
            ->add('name', "text", array('required' => false, 'label' => 'Picture Name'));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Blog\BlogBundle\Entity\Picture'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'blog_blogbundle_picturetype';
    }
}
