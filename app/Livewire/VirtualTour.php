<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Virtual Tour')]
class VirtualTour extends Component
{
    public $currentSlide = 0;
    public $locations = [
        [
            'title' => 'FACULTY OF ENGINEERING VIRTUAL TOUR',
            'url' => 'https://www.theasys.io/viewer/DN3K0DTDLFg01OJiZ84x6FFz8wQje8/',
            'color' => '#FFAC00'
        ],
        [
            'title' => 'DEAN BUILDING VIRTUAL TOUR',
            'url' => 'https://www.theasys.io/viewer/hb3ZseXmIcQkDKSuqZ4negDJLAiXIb/',
            'color' => '#629B5C'
        ],
        [
            'title' => 'ENGINEERING DEPARTMENTS VIRTUAL TOUR',
            'url' => 'https://www.theasys.io/viewer/SJpgwdkBV0YH8AFzRDR6EEcspKB3VG/',
            'color' => '#E84826'
        ],
        [
            'title' => 'INFORMATICS DEPARTMENT',
            'url' => 'https://www.canva.com/design/DAFdlojrbnc/-I1RyyU0ZxjibVoPoXx4vg/view',
            'color' => '#77AFD8'
        ]
    ];

    public function nextSlide()
    {
        $this->currentSlide = ($this->currentSlide + 1) % 2;
    }

    public function prevSlide() 
    {
        $this->currentSlide = $this->currentSlide > 0 ? $this->currentSlide - 1 : 1;
    }

    public function render()
    {
        return view('livewire.virtual-tour');
    }
}