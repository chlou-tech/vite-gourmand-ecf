<?php

class AvisNoSQL
{
    private $file = __DIR__ . '/../../data/avis.json';

    public function getAll()
    {
        $data = file_get_contents($this->file);
        return json_decode($data, true);
    }

    public function add($avis)
    {
        $data = $this->getAll();

        $avis['date'] = date('Y-m-d H:i:s');

        $data[] = $avis;

        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT));
    }
}
