<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\District;
use App\Models\Municipality;
use App\Models\kyc;
use Illuminate\Support\Facades\DB; 

class KycTwo extends Component
{

    public $provinces;
    public $districts;
    public $municipalities=[];

    public $selectedProvince;
    public $district;

    public $sources = [];
    public $selectedMunicipality;

    public $full_name, $permanent_province, $permanent_district, $permanentMunicipality, $permanent_ward_no, $permanent_village, $permanent_house_no, $permanent_phone_no, $permanent_mobile_no, $permanent_email, $temporary_province, $temporary_district, $temporary_municipality, $temporary_ward_no, $temporary_village, $temporary_house_no, $temporary_phone_no, $temporary_mobile_no, $temporary_email, $landlords_full_name, $rental_province, $rental_district, $rental_municipality, $rental_ward_no, $rental_village, $rental_house_no, $rental_phone_no, $rental_mobile_no, $rental_email;


    public $id_no, $issuing_office, $husband_wife, $father, $mother, $grandfather, $son, $daughter, $daughter_in_law, $father_in_law, $projected_annual_deposit, $projected_annual_income, $employment_status, $salary, $business, $source3, $rental, $return_on_investment, $inheritance, $remittance, $others, $province2, $name_of_institution, $nature_of_occupation, $address_of_inst, $position_designation, $estimated_annual_income, $projected_annual_transaction_amount, $permanent_account_number, $number, $issued_by, $issued_date, $expiry_date, $number_other, $issued_by_other, $issued_date_other, $expiry_date_other;
    public $permanent_municipality;

    
    public $permanentProvince;
    public $permanentDistricts=[], $permanentDistrict;
    public $permanentMuncipalities=[], $permanentMuncipality;


    public $temporaryProvince;
    public $temporaryDistricts=[], $temporaryDistrict;
    public $temporaryMuncipalities=[], $temporaryMuncipality;


    public $citizenship_no, $issued_by_citizen, $issued_date_citizen, $nationality, $gender, $passport_no, $issued_by_passport, $issued_date_passport, $expiry_date_passport;

    public $rentalProvince;
    public $rentalDistricts=[], $rentalDistrict;
    public $rentalMuncipalities=[], $rentalMuncipality;

    public $date_of_birth;
    public $occupation_business;
    public $date_of_birth_bs;      

    

    public function render()
    {
        return view('livewire.kyc2');
    }

    public function mount(){
        $this->provinces = Province::all();
        $this->districts = District::all();
        // dd($this->provinces);
    }

    public function updatedPermanentProvince($value){
        $this->permanentDistricts = District::where('province_id',$this->permanentProvince)->get();
        //dd($this->permanentDistricts);
    }

    public function updatedPermanentDistrict($value){
        $this->permanentMuncipalities = Municipality::where('district_id',$this->permanentDistrict)->get();
        // dd($this->permanentMuncipalities);
    }

    public function updatedSelectedProvince($value){
        $this->districts = District::where('province_id',$this->selectedProvince)->get();
        //dd($this->selectedProvince);
    }

    public function updatedMunicipality(){
        // dd($this->district);
        $this->municipalities = Municipality::where('district_id',$this->district)->get();
        // dd($this->municipalities);
    }




    // for temporary


    public function updatedTemporaryProvince($value){
        $this->temporaryDistricts = District::where('province_id',$this->temporaryProvince)->get();
        //dd($this->permanentDistricts);
    }

    public function updatedTemporaryDistrict($value){
        $this->temporaryMuncipalities = Municipality::where('district_id',$this->temporaryDistrict)->get();
        // dd($this->permanentMuncipalities);
    }

    public function updatedSelectedProvince1($value){
        $this->districts = District::where('province_id',$this->selectedProvince)->get();
        //dd($this->selectedProvince);
    }

    public function updatedMunicipality1(){
        // dd($this->district);
        $this->municipalities = Municipality::where('district_id',$this->district)->get();
        // dd($this->municipalities);
    }



    // for rental
    public function updatedRentalProvince($value){
        $this->rentalDistricts = District::where('province_id',$this->rentalProvince)->get();
        //dd($this->permanentDistricts);
    }

    public function updatedRentalDistrict($value){
        $this->rentalMuncipalities = Municipality::where('district_id',$this->rentalDistrict)->get();
        // dd($this->permanentMuncipalities);
    }

    public function updatedSelectedProvince2($value){
        $this->districts = District::where('province_id',$this->selectedProvince)->get();
        //dd($this->selectedProvince);
    }

    public function updatedMunicipality3(){
        // dd($this->district);
        $this->municipalities = Municipality::where('district_id',$this->district)->get();
        // dd($this->municipalities);
    }

    public function updatedDate_of_birth($value){
        dd($value);

        // dd($this->municipalities);
    }
    

    protected $rules = [
        'full_name' => 'required|string|max:255',

        'date_of_birth'=>'required|date',
        // 'date_of_birth_bs'=>'required|date',

            //permanent
            'permanentProvince' => 'required|string',
            'permanentDistrict' => 'required|string',
            'permanentMunicipality' => 'required|string',
            'permanent_ward_no' => 'required|string',
            'permanent_village' => 'required|string',
            'permanent_house_no' => 'required|string',
            'permanent_phone_no' => 'required|string',
            'permanent_mobile_no' => 'required|string',
            'permanent_email' => 'required|email|max:255',

            //temporary
            'temporaryProvince' => 'required|string',
            'temporaryDistrict' => 'required|string',
            'temporaryMuncipality' => 'required|string',
            'temporary_ward_no' => 'required|string',
            'temporary_village' => 'required|string',
            'temporary_house_no' => 'required|string',
            'temporary_phone_no' => 'required|string',
            'temporary_mobile_no' => 'required|string',
            'temporary_email' => 'required|email|max:255',

            //rental
            'landlords_full_name' => 'required|string|max:255',
            'rentalProvince' => 'required|string',
            'rentalDistrict' => 'required|string',
            'rentalMuncipality' => 'required|string',
            'rental_ward_no' => 'required|string',
            'rental_village' => 'required|string',
            'rental_house_no' => 'required|string',
            'rental_phone_no' => 'required|string',
            'rental_mobile_no' => 'required|string',
            'rental_email' => 'required|email|max:255',

            //citizenship
            'citizenship_no' => 'required|string',
            'issued_by_citizen' => 'required|string',
            'issued_date_citizen' => 'required|date',
            'nationality' => 'required|string',
            'gender' => 'required|string',

            //passport details
            'passport_no' => 'required|string|max:20',
            'issued_by_passport' => 'required|string|max:50',
            'issued_date_passport' => 'required|date',
            'expiry_date_passport' => 'required|date|after:issued_date_passport',

            // Employee Identification
            'id_no' => 'required|string|max:50',
            'issuing_office' => 'required|string|max:100',
          
            // Family Member Details
            'husband_wife' => 'required|string|max:255',
            'father' => 'required|string|max:255',
            'mother' => 'required|string|max:255',
            'grandfather' => 'required|string|max:255',
            'son' => 'required|string|max:255',
            'daughter' => 'required|string|max:255',
            'daughter_in_law' => 'required|string|max:255',
            'father_in_law' => 'required|string|max:255',

            'projected_annual_deposit' => 'required|numeric',
            'projected_annual_income' => 'required|numeric',
            'employment_status' => 'required|string|max:100',

            //sources
            'sources' => 'required|array',
            'sources.*' => 'string|max:100',
            

            //Account Holder Occupation/Business
            'occupation_business' => 'required|string|in:occupation,business',
            'name_of_institution' => 'required|string|max:255',
            'nature_of_occupation' => 'required|string|max:255',
            'address_of_inst' => 'required|string|max:255',
            'position_designation' => 'required|string|max:255',
            'estimated_annual_income' => 'required|numeric',
            
            'projected_annual_transaction_amount' => 'required|numeric',

            'permanent_account_number' => 'required|string|max:20',

            // Other Identification Documents
            'number_other' => 'required|string|max:50',
            'issued_by_other' => 'required|string|max:100',
            'issued_date_other' => 'required|date',
            'expiry_date_other' => 'required|date',

           
            
    ];

    public function submit()
    {
        //dd($this->occupation_business);
        
        // dd($this->date_of_birth);
         $this->validate();
        // dd($validatedData);
        
        kyc::create([
            'full_name' => $this->full_name,

            //permanent
            'permanent_province' => $this->permanentProvince,
            'permanent_district' => $this->permanentDistrict,
            'permanent_municipality' => $this->permanentMunicipality,
            'permanent_ward_no' => $this->permanent_ward_no,
            'permanent_village' => $this->permanent_village,
            'permanent_house_no' => $this->permanent_house_no,
            'permanent_phone_no' => $this->permanent_phone_no,
            'permanent_mobile_no' => $this->permanent_mobile_no,
            'permanent_email' => $this->permanent_email,

            //temp
            'temporary_province' => $this->temporaryProvince,
            'temporary_district' => $this->temporaryDistrict,
            'temporary_municipality' => $this->temporaryMuncipality,
            'temporary_ward_no' => $this->temporary_ward_no,
            'temporary_village' => $this->temporary_village,
            'temporary_house_no' => $this->temporary_house_no,
            'temporary_phone_no' => $this->temporary_phone_no,
            'temporary_mobile_no' => $this->temporary_mobile_no,
            'temporary_email' => $this->temporary_email,

            //rental
            'landlords_full_name' => $this->landlords_full_name,
            'rental_province' => $this->rentalProvince,
            'rental_district' => $this->rentalDistrict,
            'rental_municipality' => $this->rentalMuncipality,
            'rental_ward_no' => $this->rental_ward_no,
            'rental_village' => $this->rental_village,
            'rental_house_no' => $this->rental_house_no,
            'rental_phone_no' => $this->rental_phone_no,
            'rental_mobile_no' => $this->rental_mobile_no,
            'rental_email' => $this->rental_email,

            'date_of_birth'=>$this->date_of_birth,
            // 'date_of_birth_bs'=>$this->date_of_birth_bs,


            //citizenship
            'citizenship_no' => $this->citizenship_no,
            'issued_by_citizen' => $this->issued_by_citizen,
            'issued_date_citizen' => $this->issued_date_citizen,
            'nationality' => $this->nationality,
            'gender' => $this->gender,

            //passport
            'passport_no' => $this->passport_no,
            'issued_by_passport' => $this->issued_by_passport,
            'issued_date_passport' => $this->issued_date_passport,
            'expiry_date_passport' => $this->expiry_date_passport,

            // Employee Identification
            'id_no' => $this->id_no,
            'issuing_office' => $this->issuing_office,

            // Family Member Details
            'husband_wife' => $this->husband_wife,
            'father' => $this->father,
            'mother' => $this->mother,
            'grandfather' => $this->grandfather,
            'son' => $this->son,
            'daughter' => $this->daughter,
            'daughter_in_law' => $this->daughter_in_law,
            'father_in_law' => $this->father_in_law,

            // Income Details
            'projected_annual_deposit' => $this->projected_annual_deposit,
            'projected_annual_income' => $this->projected_annual_income,
            'employment_status' => $this->employment_status,

            // Occupation/Business Details
            'occupation_business' => $this->occupation_business,
            'name_of_institution' => $this->name_of_institution,
            'nature_of_occupation' => $this->nature_of_occupation,
            'address_of_inst' => $this->address_of_inst,
            'position_designation' => $this->position_designation,
            'estimated_annual_income' => $this->estimated_annual_income,

            // Transaction Details
            'projected_annual_transaction_amount' => $this->projected_annual_transaction_amount,
            'permanent_account_number' => $this->permanent_account_number,
           

            //PAN and Other Identification
            
            'number_other' => $this->number_other,
            'issued_by_other' => $this->issued_by_other,
            'issued_date_other' => $this->issued_date_other,
            'expiry_date_other' => $this->expiry_date_other,


            'sources' => $this->sources,

        ]);
        return redirect()->route('form.success');
    }
    
}
