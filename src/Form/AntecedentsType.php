<?php

namespace App\Form;

use App\Entity\Antecedents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AntecedentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('medicament',
                ChoiceType::class, ['choices'=> [
            'oui' => true,
            'non' => false
        ],
           'label' => 'Prenez vous des médicaments? '
        ])



            ->add('homeopathie',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Prenez-vous des produits homéopathiques ? '
                ])

            ->add('traitement_homeopathique',
                    TextareaType::class,
                [
                    'label' => 'Si oui, lesquels ?'
                ])

            ->add('pillules_contraceptives',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Prenez-vous des pillules contraceptives ? '
                ])

            ->add('hormones',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Prenez-vous des hormones ? '
                ])

            ->add('enceinte',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Êtes-vous enceinte ? '
                ])

            ->add('perte_poids',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Avez-vous perdu du poids dernièrement ? '
                ])

            ->add('gain_poids',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Avez-vous pris du poids dernièrement ? '
                ])

            ->add('troubles_cardiaques',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Avez-vous souffert ou souffrez vous de troubles cardiaque ? '
                ])

            ->add('fievre_rhumatismale',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Avez-vous souffert de fièvre rhumathismale ? '
                ])

            ->add('hemophiie',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Êtes-vous hémophile ? '
                ])

            ->add('saignements_prolonges',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Souffrez-vous de saignements prolongés ? '
                ])

            ->add('sang_clair',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Avez-vous le sang clair ? '
                ])

            ->add('anemie',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Souffrez-vous d'anémie ? "
                ])

            ->add('problemes_du_foie',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Avez-vous des problèmes de foie? '
                ])

            ->add('trouble_digestifs',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Avez-vous des troubles digestifs ? '
                ])

            ->add('troubles_digestifs_details',
                TextareaType::class,
                [
                    'label' => 'Si oui, lesquels ?'
                ])

            ->add('ulcere_de_l_estomac',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Souffrez-vous d'ulcère de l'estomac ? "
                ])

            ->add('maladies_sexuellement_tansmissibles',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Avez-vous une maladie sexuellement transmissible (MST)? '
                ])

            ->add('diabete',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => 'Êtes-vous diabétique ? '
                ])

            ->add('troubles_thyroidiens',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Souffrez-vous de troubles thyroïdiens ? "
                ])

            ->add('maladie_de_la_peau',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Souffrez-vous de problèmes de peau ? "
                ])

            ->add('problemes_oculaires',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Souffrez-vous de maladies occulaires ? "
                ])

            ->add('arthrite',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Souffrez-vous d'arthrite ? "
                ])
            ->add('osteoporose',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Souffrez-vous d'osteoporose ? "
                ])
            ->add('epilepsie',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Souffrez-vous d'épilepsie ? "
                ])
            ->add('troubles_nerveux',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Souffrez-vous de roubles nerveux ? "
                ])
            ->add('biphosphonates',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Prenez-vous des biphosphonates ? "
                ])
            ->add('maladies_psychiatriques',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Souffrez-vous de maladies psychiatriques ? "
                ])
            ->add('maux_de_tete_frequents',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Avez-vous des maux de têtes fréquents ? "
                ])
            ->add('etourdissements_evanouissements',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Avez-vous déja eu des étourdissements ou des évanouissements ? "
                ])
            ->add('maux_d_oreilles',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Avez-vous des maux d'oreilles ? "
                ])
            ->add('rhume_des_foins',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Souffrez-vous du rhume des foins? "
                ])
            ->add('asthme',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Souffrez-vous d'asthme ? "
                ])
            ->add('fumez_vous',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Fumez-vous ? "
                ])
            ->add('nombre_cigrettes_par_jour',
                TextareaType::class,
                [
                    'label' => 'Si oui, combien de cigarettes par jour ?'
                ])
            ->add('radiotherapie',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Avez-vous déjà subi des traitements de radiothéapie ? "
                ])
            ->add('chimiotherapie',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Avez-vous déjà subi des traitements de chimiothérapie? "
                ])
            ->add('sida',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Avez-vous le sida ? "
                ])
            ->add('seropositif',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Êtes-vous séropositif ? "
                ])
            ->add('protheses_articulaires',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Avez-vous des prothèses articulaires (hanche, genou, etc... ? "
                ])
            ->add('troubles_du_sommeil',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Souffrez-vous de troubles du sommeil ? "
                ])
            ->add('ronflez_vous',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Ronflez-vous ? "
                ])
            ->add('allergie_latex',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Êtes-vous allergique au latex ? "
                ])
            ->add('allergie_penniciline',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Êtes-vous allergique à la pénicilline ? "
                ])
            ->add('allergie_codeine',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Êtes-vous allergique à la codéine ? "
                ])
            ->add('allergie_aspirine',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Êtes-vous allergique à l'aspirine ? "
                ])
            ->add('allergie_antibiotique',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Êtes-vous allergique aux antibiotiques? "
                ])
            ->add('allergie_anesthesiques',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Êtes-vous allergique aux anesthésiques ? "
                ])
            ->add('allergie_sulfamides',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Êtes-vous allergique aux sulfamides? "
                ])
            ->add('allergie_iode',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Êtes-vous allergique à l'iode ? "
                ])
            ->add('allergie_aliments',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Avez-vous des allergies alimentaires? "
                ])
            ->add('autres_allergies',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Êtes-vous allergique a la codéine ? "
                ])
            ->add('consommation_drogues',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Consommez-vous de la drogue ? "
                ])
            ->add('consommation_alcool',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Consommez-vous de l'alcool ? "
                ])
            ->add('quantite_par_jour_d_alcool',
                TextareaType::class,
                [
                    'label' => 'Si oui, quelle quantité par jour ?'
                ])
            ->add('hospitalisation',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Avez-vous déjà été hospitalisé ? "
                ])
            ->add('quand_quel_operations',
                TextareaType::class,
                [
                    'label' => 'Si oui, lesquelles et quand ?'
                ])
            ->add('traitements_gencives',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Avez-vous déjà eu des traitements de gencive ? "
                ])
            ->add('traitements_dentaires',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Avez-vous déjà eu des traitements dentaires ? "
                ])
            ->add('traitement_implant_dentaire',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Avez-vous déjà eu des chirurgie implantaires dentaires ? "
                ])
            ->add('lunettes',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Portez-vous des lunettes ? "
                ])
            ->add('lentilles',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Portez-vous des lentilles  ? "
                ])
            ->add('problemes_de_vision_de_couleurs',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Avez-vous des problèmes de vision de couleurs  ? "
                ])
            ->add('chirurgies_uculaires',
                ChoiceType::class, ['choices'=> [
                    'oui' => true,
                    'non' => false
                ],
                    'label' => "Avez-vous déjà eu des chirurgies occulaires ? "
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
