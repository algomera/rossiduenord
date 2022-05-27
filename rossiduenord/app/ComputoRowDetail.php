<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComputoRowDetail extends Model
{

    public function getTotalAttribute()
    {
        if( $this->expression == null){

            $lunghezza =  $this->length;
            $larghezza = $this->width;
            $nps = $this->nps;
            $hps = $this->hps;

            $totale = ($nps) * ($lunghezza) * ($larghezza) * ($hps);
        }else {
            $totale = ''; /* todo formula di pitagora/erone/ecc.. */
        }

        return $totale;
    }
}
