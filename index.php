<!-- ## Todo
Creare una struttura di classi come segue. Creare qualche istanza per ogni classe, testandone la correttezza.
Ogni classe dovra' inoltre avere il suo metodo `getHtml()` per la stmapa in pagina.

### `Stipendio`
#### Variabili
- mensile
- tredicesima (si/no)
- quattordicesima (si/no)

#### Metodi
- metodo che restituisce lo stipendio annuale:
`mensile * 12 + tredicesima + quattordicesima`
**N.B.:** tredicesima e quattordicesima, se presenti, sono un mensile

### `Persona`
#### Variabili
- nome
- cognome
- data di nascita
- luogo di nascita
- codice fiscale

### `Impiegato`
#### Variabili
- nome
- cognome
- data di nascita
- luogo di nascita
- codice fiscale
---
- stipendio (classe `Stipendio`)
- data di assunzione

#### Metodi
- metodo che restituisce lo stipendio annuale a partire dall'oggetto stipendio

### `Capo`
#### Variabili
- nome
- cognome
- data di nascita
- luogo di nascita
- codice fiscale
---
- dividendo
- bonus

#### Metodi
- metodo che restituisce il reddito annuale:
`dividendo * 12 + bonus`

### N.B.:
La concentrazione va tutta sul rapporto tra:
- `Persona` e `Impiegato`
- `Persona` e `Capo`
- `Impiegato` e `Stipendio` -->


<?php

    class Stipendio {
        private $mensile;
        private $tredicesima;
        private $quattordicesima;
        private $stipendioAnnuale;

        public function __construct($mensile, $tredicesima, $quattordicesima, $stipendioAnnuale) {

            $this -> setMensile($mensile);
            $this -> setTredicesima($tredicesima);
            $this -> setQuattordicesima($quattordicesima);
            $this -> setStipendioAnnuale($stipendioAnnuale);
        }

        public function setMensile($mensile) {
            $this -> mensile = $mensile;
        }

        public function getMensile() {
            return $this -> mensile;
        }

        public function setTredicesima($tredicesima) {

            $this -> tredicesima = $tredicesima;

            if ($this -> tredicesima) {
                $this -> tredicesima = $this -> mensile;
            }
            else {
                $this -> tredicesima = 0;
            }
        }

        public function getTredicesima() {
            return $this -> tredicesima;
        }

        public function setQuattordicesima($quattordicesima) {
            $this -> quattordicesima = $quattordicesima;

            if ($this -> quattordicesima) {
                $this -> quattordicesima = $this -> mensile; 
            }
            else {
                $this -> quattordicesima = 0;
            }
        }

        public function getQuattordicesima() {
            return $this -> quattordicesima;
        }

        public function setStipendioAnnuale($stipendioAnnuale) {
            $this -> stipendioAnnuale = ($this -> mensile * 12 + $this -> tredicesima + $this -> quattordicesima);
        }

        public function getStipendioAnnuale() {
            return $this -> stipendioAnnuale;
        }

        public function getHtml() {

            return "Stipendio mensile: " . $this -> getMensile() . "&euro;" .
                "<br>Tredicesima: " . ($this -> getTredicesima() ? "Si" : "No") . 
                "<br>Quattordicesima: " . ($this -> getQuattordicesima() ?  "Si" : "No") . 
                "<br>Stipendio Annuale: " . $this -> getStipendioAnnuale() . "&euro;";
        }
        
    }

    $stipendio = new Stipendio("1200", true, false, "");
    
    echo $stipendio -> getHtml();

?>