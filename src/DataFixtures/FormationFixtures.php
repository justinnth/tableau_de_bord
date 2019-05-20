<?php

namespace App\DataFixtures;

use App\Entity\Formateur;
use App\Entity\Formation;
use Doctrine\Common\Persistence\ObjectManager;

class FormationFixtures extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Formation::class, 50, function (Formation $formations, $count){
            $formations->setTitre($this->faker->jobTitle)
                ->setDuree(14)
                ->setReference("MA41")
                ->setPedagogie($this->faker->text)
                ->setPublicVise($this->faker->text)
                ->setPrerequis($this->faker->text)
                ->setLieu($this->faker->text)
                ->setCpf($this->faker->boolean(70))
                ->setPhoto("img")
                ->setLien("leLien")
                ->setFacebook("leFacebook")
                ->setTrameARealiser($this->faker->boolean(70))
                ->setTrameValiderIperia($this->faker->boolean(70))
                ->setNumeroCpf($this->faker->numerify('######'))
                ->setTheme($this->faker->randomElement($array = array ('a','b','c','d','e','f')))
                ->setDescriptif("# Da adcubuere in Remulusque tuum suum busta

                                        ## Ut videbit
                                        
                                        [Lorem markdownum matri](http://selige.io/) quoque dolore secreta solvere;
                                        quoque quas nondum saecula. Fata partem reliqui pariterque denique proque
                                        sanguine in ferat iam **apertis germana est** quae, sic. Cingentibus summo
                                        reformet e latent coepere honorem qui *fervens foret voluptas* absumere, hunc
                                        regina. Relanguit turbineo fossas ausis ferinae nisi et tenebrae epulis sinuatur
                                        intendensque [terga](http://advita.net/nullos).
                                        
                                        - Iuvat turaque adhibete
                                        - Quo nec cura potest
                                        - Sustinuere nisi subdita et pensa cervice silva
                                        - Dubito mea matri
                                        
                                        Aquae in manibus intra ignorans meque. Ire paruit ut callidus glaebas **alta**
                                        primo [lapsis](http://nec.com/puer) Iovis. Labant iuvenis geminas fixa est
                                        patrios nunc, Phoceus iuncique. Est telique misit, crimina parvo, tamen, *latura
                                        esse Scirone* crescunt socerum cingebat.
                                        
                                        ## Vara cum ora iacet
                                        
                                        Multa quos hoc tenuissima illo, praeterea ad ipse **nulla**, Ardea Iovis;
                                        primum. In urbis omnibus omnia sati *esto certamine sacros*, uterum ira fontis
                                        [Diomede mare](http://www.manebanthabent.org/fabricataque.html) tarda et galeae
                                        passis inminet.
                                        
                                        1. Moenibus ille prisca iuxta
                                        2. Passam nitentior constant perisset campos
                                        3. Conprensus ultro
                                        
                                        Agri vade caelumque simul decimo summe remoraminaque rudis inprudens, super
                                        inferius concutiensque damno; ubi. Est totos quaerit, ipsa color exegit in
                                        accepta arcus. Geri agitasse augerem texique meo munere, ire causa superat
                                        fumant.
                                        
                                        Hostem apicemque simulat ex baca **volentes vertice**, spem regna ferebat partu,
                                        medias. Huius plenoque. Violentus virgo latus, tangat teres, satis
                                        [solacia](http://www.vivit.net/) timentem, **hanc gravidi Appenninus**.");
        });
        $manager->flush();
    }
}
