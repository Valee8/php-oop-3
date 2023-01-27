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

        public function getStipendioAnnuale() {
            return ($this -> mensile * 12 + $this -> tredicesima + $this -> quattordicesima);
        }

        public function getHtml() {

            return "Stipendio mensile: " . $this -> getMensile() . "&euro;" .
                "<br>Tredicesima: " . ($this -> getTredicesima() ? "Si" : "No") . 
                "<br>Quattordicesima: " . ($this -> getQuattordicesima() ?  "Si" : "No") . 
                "<br>Stipendio Annuale: " . $this -> getStipendioAnnuale() . "&euro;";
        }
        
    }


    class Persona {
        private $nome;
        private $cognome;
        private $dataDiNascita;
        private $luogoDiNascita;
        private $codiceFiscale;

        public function __construct($nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale) {

            $this -> setNome($nome);
            $this -> setCognome($cognome);
            $this -> setDataDiNascita($dataDiNascita);
            $this -> setLuogoDiNascita($luogoDiNascita);
            $this -> setCodiceFiscale($codiceFiscale);

        }

        public function setNome($nome) {
            $this -> nome = $nome;
        }

        public function getNome() {
            return $this -> nome;
        }

        public function setCognome($cognome) {
            $this -> cognome = $cognome;
        }

        public function getCognome() {
            return $this -> cognome;
        }

        public function setDataDiNascita($dataDiNascita) {
            $this -> dataDiNascita = $dataDiNascita;
        }

        public function getDataDiNascita() {
            return $this -> dataDiNascita;
        }

        public function setLuogoDiNascita($luogoDiNascita) {
            $this -> luogoDiNascita = $luogoDiNascita;
        }

        public function getLuogoDiNascita() {
            return $this -> luogoDiNascita;
        }

        public function setCodiceFiscale($codiceFiscale) {
            $this -> codiceFiscale = $codiceFiscale;
        }

        public function getCodiceFiscale() {
            return $this -> codiceFiscale;
        }

        public function getHtml() {
            return "Nome: " . $this -> getNome() . 
            "<br>Cognome: " . $this -> getCognome() . 
            "<br>Data di nascita: " . $this -> getDataDiNascita() . 
            "<br>Luogo di nascita: " . $this -> getLuogoDiNascita() . 
            "<br>Codice fiscale: " . $this -> getCodiceFiscale();
        }
    }


    class Impiegato extends Persona {
        private Stipendio $stipendio;
        private $dataDiAssunzione;

        public function __construct($nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale, Stipendio $stipendio, $dataDiAssunzione) {

            parent :: __construct($nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale);

            $this -> setStipendio($stipendio);

            $this -> setDataDiAssunzione($dataDiAssunzione);
        }

        public function setStipendio(Stipendio $stipendio) {
            $this -> stipendio = $stipendio;
        }

        public function getStipendio() {
            return $this -> stipendio;
        }

        public function setDataDiAssunzione($dataDiAssunzione) {
            $this -> dataDiAssunzione = $dataDiAssunzione;
        }

        public function getDataDiAssunzione() {
            return $this -> dataDiAssunzione;
        }

        public function getHtml() {
            return parent :: getHtml() . "<br>" . $this -> getStipendio() -> getHtml() . "<br><br>";
        }
    }

    class Capo extends Persona {
        private $dividendo;
        private $bonus;

        public function __construct($nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale, $dividendo, $bonus) {

            parent :: __construct($nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale);

            $this -> setDividendo($dividendo);
            $this -> setBonus($bonus);

        }

        public function setDividendo($dividendo) {
            $this -> dividendo = $dividendo;
        }

        public function getDividendo() {
            return $this -> dividendo;
        }

        public function setBonus($bonus) {
            $this -> bonus = $bonus;
        }

        public function getBonus() {
            return $this -> bonus;
        }

        public function getReddito() {
            return ($this -> dividendo * 12 + $this -> bonus);
        }

        public function getHtml() {
            return parent :: getHtml() . "<br>Reddito annuale: " . $this -> getReddito();
        }
    }

    $stipendio = new Stipendio("1200", true, false);
    $impiegato = New Impiegato("Mario", "Rossi", "12-10-2020", "Roma", "Codice fiscale", $stipendio, "12-10-2020");
    $capo = new Capo("Luigi", "Verdi", "12-10-2020", "Roma", "Codice fiscale", 0.26, 18000);

    echo $impiegato -> getHtml();

    echo $capo -> getHtml();

?>