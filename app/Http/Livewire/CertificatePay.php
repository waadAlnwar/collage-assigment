<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\certificate;
use App\Models\Status;
use Illuminate\Http\Request;

class CertificatePay extends Component
{

    public $ref_route;
    public $ref;
    public $message;

    public function mount(Request $request)
    {
        $this->ref_route = $request->ref;
    }

    public function pay()
    {
        $this->validate([
            'ref' => 'required'
        ]);


        if (certificate::where('refreance_number', $this->ref)->get()->first()) {
            $this->message = '';
            $certificate = certificate::where('refreance_number', $this->ref)->get()->first();
            $certificate->status_id = Status::where('name', 'paid')->first()->id;
            $certificate->save();
            redirect()->route('track', $certificate->refreance_number);
        } else {
            $this->message = 'الرجاء التاكد من الرقم المرجعي';
        }
    }


    public function render()
    {
        return view('livewire.certificate-pay');
    }
}
