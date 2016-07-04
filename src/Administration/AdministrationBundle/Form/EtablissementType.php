<?php

namespace Administration\AdministrationBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\OptionsResolver\OptionsResolver;


class EtablissementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEtablissement', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('adresseEtablissement', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('villeEtablissement', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('postaleEtablissement', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('telOneEtablissement', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('telTwoEtablissement', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('telThreeEtablissement', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('emailEtablissement', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('webEtablissement', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('facebookEtablissement', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))

            ->add('latEtablissement', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('longEtablissement', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('categorie','entity',array('multiple'=>true,'class'=>'Administration\AdministrationBundle\Entity\Categorie','attr' => array('class' => 'form-control input-sm chosen-select','data-placeholder' => '-- Choisir un theme --','title'=>'Veuillez renseigner l\'etat intial de projet')))
            ->add('filtre','entity',array('multiple'=>true,'class'=>'Administration\AdministrationBundle\Entity\Filtre','attr' => array('class' => 'form-control input-sm chosen-select','data-placeholder' => '-- Choisir un theme --','title'=>'Veuillez renseigner l\'etat intial de projet')))
            ->add('ambiance','entity',array('multiple'=>true,'class'=>'Administration\AdministrationBundle\Entity\Ambiance','attr' => array('class' => 'form-control input-sm chosen-select','data-placeholder' => '-- Choisir un theme --','title'=>'Veuillez renseigner l\'etat intial de projet')))
            ->add('specialite','entity',array('multiple'=>true,'class'=>'Administration\AdministrationBundle\Entity\Specialite','attr' => array('class' => 'form-control input-sm chosen-select','data-placeholder' => '-- Choisir un theme --','title'=>'Veuillez renseigner l\'etat intial de projet')))
            ->add('image', new MediaType())
            ->add('carte', new MediaType())
            ->add('fromLundi', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('toLundi', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('fromMardi', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('toMardi', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('fromMercredi', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('toMercredi', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('fromJeudi', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('toJeudi', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('fromVendredi', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('toVendredi', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('fromSamedi', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('toSamedi', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('fromDimanche', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('toDimanche', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))


        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Administration\AdministrationBundle\Entity\Etablissement'
        ));
    }
}
