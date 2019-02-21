<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AntecedentsRepository")
 */
class Antecedents
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $medicament;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $homeopathie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $traitement_homeopathique;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $pillules_contraceptives;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $hormones;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $enceinte;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $perte_poids;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $gain_poids;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $troubles_cardiaques;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $fievre_rhumatismale;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $hemophiie;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $saignements_prolonges;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $sang_clair;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $anemie;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $problemes_du_foie;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $trouble_digestifs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $troubles_digestifs_details;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $ulcere_de_l_estomac;

    /**
     * @ORM\Column(type="string", length=3, columnDefinition="ENUM('oui','non')")
     */
    private $maladies_sexuellement_tansmissibles;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $diabete;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $troubles_thyroidiens;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $maladie_de_la_peau;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $problemes_oculaires;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $arthrite;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $osteoporose;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $epilepsie;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $troubles_nerveux;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $biphosphonates;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $maladies_psychiatriques;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $maux_de_tete_frequents;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $etourdissements_evanouissements;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $maux_d_oreilles;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $rhume_des_foins;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $asthme;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $fumez_vous;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombre_cigrettes_par_jour;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $radiotherapie;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $chimiotherapie;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $sida;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $seropositif;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $protheses_articulaires;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $troubles_du_sommeil;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $ronflez_vous;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $allergie_latex;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $allergie_penniciline;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $allergie_codeine;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $allergie_aspirine;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $allergie_antibiotique;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $allergie_anesthesiques;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $allergie_sulfamides;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $allergie_iode;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $allergie_aliments;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autres_allergies;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $consommation_drogues;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $consommation_alcool;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $quantite_par_jour_d_alcool;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $hospitalisation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $quand_quel_operations;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $traitements_gencives;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $traitements_dentaires;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $traitement_implant_dentaire;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $lunettes;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $lentilles;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $problemes_de_vision_de_couleurs;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('oui','non')")
     */
    private $chirurgies_uculaires;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autres_problemes_oculaires;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autres_problemes_dentaires;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $eventuels_precautions_a_prendre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $eventuels_indications_praticien;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicament(): ?string
    {
        return $this->medicament;
    }

    public function setMedicament(string $medicament): self
    {
        $this->medicament = $medicament;

        return $this;
    }

    public function getHomeopathie(): ?string
    {
        return $this->homeopathie;
    }

    public function setHomeopathie(?string $homeopathie): self
    {
        $this->homeopathie = $homeopathie;

        return $this;
    }

    public function getTraitementHomeopathique(): ?string
    {
        return $this->traitement_homeopathique;
    }

    public function setTraitementHomeopathique(?string $traitement_homeopathique): self
    {
        $this->traitement_homeopathique = $traitement_homeopathique;

        return $this;
    }

    public function getPillulesContraceptives(): ?string
    {
        return $this->pillules_contraceptives;
    }

    public function setPillulesContraceptives(?string $pillules_contraceptives): self
    {
        $this->pillules_contraceptives = $pillules_contraceptives;

        return $this;
    }

    public function getHormones(): ?string
    {
        return $this->hormones;
    }

    public function setHormones(?string $hormones): self
    {
        $this->hormones = $hormones;

        return $this;
    }

    public function getEnceinte(): ?string
    {
        return $this->enceinte;
    }

    public function setEnceinte(?string $enceinte): self
    {
        $this->enceinte = $enceinte;

        return $this;
    }

    public function getPertePoids(): ?string
    {
        return $this->perte_poids;
    }

    public function setPertePoids(?string $perte_poids): self
    {
        $this->perte_poids = $perte_poids;

        return $this;
    }

    public function getGainPoids(): ?string
    {
        return $this->gain_poids;
    }

    public function setGainPoids(?string $gain_poids): self
    {
        $this->gain_poids = $gain_poids;

        return $this;
    }

    public function getTroublesCardiaques(): ?string
    {
        return $this->troubles_cardiaques;
    }

    public function setTroublesCardiaques(?string $troubles_cardiaques): self
    {
        $this->troubles_cardiaques = $troubles_cardiaques;

        return $this;
    }

    public function getFievreRhumatismale(): ?string
    {
        return $this->fievre_rhumatismale;
    }

    public function setFievreRhumatismale(?string $fievre_rhumatismale): self
    {
        $this->fievre_rhumatismale = $fievre_rhumatismale;

        return $this;
    }

    public function getHemophiie(): ?string
    {
        return $this->hemophiie;
    }

    public function setHemophiie(?string $hemophiie): self
    {
        $this->hemophiie = $hemophiie;

        return $this;
    }

    public function getSaignementsProlonges(): ?string
    {
        return $this->saignements_prolonges;
    }

    public function setSaignementsProlonges(?string $saignements_prolonges): self
    {
        $this->saignements_prolonges = $saignements_prolonges;

        return $this;
    }

    public function getSangClair(): ?string
    {
        return $this->sang_clair;
    }

    public function setSangClair(?string $sang_clair): self
    {
        $this->sang_clair = $sang_clair;

        return $this;
    }

    public function getAnemie(): ?string
    {
        return $this->anemie;
    }

    public function setAnemie(?string $anemie): self
    {
        $this->anemie = $anemie;

        return $this;
    }

    public function getProblemesDuFoie(): ?string
    {
        return $this->problemes_du_foie;
    }

    public function setProblemesDuFoie(?string $problemes_du_foie): self
    {
        $this->problemes_du_foie = $problemes_du_foie;

        return $this;
    }

    public function getTroubleDigestifs(): ?string
    {
        return $this->trouble_digestifs;
    }

    public function setTroubleDigestifs(?string $trouble_digestifs): self
    {
        $this->trouble_digestifs = $trouble_digestifs;

        return $this;
    }

    public function getTroublesDigestifsDetails(): ?string
    {
        return $this->troubles_digestifs_details;
    }

    public function setTroublesDigestifsDetails(?string $troubles_digestifs_details): self
    {
        $this->troubles_digestifs_details = $troubles_digestifs_details;

        return $this;
    }

    public function getUlcereDeLEstomac(): ?string
    {
        return $this->ulcere_de_l_estomac;
    }

    public function setUlcereDeLEstomac(?string $ulcere_de_l_estomac): self
    {
        $this->ulcere_de_l_estomac = $ulcere_de_l_estomac;

        return $this;
    }

    public function getMaladiesSexuellementTansmissibles(): ?string
    {
        return $this->maladies_sexuellement_tansmissibles;
    }

    public function setMaladiesSexuellementTansmissibles(string $maladies_sexuellement_tansmissibles): self
    {
        $this->maladies_sexuellement_tansmissibles = $maladies_sexuellement_tansmissibles;

        return $this;
    }

    public function getDiabete(): ?string
    {
        return $this->diabete;
    }

    public function setDiabete(?string $diabete): self
    {
        $this->diabete = $diabete;

        return $this;
    }

    public function getTroublesThyroidiens(): ?string
    {
        return $this->troubles_thyroidiens;
    }

    public function setTroublesThyroidiens(?string $troubles_thyroidiens): self
    {
        $this->troubles_thyroidiens = $troubles_thyroidiens;

        return $this;
    }

    public function getMaladieDeLaPeau(): ?string
    {
        return $this->maladie_de_la_peau;
    }

    public function setMaladieDeLaPeau(?string $maladie_de_la_peau): self
    {
        $this->maladie_de_la_peau = $maladie_de_la_peau;

        return $this;
    }

    public function getProblemesOculaires(): ?string
    {
        return $this->problemes_oculaires;
    }

    public function setProblemesOculaires(?string $problemes_oculaires): self
    {
        $this->problemes_oculaires = $problemes_oculaires;

        return $this;
    }

    public function getArthrite(): ?string
    {
        return $this->arthrite;
    }

    public function setArthrite(?string $arthrite): self
    {
        $this->arthrite = $arthrite;

        return $this;
    }

    public function getOsteoporose(): ?string
    {
        return $this->osteoporose;
    }

    public function setOsteoporose(?string $osteoporose): self
    {
        $this->osteoporose = $osteoporose;

        return $this;
    }

    public function getEpilepsie(): ?string
    {
        return $this->epilepsie;
    }

    public function setEpilepsie(?string $epilepsie): self
    {
        $this->epilepsie = $epilepsie;

        return $this;
    }

    public function getTroublesNerveux(): ?string
    {
        return $this->troubles_nerveux;
    }

    public function setTroublesNerveux(?string $troubles_nerveux): self
    {
        $this->troubles_nerveux = $troubles_nerveux;

        return $this;
    }

    public function getBiphosphonates(): ?string
    {
        return $this->biphosphonates;
    }

    public function setBiphosphonates(?string $biphosphonates): self
    {
        $this->biphosphonates = $biphosphonates;

        return $this;
    }

    public function getMaladiesPsychiatriques(): ?string
    {
        return $this->maladies_psychiatriques;
    }

    public function setMaladiesPsychiatriques(?string $maladies_psychiatriques): self
    {
        $this->maladies_psychiatriques = $maladies_psychiatriques;

        return $this;
    }

    public function getMauxDeTeteFrequents(): ?string
    {
        return $this->maux_de_tete_frequents;
    }

    public function setMauxDeTeteFrequents(?string $maux_de_tete_frequents): self
    {
        $this->maux_de_tete_frequents = $maux_de_tete_frequents;

        return $this;
    }

    public function getEtourdissementsEvanouissements(): ?string
    {
        return $this->etourdissements_evanouissements;
    }

    public function setEtourdissementsEvanouissements(?string $etourdissements_evanouissements): self
    {
        $this->etourdissements_evanouissements = $etourdissements_evanouissements;

        return $this;
    }

    public function getMauxDOreilles(): ?string
    {
        return $this->maux_d_oreilles;
    }

    public function setMauxDOreilles(?string $maux_d_oreilles): self
    {
        $this->maux_d_oreilles = $maux_d_oreilles;

        return $this;
    }

    public function getRhumeDesFoins(): ?string
    {
        return $this->rhume_des_foins;
    }

    public function setRhumeDesFoins(?string $rhume_des_foins): self
    {
        $this->rhume_des_foins = $rhume_des_foins;

        return $this;
    }

    public function getAsthme(): ?string
    {
        return $this->asthme;
    }

    public function setAsthme(?string $asthme): self
    {
        $this->asthme = $asthme;

        return $this;
    }

    public function getFumezVous(): ?string
    {
        return $this->fumez_vous;
    }

    public function setFumezVous(?string $fumez_vous): self
    {
        $this->fumez_vous = $fumez_vous;

        return $this;
    }

    public function getNombreCigrettesParJour(): ?string
    {
        return $this->nombre_cigrettes_par_jour;
    }

    public function setNombreCigrettesParJour(?string $nombre_cigrettes_par_jour): self
    {
        $this->nombre_cigrettes_par_jour = $nombre_cigrettes_par_jour;

        return $this;
    }

    public function getRadiotherapie(): ?string
    {
        return $this->radiotherapie;
    }

    public function setRadiotherapie(?string $radiotherapie): self
    {
        $this->radiotherapie = $radiotherapie;

        return $this;
    }

    public function getChimiotherapie(): ?string
    {
        return $this->chimiotherapie;
    }

    public function setChimiotherapie(?string $chimiotherapie): self
    {
        $this->chimiotherapie = $chimiotherapie;

        return $this;
    }

    public function getSida(): ?string
    {
        return $this->sida;
    }

    public function setSida(?string $sida): self
    {
        $this->sida = $sida;

        return $this;
    }

    public function getSeropositif(): ?string
    {
        return $this->seropositif;
    }

    public function setSeropositif(?string $seropositif): self
    {
        $this->seropositif = $seropositif;

        return $this;
    }

    public function getProthesesArticulaires(): ?string
    {
        return $this->protheses_articulaires;
    }

    public function setProthesesArticulaires(?string $protheses_articulaires): self
    {
        $this->protheses_articulaires = $protheses_articulaires;

        return $this;
    }

    public function getTroublesDuSommeil(): ?string
    {
        return $this->troubles_du_sommeil;
    }

    public function setTroublesDuSommeil(?string $troubles_du_sommeil): self
    {
        $this->troubles_du_sommeil = $troubles_du_sommeil;

        return $this;
    }

    public function getRonflezVous(): ?string
    {
        return $this->ronflez_vous;
    }

    public function setRonflezVous(?string $ronflez_vous): self
    {
        $this->ronflez_vous = $ronflez_vous;

        return $this;
    }

    public function getAllergieLatex(): ?string
    {
        return $this->allergie_latex;
    }

    public function setAllergieLatex(?string $allergie_latex): self
    {
        $this->allergie_latex = $allergie_latex;

        return $this;
    }

    public function getAllergiePenniciline(): ?string
    {
        return $this->allergie_penniciline;
    }

    public function setAllergiePenniciline(?string $allergie_penniciline): self
    {
        $this->allergie_penniciline = $allergie_penniciline;

        return $this;
    }

    public function getAllergieCodeine(): ?string
    {
        return $this->allergie_codeine;
    }

    public function setAllergieCodeine(?string $allergie_codeine): self
    {
        $this->allergie_codeine = $allergie_codeine;

        return $this;
    }

    public function getAllergieAspirine(): ?string
    {
        return $this->allergie_aspirine;
    }

    public function setAllergieAspirine(?string $allergie_aspirine): self
    {
        $this->allergie_aspirine = $allergie_aspirine;

        return $this;
    }

    public function getAllergieAntibiotique(): ?string
    {
        return $this->allergie_antibiotique;
    }

    public function setAllergieAntibiotique(?string $allergie_antibiotique): self
    {
        $this->allergie_antibiotique = $allergie_antibiotique;

        return $this;
    }

    public function getAllergieAnesthesiques(): ?string
    {
        return $this->allergie_anesthesiques;
    }

    public function setAllergieAnesthesiques(?string $allergie_anesthesiques): self
    {
        $this->allergie_anesthesiques = $allergie_anesthesiques;

        return $this;
    }

    public function getAllergieSulfamides(): ?string
    {
        return $this->allergie_sulfamides;
    }

    public function setAllergieSulfamides(?string $allergie_sulfamides): self
    {
        $this->allergie_sulfamides = $allergie_sulfamides;

        return $this;
    }

    public function getAllergieIode(): ?string
    {
        return $this->allergie_iode;
    }

    public function setAllergieIode(?string $allergie_iode): self
    {
        $this->allergie_iode = $allergie_iode;

        return $this;
    }

    public function getAllergieAliments(): ?string
    {
        return $this->allergie_aliments;
    }

    public function setAllergieAliments(?string $allergie_aliments): self
    {
        $this->allergie_aliments = $allergie_aliments;

        return $this;
    }

    public function getAutresAllergies(): ?string
    {
        return $this->autres_allergies;
    }

    public function setAutresAllergies(?string $autres_allergies): self
    {
        $this->autres_allergies = $autres_allergies;

        return $this;
    }

    public function getConsommationDrogues(): ?string
    {
        return $this->consommation_drogues;
    }

    public function setConsommationDrogues(?string $consommation_drogues): self
    {
        $this->consommation_drogues = $consommation_drogues;

        return $this;
    }

    public function getConsommationAlcool(): ?string
    {
        return $this->consommation_alcool;
    }

    public function setConsommationAlcool(?string $consommation_alcool): self
    {
        $this->consommation_alcool = $consommation_alcool;

        return $this;
    }

    public function getQuantiteParJourDAlcool(): ?string
    {
        return $this->quantite_par_jour_d_alcool;
    }

    public function setQuantiteParJourDAlcool(?string $quantite_par_jour_d_alcool): self
    {
        $this->quantite_par_jour_d_alcool = $quantite_par_jour_d_alcool;

        return $this;
    }

    public function getHospitalisation(): ?string
    {
        return $this->hospitalisation;
    }

    public function setHospitalisation(?string $hospitalisation): self
    {
        $this->hospitalisation = $hospitalisation;

        return $this;
    }

    public function getQuandQuelOperations(): ?string
    {
        return $this->quand_quel_operations;
    }

    public function setQuandQuelOperations(?string $quand_quel_operations): self
    {
        $this->quand_quel_operations = $quand_quel_operations;

        return $this;
    }

    public function getTraitementsGencives(): ?string
    {
        return $this->traitements_gencives;
    }

    public function setTraitementsGencives(?string $traitements_gencives): self
    {
        $this->traitements_gencives = $traitements_gencives;

        return $this;
    }

    public function getTraitementsDentaires(): ?string
    {
        return $this->traitements_dentaires;
    }

    public function setTraitementsDentaires(?string $traitements_dentaires): self
    {
        $this->traitements_dentaires = $traitements_dentaires;

        return $this;
    }

    public function getTraitementImplantDentaire(): ?string
    {
        return $this->traitement_implant_dentaire;
    }

    public function setTraitementImplantDentaire(?string $traitement_implant_dentaire): self
    {
        $this->traitement_implant_dentaire = $traitement_implant_dentaire;

        return $this;
    }

    public function getLunettes(): ?string
    {
        return $this->lunettes;
    }

    public function setLunettes(?string $lunettes): self
    {
        $this->lunettes = $lunettes;

        return $this;
    }

    public function getLentilles(): ?string
    {
        return $this->lentilles;
    }

    public function setLentilles(?string $lentilles): self
    {
        $this->lentilles = $lentilles;

        return $this;
    }

    public function getProblemesDeVisionDeCouleurs(): ?string
    {
        return $this->problemes_de_vision_de_couleurs;
    }

    public function setProblemesDeVisionDeCouleurs(?string $problemes_de_vision_de_couleurs): self
    {
        $this->problemes_de_vision_de_couleurs = $problemes_de_vision_de_couleurs;

        return $this;
    }

    public function getChirurgiesUculaires(): ?string
    {
        return $this->chirurgies_uculaires;
    }

    public function setChirurgiesUculaires(?string $chirurgies_uculaires): self
    {
        $this->chirurgies_uculaires = $chirurgies_uculaires;

        return $this;
    }

    public function getAutresProblemesOculaires(): ?string
    {
        return $this->autres_problemes_oculaires;
    }

    public function setAutresProblemesOculaires(?string $autres_problemes_oculaires): self
    {
        $this->autres_problemes_oculaires = $autres_problemes_oculaires;

        return $this;
    }

    public function getAutresProblemesDentaires(): ?string
    {
        return $this->autres_problemes_dentaires;
    }

    public function setAutresProblemesDentaires(?string $autres_problemes_dentaires): self
    {
        $this->autres_problemes_dentaires = $autres_problemes_dentaires;

        return $this;
    }

    public function getEventuelsPrecautionsAPrendre(): ?string
    {
        return $this->eventuels_precautions_a_prendre;
    }

    public function setEventuelsPrecautionsAPrendre(?string $eventuels_precautions_a_prendre): self
    {
        $this->eventuels_precautions_a_prendre = $eventuels_precautions_a_prendre;

        return $this;
    }

    public function getEventuelsIndicationsPraticien(): ?string
    {
        return $this->eventuels_indications_praticien;
    }

    public function setEventuelsIndicationsPraticien(?string $eventuels_indications_praticien): self
    {
        $this->eventuels_indications_praticien = $eventuels_indications_praticien;

        return $this;
    }
}
