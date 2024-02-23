<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\FlareClient\Api;

class Searchword extends Component
{
    public $word;
    public $definition;

    public function search()
    {
        $this->definition = Api::get('https://dictionaryapi.dev/api/v2/entries/en/' . $this->word);
    }

    public function render()
    {
        return view('livewire.search-word');
    }
}