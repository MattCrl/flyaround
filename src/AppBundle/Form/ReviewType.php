<?php
/**
 * Created by PhpStorm.
 * User: mattcrl
 * Date: 30/04/18
 * Time: 22:31
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewType extends AbstractType
{
    /**
     * {@inheritdoc} Including all fields from Review entity.
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('text')->add('publicationDate')->add('note')->add('userRated')->add('reviewAuthor');
    }

    /**
     * {@inheritdoc} Targeting Review entity
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'AppBundle\Entity\Review']);
    }

    /**
     * {@inheritdoc} getName() is now deprecated
     */
    public function getBlockPrefix()
    {
        return 'appbundle_review';
    }
}