<?php

namespace App\Form;

use App\Entity\Task;
use App\Entity\Project;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('content', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'En cours' => 'En cours',
                    'Terminée' => 'Terminée',
                    'En attente' => 'En attente',
                ],
                'attr' => ['class' => 'form-control']

            ])
            // ->add('createdAt')
            ->add('user', EntityType::class, [
                'class' => User::class,
                'multiple' => true,
                'attr' => ['class' => 'form-control']
            ]);
        /* ->add('project', EntityType::class, [
                'class' => Project::class,
                'attr' => ['class' => 'form-control']

            ]);*/
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
