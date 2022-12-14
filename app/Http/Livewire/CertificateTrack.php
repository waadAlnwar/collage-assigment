<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\certificate;
use Illuminate\Http\Request;

class CertificateTrack extends Component
{
    public $ref;
    public $certificate = null;
    public $message = null;
    public $ref_route;


    public function mount(Request $request)
    {
        $this->ref_route = $request->ref;

        if ($this->ref_route) {
            $this->ref = $this->ref_route;
            $this->getData();
        }
    }

    public function getData()
    {
        $this->validate([
            'ref' => 'required'
        ]);


        if (certificate::where('refreance_number', $this->ref)->get()->first()) {
            $this->certificate = certificate::where('refreance_number', $this->ref)->get()->first();
            $this->message = '';
        } else {
            $this->message = 'الرجاء التاكد من الرقم المرجعي';
        }
    }


    public function render()
    {
        return view('livewire.certificate-track');
    }
}
