<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kyc extends Model
{
    use HasFactory;

    
    protected $table = 'kycs'; 


    protected $fillable = [

        'account_number',
        'account_id',

        
        'full_name',

        //for permanent
        'permanent_province',
        'permanent_district',
        'permanent_municipality',
        'permanent_ward_no',
        'permanent_village',
        'permanent_house_no',
        'permanent_phone_no',
        'permanent_mobile_no',
        'permanent_email',
        

       // For temporary address
        'temporary_province',
        'temporary_district',
        'temporary_municipality',
        'temporary_ward_no',
        'temporary_village',
        'temporary_house_no',
        'temporary_phone_no',
        'temporary_mobile_no',
        'temporary_email',

        // For rental address
        'landlords_full_name',
        'rental_province',
        'rental_district',
        'rental_municipality',
        'rental_ward_no',
        'rental_village',
        'rental_house_no',
        'rental_phone_no',
        'rental_mobile_no',
        'rental_email',

        'date_of_birth',
        // 'date_of_birth_bs',


        // For citizenship and passport details
        'citizenship_no',
        'issued_by_citizen',
        'issued_date_citizen',
        'nationality',
        'gender',

        //passport details
        'passport_no',
        'issued_by_passport',
        'issued_date_passport',
        'expiry_date_passport',

         // Employee Identification
        'id_no',
        'issuing_office',

        // Family Details
        'husband_wife',
        'father',
        'mother',
        'grandfather',
        'son',
        'daughter',
        'daughter_in_law',
        'father_in_law',

        // Income Details
        'projected_annual_deposit',
        'projected_annual_income',
        'employment_status',
        // // 'salary',
        // // 'business',
        // // 'source3',
        // // 'rental',
        // // 'return_on_investment',
        // // 'inheritance',
        // // 'remittance',
        // // 'others',

        // Account Holder's Occupation/Business
        'occupation_business',  
        'name_of_institution',  
        'position_designation', 
        'estimated_annual_income', 
        'nature_of_occupation', 
        'address_of_inst', 

        // Financials
        'projected_annual_transaction_amount',
        'permanent_account_number',

        // Other Identification Documents
        'number_other',
        'issued_by_other',
        'issued_date_other',
        'expiry_date_other',

        'sources',


    ];

    protected $casts = ['sources' => 'array'];

    }

