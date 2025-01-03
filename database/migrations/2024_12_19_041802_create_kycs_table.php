<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kycs', function (Blueprint $table) {
            $table->id(); 
            
            $table->string('account_number')->nullable(); 
            $table->string('account_id')->nullable(); 

            $table->string('full_name'); 

            //for permanent
            $table->string('permanent_province')->nullable(); 
            $table->string('permanent_district')->nullable(); 
            $table->string('permanent_municipality')->nullable(); 
            $table->string('permanent_ward_no')->nullable();
            $table->string('permanent_village')->nullable(); 
            $table->string('permanent_house_no')->nullable(); 
            $table->string('permanent_phone_no')->nullable(); 
            $table->string('permanent_mobile_no')->nullable();
            $table->string('permanent_email')->nullable(); 

            //for temporary
            $table->string('temporary_province')->nullable();
            $table->string('temporary_district')->nullable();
            $table->string('temporary_municipality')->nullable();
            $table->string('temporary_ward_no')->nullable();
            $table->string('temporary_village')->nullable();
            $table->string('temporary_house_no')->nullable();
            $table->string('temporary_phone_no')->nullable();
            $table->string('temporary_mobile_no')->nullable();
            $table->string('temporary_email')->nullable();

            //for rental
            $table->string('landlords_full_name')->nullable();
            $table->string('rental_province')->nullable();
            $table->string('rental_district')->nullable();
            $table->string('rental_municipality')->nullable();
            $table->string('rental_ward_no')->nullable();
            $table->string('rental_village')->nullable();
            $table->string('rental_house_no')->nullable();
            $table->string('rental_phone_no')->nullable();
            $table->string('rental_mobile_no')->nullable();
            $table->string('rental_email')->nullable();

            $table->date('date_of_birth')->nullable();
            // $table->date('date_of_birth_bs')->nullable();


            
            // Citizenship Certificate fields
            $table->string('citizenship_no')->nullable();
            $table->string('issued_by_citizen')->nullable();
            $table->date('issued_date_citizen')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();

            // Passport fields
            $table->string('passport_no')->nullable();
            $table->string('issued_by_passport')->nullable();
            $table->date('issued_date_passport')->nullable();
            $table->date('expiry_date_passport')->nullable();

            
            // Employee Identification
            $table->string('id_no')->nullable();
            $table->string('issuing_office')->nullable();
            
            // Family Details
            $table->string('husband_wife')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('grandfather')->nullable();
            $table->string('son')->nullable();
            $table->string('daughter')->nullable();
            $table->string('daughter_in_law')->nullable();
            $table->string('father_in_law')->nullable();
            

            $table->json('sources')->nullable(); 
            // Income Details
            $table->string('projected_annual_deposit')->nullable();
            $table->string('projected_annual_income')->nullable();
            $table->string('employment_status')->nullable();
            // // $table->boolean('salary')->default(false);
            // // $table->boolean('business')->default(false);
            // // $table->boolean('source3')->default(false);
            // // $table->boolean('rental')->default(false);
            // // $table->boolean('return_on_investment')->default(false);
            // // $table->boolean('inheritance')->default(false);
            // // $table->boolean('remittance')->default(false);
            // // $table->boolean('others')->default(false);
            
           

            // Account Holder's Occupation/Business
            $table->enum('occupation_business', ['occupation', 'business'])->nullable();
            $table->string('name_of_institution')->nullable();
            $table->string('nature_of_occupation')->nullable();
            $table->string('address_of_inst')->nullable();
            $table->string('position_designation')->nullable();
            $table->string('estimated_annual_income')->nullable();
            $table->string('projected_annual_transaction_amount')->nullable();
            $table->string('permanent_account_number')->nullable();
            
            // Other Identification Documents
            $table->string('number_other')->nullable();
            $table->string('issued_by_other')->nullable();
            $table->date('issued_date_other')->nullable();
            $table->date('expiry_date_other')->nullable();
            

            $table->timestamps();
            
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('kycs');
    }
};
