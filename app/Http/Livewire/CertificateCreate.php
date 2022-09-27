<?php

namespace App\Http\Livewire;

use App\Models\certificate;
use App\Models\Degree;
use App\Models\Facutly;
use App\Models\Gender;
use App\Models\Major;
use Livewire\Component;
use Livewire\WithFileUploads;

class CertificateCreate extends Component
{
    use WithFileUploads;

    public $facutlies;
    public $majors;
    public $degrees;
    public $genders;


    public $first_name;
    public $second_name;
    public $third_name;
    public $fourth_name;
    public $std_id;
    public $gpa;
    public $year;
    public $facutly = null;
    public $major;
    public $degree;
    public $gender;
    public $arabic;
    public $english;
    public $details_arabic;
    public $details_english;
    public $attach;

    protected $rules = [
        'first_name' => 'required|string|max:249',
        'second_name' => 'required|string|max:249',
        'third_name' => 'required|string|max:249',
        'fourth_name' => 'required|string|max:249',
        // 'std_id' => 'required|max:249',
        'facutly' => 'required',
        'major' => 'required',
        'degree' => 'required',
        'gender' => 'required',
        'attach' => 'required|image',
    ];

    public function save()
    {
        $this->validate();

        $img = $this->attach->store('attachs');

        $certificate = certificate::create([
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'third_name' => $this->third_name,
            'fourth_name' => $this->fourth_name,
            'student_id' => $this->std_id,
            'facutly_id' => $this->facutly,
            'major_id' => $this->major,
            'degree_id' => $this->degree,
            'gpa' => $this->gpa,
            'arabic' => $this->arabic,
            'english' => $this->english,
            'details_arabic' => $this->details_arabic,
            'details_english' => $this->details_english,
            'gradute_year' => $this->year,
            'attachment' => $img,
        ]);

        redirect()->route('pay', $certificate->refreance_number);
    }


    public function mount()
    {
        $this->facutlies = Facutly::all();
        $this->majors = collect();
        $this->degrees = Degree::all();
        $this->genders = Gender::all();
    }

    public function updatedFacutly($state)
    {
        if (!is_null($state)) {
            $this->majors = Major::where('facutly_id', $state)->get();
        }
    }

    public function render()
    {

        return view('livewire.certificate-create');
    }
}
