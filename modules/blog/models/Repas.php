<?php

namespace Blog\Models;

class Repas
{
    public function __construct(private $id_rp, private $dates, private $id_cl){}
}