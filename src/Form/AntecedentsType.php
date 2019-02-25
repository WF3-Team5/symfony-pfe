<?php

namespace App\Form;

use App\Entity\Antecedents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\VarDumper\Cloner\Data;

class AntecedentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('medicament',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
        ],
                     'label' => 'Prenez vous des médicaments? ',
                    'expanded' => true,
        ])



            ->add('homeopathie',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Prenez-vous des produits homéopathiques ? ',
                    'expanded' => true
                ])

            ->add('traitement_homeopathique',
                    TextareaType::class,
                [
                    'label' => 'Si oui, lesquels ?'
                ])

            ->add('pillules_contraceptives',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Prenez-vous des pillules contraceptives ? ',
                    'expanded' => true
                ])

            ->add('hormones',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Prenez-vous des hormones ? ',
                    'expanded' => true
                ])

            ->add('enceinte',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Êtes-vous enceinte ? ',
                    'expanded' => true
                ])

            ->add('perte_poids',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Avez-vous perdu du poids dernièrement ? ',
                    'expanded' => true
                ])

            ->add('gain_poids',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Avez-vous pris du poids dernièrement ? ',
                    'expanded' => true
                ])

            ->add('troubles_cardiaques',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Avez-vous souffert ou souffrez vous de troubles cardiaque ? ',
                    'expanded' => true
                ])

            ->add('fievre_rhumatismale',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Avez-vous souffert de fièvre rhumathismale ? ',
                    'expanded' => true
                ])

            ->add('hemophiie',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Êtes-vous hémophile ? ',
                    'expanded' => true
                ])

            ->add('saignements_prolonges',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Souffrez-vous de saignements prolongés ? ',
                    'expanded' => true
                ])

            ->add('sang_clair',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Avez-vous le sang clair ? ',
                    'expanded' => true
                ])

            ->add('anemie',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Souffrez-vous d'anémie ? ",
                    'expanded' => true
                ])

            ->add('problemes_du_foie',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Avez-vous des problèmes de foie? ',
                    'expanded' => true
                ])

            ->add('trouble_digestifs',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Avez-vous des troubles digestifs ? ',
                    'expanded' => true
                ])

            ->add('troubles_digestifs_details',
                TextareaType::class,
                [
                    'label' => 'Si oui, lesquels ?'
                ])

            ->add('ulcere_de_l_estomac',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Souffrez-vous d'ulcère de l'estomac ? ",
                    'expanded' => true
                ])

            ->add('maladies_sexuellement_tansmissibles',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Avez-vous une maladie sexuellement transmissible (MST)? ',
                    'expanded' => true
                ])

            ->add('diabete',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => 'Êtes-vous diabétique ? ',
                    'expanded' => true
                ])

            ->add('troubles_thyroidiens',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Souffrez-vous de troubles thyroïdiens ? ",
                    'expanded' => true
                ])

            ->add('maladie_de_la_peau',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Souffrez-vous de problèmes de peau ? ",
                    'expanded' => true
                ])

            ->add('problemes_oculaires',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Souffrez-vous de maladies occulaires ? ",
                    'expanded' => true
                ])

            ->add('arthrite',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Souffrez-vous d'arthrite ? ",
                    'expanded' => true
                ])
            ->add('osteoporose',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Souffrez-vous d'osteoporose ? ",
                    'expanded' => true
                ])
            ->add('epilepsie',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Souffrez-vous d'épilepsie ? ",
                    'expanded' => true
                ])
            ->add('troubles_nerveux',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Souffrez-vous de troubles nerveux ? ",
                    'expanded' => true
                ])
            ->add('biphosphonates',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Prenez-vous des biphosphonates ? ",
                    'expanded' => true
                ])
            ->add('maladies_psychiatriques',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Souffrez-vous de maladies psychiatriques ? ",
                    'expanded' => true
                ])
            ->add('maux_de_tete_frequents',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Avez-vous des maux de têtes fréquents ? ",
                    'expanded' => true
                ])
            ->add('etourdissements_evanouissements',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Avez-vous déja eu des étourdissements ou des évanouissements ? ",
                    'expanded' => true
                ])
            ->add('maux_d_oreilles',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Avez-vous des maux d'oreilles ? ",
                    'expanded' => true
                ])
            ->add('rhume_des_foins',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Souffrez-vous du rhume des foins? ",
                    'expanded' => true
                ])
            ->add('asthme',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Souffrez-vous d'asthme ? ",
                    'expanded' => true
                ])
            ->add('fumez_vous',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Fumez-vous ? ",
                    'expanded' => true
                ])
            ->add('nombre_cigrettes_par_jour',
                TextareaType::class,
                [
                    'label' => 'Si oui, combien de cigarettes par jour ?'
                ])
            ->add('radiotherapie',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Avez-vous déjà subi des traitements de radiothéapie ? ",
                    'expanded' => true
                ])
            ->add('chimiotherapie',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Avez-vous déjà subi des traitements de chimiothérapie? ",
                    'expanded' => true
                ])
            ->add('sida',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Avez-vous le sida ? ",
                    'expanded' => true
                ])
            ->add('seropositif',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Êtes-vous séropositif ? ",
                    'expanded' => true
                ])
            ->add('protheses_articulaires',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Avez-vous des prothèses articulaires (hanche, genou, etc... ? ",
                    'expanded' => true
                ])
            ->add('troubles_du_sommeil',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Souffrez-vous de troubles du sommeil ? ",
                    'expanded' => true
                ])
            ->add('ronflez_vous',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Ronflez-vous ? ",
                    'expanded' => true
                ])
            ->add('allergie_latex',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Êtes-vous allergique au latex ? ",
                    'expanded' => true
                ])
            ->add('allergie_penniciline',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Êtes-vous allergique à la pénicilline ? ",
                    'expanded' => true
                ])
            ->add('allergie_codeine',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Êtes-vous allergique à la codéine ? ",
                    'expanded' => true
                ])
            ->add('allergie_aspirine',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Êtes-vous allergique à l'aspirine ? ",
                    'expanded' => true
                ])
            ->add('allergie_antibiotique',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Êtes-vous allergique aux antibiotiques? ",
                    'expanded' => true
                ])
            ->add('allergie_anesthesiques',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Êtes-vous allergique aux anesthésiques ? ",
                    'expanded' => true
                ])
            ->add('allergie_sulfamides',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Êtes-vous allergique aux sulfamides? ",
                    'expanded' => true
                ])
            ->add('allergie_iode',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Êtes-vous allergique à l'iode ? ",
                    'expanded' => true
                ])
            ->add('allergie_aliments',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Avez-vous des allergies alimentaires? ",
                    'expanded' => true
                ])
            ->add('autres_allergies',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Êtes-vous allergique a la codéine ? ",
                    'expanded' => true
                ])
            ->add('consommation_drogues',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Consommez-vous de la drogue ? ",
                    'expanded' => true
                ])
            ->add('consommation_alcool',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Consommez-vous de l'alcool ? ",
                    'expanded' => true
                ])
            ->add('quantite_par_jour_d_alcool',
                TextareaType::class,
                [
                    'label' => 'Si oui, quelle quantité par jour ?'
                ])
            ->add('hospitalisation',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Avez-vous déjà été hospitalisé ? ",
                    'expanded' => true
                ])
            ->add('quand_quel_operations',
                TextareaType::class,
                [
                    'label' => 'Si oui, lesquelles et quand ?'
                ])
            ->add('traitements_gencives',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Avez-vous déjà eu des traitements de gencive ? ",
                    'expanded' => true
                ])
            ->add('traitements_dentaires',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Avez-vous déjà eu des traitements dentaires ? ",
                    'expanded' => true
                ])
            ->add('traitement_implant_dentaire',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Avez-vous déjà eu des chirurgie implantaires dentaires ? ",
                    'expanded' => true
                ])
            ->add('lunettes',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Portez-vous des lunettes ? ",
                    'expanded' => true
                ])
            ->add('lentilles',
                ChoiceType::class,
                ['choices'=>
                    [
                    'oui' => 'oui',
                    'non' => 'non'
                    ],
                    'label' => "Portez-vous des lentilles  ? ",
                    'expanded' => true
                ])
            ->add('problemes_de_vision_de_couleurs',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Avez-vous des problèmes de vision de couleurs  ? ",
                    'expanded' => true
                ])
            ->add('chirurgies_uculaires',
                ChoiceType::class, ['choices'=> [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                    'label' => "Avez-vous déjà eu des chirurgies occulaires ? ",
                    'expanded' => true
                ])
            ->add('autres_problemes_oculaires',
                TextareaType::class,
                [
                    'label' => "Avez-vous d'autres problèmes occulaires ?"
                ])
            ->add('autres_problemes_dentaires',
                TextareaType::class,
                [
                    'label' => "Avez-vous d'autres problèmes dentaires ?"
                ])
            ->add('eventuels_precautions_a_prendre',
                TextareaType::class,
                [
                    'label' => "Avez-vous d'éventuelles précautions à prendre, à nous signaler ?"
                ])
            ->add('eventuels_indications_praticien',
                TextareaType::class,
                [
                    'label' => "Avez-vous d'éventuelles indications particulières à nous signaler ?"
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Antecedents::class,
        ]);
    }
}
