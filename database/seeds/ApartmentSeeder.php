<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use Faker\Generator as Faker;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  protected $titles = [
    "Villa Lucia",
    "Luminoso appartamento",
    "Appartamento in centro",
    "Casa moderna",
    "Il nido di Sofia",
    "Appartamento Marinetta",
    "Casa con bellissima vista",
    "Bilocale a due passi dal centro"
  ];
  protected $descriptions = [
    "Luminoso, silenzioso, centrale.Vicino aeroporto (6km) e mare (500m).Ristoranti, bar, pizzerie, vinerie, tabacchi, supermercato raggiungibili a piedi.
    Bagno con doccia e vasca. Grande camera da letto. Cucina dotata di tutto il necessario.
    - Intero appartamento TERMOAUTONOMO situato al primo piano, accessibile mediante una rampa di scale (condivisa solo con un altro appartamento, nessun condominio)
    - AMPIA CAMERA DA LETTO, dotata di aria condizionata, con grande letto matrimoniale, letto singolo e ampio armadio a disposizione degli ospiti. Possibilità di aggiungere lettino per bambini.
    - LUMINOSO SOGGIORNO con due divani letto. TV.
    - CUCINA VIVIBILE completamente ATTREZZATA, dotata di tutto il necessario per cucinare, tra cui olio sale, caffè, tè, zucchero, marmellate ed altro ancora. Forno, microonde, tostapane, frullatore, macchina per il caffé e bollitore.
    - GRANDE BAGNO dotato di DOCCIA e VASCA (separate). In dotazione asciugacapelli, shampoo, sapone mani, salviette struccanti, cotton fioc.
    - Altre cose che troverete nell'appartamento: Ferro con tavola da stiro, LAVATRICE (no asciugatrice), Biancheria da letto ed asciugamani puliti. WIFI gratuito.",
    "La struttura è un attico mansardato di recente ristrutturazione, dispone di un letto matrimoniale in una stanza e tre singoli di cui due possono essere uniti. La struttura è riservata alla vostra prenotazione, non viene condivisa con altri ospiti.
    Disponibilità per l'uso della cucina.
    Parcheggio gratuito.
    WI-FI gratuito.
    Giardino estivo.
    La struttura offre numerosi percorsi personalizzati con partenza dalla struttura o da altre mete a richiesta.
    L'alloggio è molto luminoso grazie alla porta finestra. Luogo tranquillo affacciato su ampio giardino e valle non trafficata con bel panorama sulle montagne, la campagna ed il paese.
    La struttura dispone di un open space (cucina/soggiorno), un bagno moderno con doccia, una camera matrimoniale e una tripla con letti singoli o componibili per un matrimoniale e un singolo phone, lavello nell'antibagno, sala per le colazioni, TV in camera e salotto, cambio biancheria nelle stanze al terzo giorno o per motivi particolari, balcone nell'open space, giardino, parcheggio gratuito, parcheggio coperto per le moto, deposito sci e noleggio a 300 metri, noleggio biciclette a 300 metri, visite guidate gratuite all'azienda apistica di famiglia da primavera fino in autunno.",
    "A disposizione degli ospiti una spaziosa e luminosa camera doppia con vista sul giardino arredata con ampio armadio, e spazioso tavolo per mangiare e studiare e un confortevole bagno privato adiacente la camera, ad uso però esclusivo degli ospiti. Un angolo attrezzato con frigo, macchina per il caffè e bollitore permetterà agli ospiti di preparare in tutta comodità e libertà la prima colazione e conservare bibite e cibi al fresco. Il bagno e l'angolo per la colazione è in uno spazio riservato agli ospiti della camera, nel quale l'Host accede dolo per entrare e uscire di casa, dopo aver bussato. Per gli ospiti abbiamo due ottime pizzerie che offrono sconti e diversi ristoranti con menu regionali. Inoltre mettiamo a disposizione asciugacapelli, WI-FI ALTA VELOCITA', lavatrice (su richiesta a 5 euro) e preparazione di piatti tipici (su richiesta a 15 euro menu completo). VENTILATORE IN CAMERA DURANTE I MESI ESTIVI."
  ];
  public function run(Faker $faker)
  {
    $apartment = new Apartment;
    $apartment->user_id = 1;
    $apartment->title = 'Trilocale fantastico';
    $apartment->description = $this->descriptions[rand(0, count($this->descriptions)-1)];
    $apartment->rooms_number = 3;
    $apartment->beds_number = 2;
    $apartment->bathrooms_number = 1;
    $apartment->size = 90;
    $apartment->address = 'via Roma, 118 - Sanremo (IM)';
    $apartment->latitude = 43.81667;
    $apartment->longitude = 7.77773;
    $apartment->featured_image = 'default_images/slide6.jpg';
    $apartment->price = 50.00;
    $apartment->visible = true;
    $apartment->save();

    // coordinate colosseo 41.890251, 12.492373
  for ($i = 0; $i < 50; $i++) {
    $apartment = new Apartment;
    $apartment->user_id = 1;
    $apartment->title = $this->titles[rand(0,count($this->titles)-1)];
    $apartment->description = $this->descriptions[rand(0, count($this->descriptions)-1)];
    $apartment->rooms_number = rand(1, 5);
    $apartment->beds_number = rand(1, 5);
    $apartment->bathrooms_number = rand(1, 5);
    $apartment->size = rand(30, 150);
    $apartment->address = 'Roma';
    $apartment->latitude = $faker->latitude(41.986316, 41.794889);
    $apartment->longitude = $faker->longitude(12.381556, 12.614890);
    $apartment->featured_image = 'default_images/slide'.rand(1,6).'.jpg';
    $apartment->price = rand(50, 100);
    $apartment->visible = true;
    $apartment->save();
    }
  }
}
