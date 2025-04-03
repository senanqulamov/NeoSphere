<?php

namespace App\Livewire;

use App\Models\Sphere;
use Livewire\Component;

class SphereList extends Component
{
    public $spheres;

    public function mount()
    {
        $this->spheres = Sphere::all();
    }

    public function selectSphere($sphereId)
    {
        $sphere = Sphere::find($sphereId);

        // Emit an event with the sphere details
        $this->emit('sphereSelected', $sphere);
    }

    public function render()
    {
        return view('livewire.sphere-list');
    }
}
