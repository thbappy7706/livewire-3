<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use function Symfony\Component\Translation\t;

class BitCoinPrice extends Component
{


    public $price = 0;

    public $name ='';

    public function mount()
    {
        $this->name = "Tanvir Hossen Bappy";
    }

    public function render()
    {
        return view('livewire.bit-coin-price');
    }

    public function getPrice()
    {
        $res = file_get_contents('https://api.coinbase.com/v2/exchange-rates?currency=BTC');
        $apiRes = (array)collect(json_decode($res))->first()->rates;
        $this->price = $apiRes['BIT'];

    }
}
