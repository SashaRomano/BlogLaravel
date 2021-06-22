<?php


namespace App;


class Currency
{
    public function get_currency()
    {
        $currency = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
        $currency = \GuzzleHttp\json_decode($currency, true);
        foreach ($currency as $cur){
            echo '<li><p>' . $cur['ccy'] . '-' . $cur['buy'] . '<?p><?li>';
        }

    }
}
