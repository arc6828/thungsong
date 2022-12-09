<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    protected $listeners = [ 'change' ];
    public $path = "";
    public $count = 0;
    public $all = [];
    public $districts = [];
    public $amphoes = [];
    public $provinces = [];

    public $district_value = "";
    public $amphoe_value = "";
    public $province_value = "";
    public $zipcode = [];

    public function mount()
    {        
        $this->path = url('/raw_database.json');
        $data = json_decode(file_get_contents($this->path), false);

        $provinces = array_map(function($item){
            return $item->province;
        },$data);

        $this->provinces = array_unique($provinces);
    }

    public function onProvinceChanged(){
        $data = json_decode(file_get_contents($this->path), false);        
        $amphoes = array_filter($data,function($item){
            return $item->province == $this->province_value ;
        });
        $amphoes = array_map(function($item){
            return $item->amphoe;
        },$amphoes);
        $this->amphoes = array_unique($amphoes);
    }

    public function onAmphoeChanged(){
        $data = json_decode(file_get_contents($this->path), false);
        $districts = array_filter($data,function($item){
            return $item->amphoe == $this->amphoe_value && $item->province == $this->province_value ;
        });
        $districts = array_map(function($item){
            return $item->district;
        },$districts);
        $this->districts = array_unique($districts);
    }

    public function onDistrictChanged(){
        $data = json_decode(file_get_contents($this->path), false);
        $zipcodes = array_filter($data,function($item){
            return $item->district == $this->districts && $item->amphoe == $this->amphoe_value && $item->province == $this->province_value ;
        });
        $zipcodes = array_map(function($item){
            return $item->zipcode;
        },$zipcodes);
        $this->zipcode = array_values($zipcodes)[0];
    }

    

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
