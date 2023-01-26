<?php

class Stipendio
{
    private $mensile;
    private $tredicesima;
    private $quattordicesima;
    private $annuale;


    public function __construct($mensile, $tredicesima, $quattordicesima)
    {

        $this->setMensile($mensile);
        $this->setTredicesima($tredicesima);
        $this->setQuattordicesima($quattordicesima);

    }
    public function getMensile()
    {

        return $this->mensile;
    }
    public function setMensile($mensile)
    {

        $this->mensile = $mensile;
    }
    public function getTredicesima()
    {

        return $this->tredicesima;
    }
    public function setTredicesima($tredicesima)
    {

        /* ($this->tredicesima = 0 || $this->tredicesima = 1) ? $this->tredicesima = $tredicesima : NULL;  */
        $this->tredicesima = $tredicesima;
        
        
    }
    public function getQuattordicesima()
    {
        return $this->quattordicesima;
    }
    public function setQuattordicesima($quattordicesima)
    {
        $this->quattordicesima = $quattordicesima;
    }
    public function getStipendioAnnuale()
    {
        return $this->annuale;
    }
    public function setStipendioAnnuale(){
        $this->annuale = ( $this->getMensile() * ( 12 + ( $this->quattordicesima ) + ( $this->tredicesima ) ) );
    }
    public function getHtml()
    {

        return $this->getMensile() . "<br>"
            . $this->getTredicesima() . "<br>"
            . $this->getQuattordicesima() . "<br>"
            . $this->getStipendioAnnuale();
    }
}

class Persona
{
    private $nome;
    private $cognome;
    private $codiceF;
    private $luogoNascita;
    private $dataNascita;



    public function __construct($nome, $cognome, $codiceF, $luogoNascita, $dataNascita)
    {

        $this->setNome($nome);
        $this->setCognome($cognome);
        $this->setCodiceF($codiceF);
        $this->setLuogoNascita($luogoNascita);
        $this->setDataNascita($dataNascita);

    }
    public function getNome()
    {

        return $this->nome;
    }
    public function setNome($nome)
    {

        $this->nome = $nome;
    }
    public function getCognome()
    {

        return $this->cognome;
    }
    public function setCognome($cognome)
    {

        $this->cognome = $cognome;
    }
    public function getCodiceF()
    {

        return $this->codiceF;
    }
    public function setCodiceF($codiceF)
    {

        $this->codiceF = $codiceF;
    }
    public function getLuogoNascita()
    {

        return $this->luogoNascita;
    }
    public function setLuogoNascita($luogoNascita)
    {

        $this->luogoNascita = $luogoNascita;
    }
    public function getDataNascita()
    {

        return $this->dataNascita;
    }
    public function setDataNascita($dataNascita)
    {

        $this->dataNascita = $dataNascita;
    }
    public function getHtml()
    {

        return $this->getNome() . "<br>"
            . $this->getCognome() . "<br>"
            . $this->getDataNascita() . "<br>"
            . $this->getLuogoNascita() . "<br>"
            . $this->getCodiceF();
    }
}
class Impiegato extends Persona {
    private $dataAssunzione;
    private Stipendio $stipendio;
    public function __construct($nome, $cognome, $codiceF, $luogoNascita, $dataNascita, $dataAssunzione, Stipendio $stipendio)
    {
        parent::__construct($nome, $cognome, $codiceF, $luogoNascita, $dataNascita);
        $this->setDataAssunzione($dataAssunzione);
        $this->setStipendio($stipendio);

    }
    public function getDataAssunzione()
    {

        return $this->dataAssunzione;
    }
    public function setDataAssunzione($dataAssunzione)
    {

        $this->dataAssunzione = $dataAssunzione;
    }
    public function getStipendio()
    {

        return $this->stipendio;
    }
    public function setStipendio(Stipendio $stipendio)
    {

        $this->stipendio = $stipendio;
    }
    public function getHtml()
    {

        return parent :: getHtml() . "<br>"
            . $this->getDataAssunzione() . "<br>"
            . $this->getStipendio() -> setStipendioAnnuale();
    }
}
class Boss extends Persona
{
    private Stipendio $dividendo;
    private $bonus;
    private $redditoAnnuale;
    public function __construct($nome, $cognome, $codiceF, $luogoNascita, $dataNascita, $dividendo, $bonus)
    {
        parent::__construct($nome, $cognome, $codiceF, $luogoNascita, $dataNascita);
        $this->setDividendo($dividendo);
        $this->setBonus($bonus);

    }
    public function getBonus()
    {

        return $this->bonus;
    }
    public function setBonus($bonus)
    {

        $this->bonus = $bonus;
    }
    public function getDividendo()
    {

        return $this->dividendo;
    }
    public function setDividendo($dividendo)
    {

        $this->dividendo = $dividendo;
    }
    public function getRedditoAnnuale()
    {
        return $this->redditoAnnuale;
    }
    public function setRedditoAnnuale($dividendo)
    {
        $this->redditoAnnuale = ( $dividendo * 12 ) + ($this->bonus);
    }
    public function getHtml()
    {

        return parent :: getHtml() . "<br>"
            . $this->getDividendo() . "<br>"
            . $this->getRedditoAnnuale();
    }

}



$Impiegato1Stipendio = new Stipendio(2000, true, true);
$Boss1 = new Boss("Piero", "Rossi", "PRRS20301230P", "Foligno", "1939-01-01", 2000, 10000);
$Impiegato1 = new Impiegato("Aronne", "Piperno", "ARPI20301230P", "Roma", "1779-01-01", "1941-01-01", $Impiegato1Stipendio);

echo "<h1>";

echo "</h1>";








