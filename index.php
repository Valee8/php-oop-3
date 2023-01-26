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

        public function __construct($mensile, $tredicesima, $quattordicesima) {

            $this -> setMensile($mensile);
            $this -> setTredicesima($tredicesima);
            $this -> setQuattordicesima($quattordicesima);
        }

        public function setMensile($mensile) {
            $this -> mensile = $mensile;
        }

        public function getMensile() {
            return $this -> mensile;
        }

        public function setTredicesima($tredicesima) {
            $this -> tredicesima = $tredicesima;
        }

        public function getTredicesima() {
            return $this -> tredicesima;
        }

        public function setQuattordicesima($quattordicesima) {
            $this -> quattordicesima = $quattordicesima;
        }

        public function getQuattordicesima() {
            return $this -> quattordicesima;
        }

        public function getHtml() {
            return "Stipendio: " . $this -> getMensile() . "&euro;" .
                "<br>Tredicesima: " . ($this -> getTredicesima() ? "Si" : "No") . 
                "<br>Quattordicesima: " . ($this -> getQuattordicesima() ? "Si" : "No") ;
        }
    }

    $stipendio = new Stipendio("1200", true, false);
    
    echo $stipendio -> getHtml();

?>