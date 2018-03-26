<?php

class person
{
    private $fornavn;
    private $etternavn;
    private $adresse;
    private $postnr;
    private $poststed;
    private $telefonnr;
    
    public function set_fornavn($fornavn)
    {
        $this->fornavn = $fornavn;
    }
    
    public function get_fornavn()
    {
        return $this->fornavn;
    }
   
    public function set_etternavn($etternavn)
    {
        $this->etternavn = $etternavn;
    }
    
    public function get_etternavn()
    {
        return $this->etternavn;
    }
    
    public function set_adresse($adresse)
    {
        $this->adresse = $adresse;
    }
    
    public function get_adresse()
    {
        return $this->adresse;
    }
    
    public function set_postnr($postnr)
    {
        $this->postnr = $postnr;
    }
    
    public function get_postnr()
    {
        return $this->postnr;
    }
    
    public function set_poststed($poststed)
    {
        $this->poststed = $poststed;
    }
    
    public function get_poststed()
    {
        return $this->poststed;
    }
    
    public function set_telefonnr($telefonnr)
    {
        $this->telefonnr = $telefonnr;
    }
    
    public function get_telefonnr()
    {
        return $this->telefonnr;
    }
}

class utover extends person
{
    private $nasjonalitet;
    
    public function set_nasjonalitet($nasjonalitet)
    {
        $this->nasjonalitet = $nasjonalitet;
    }
    
    public function get_nasjonalitet()
    {
        return $this->nasjonalitet;
    }
}

class publikum extends person
{
    private $billettype;
    
    public function set_billettype($billettype)
    {
        $this->billettype = $billettype;
    }
    
    public function get_billettype()
    {
        return $this->billettype;
    }
}

class ovelse
{
    private $type;
    private $dato;
    private $tid;
    private $sted;
    
    public function set_type($type)
    {
        $this->type = $type;
    }

    public function get_type()
    {
        return $this->type;
    }
    
    public function valider_type($type)
    {
        return preg_match('/^[0-9a-zæøåA-Z.-]{2,20}$/', $type);
    }
    public function set_dato($dato)
    {
        $this->dato = $dato;
    }
    
    public function get_dato()
    {
        return $this->dato;
    }
    
    public function valider_dato($dato)
    {
        return preg_match('/^[0-9]{2}.[0-9]{2}.[0-9]{4}$/', $dato);
    }
    
    public function set_tid($tid)
    {
        $this->tid = $tid;
    }
    
    public function get_tid()
    {
        return $this->tid;
    }
        
    public function valider_tid($tid)
    {
        return preg_match('/^[0-9]{2}:[0-9]{2}$/', $tid);
    }
    
    public function set_sted($sted)
    {
        $this->sted = $sted;
    }
    
    public function get_sted()
    {
        return $this->sted;
    }
    
    public function valider_sted($sted)
    {
        return preg_match('/^[a-zæøåA-Z.-]{2,20}$/', $sted);
    }
}

?>
