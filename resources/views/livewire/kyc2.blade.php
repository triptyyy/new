{{-- <!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-size: 18px;         
        }
        .form-label, .form-control, .form-check-label {
            font-size: 1rem;
        }
        .btn-lg {
            font-size: 1.5rem;
            padding: 10px 20px;
        }
      
        body .container {
            max-width: 800px;
            padding: 10px;
            
        }
    </style>


</head>
<body> --}}


    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> --}}
    {{-- <script>
        jQuery(document).ready(function(){
            jQuery('#province').change(function(){
                let id=jQuery(this).val();
                jQuery.ajax({
                    url:'/getDistrict',
                    type:'post',
                    data:'id='+id+'&_token={{csrf_token()}}',
                    success:function(result){
                        jQuery('#province').html(result)
                    }
                })
            });
        });
    </script> --}}



    <div class="container mt-4">
        <form  wire:submit.prevent="submit">
            @csrf
        <div>
            <h2 class="mb-4 text-center"><u>Know Your Customer (KYC) Form for Individual Account</u></h2>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h4 class="mb-5 text-left">Account No:</h4>
                <h4 class="mb-5 text-right" style="margin: 0;">Date: <span wire:model="currentDate"></span></h4>
    
            </div>
                <h5 class="mb-5 text-left"><u>Detail of Account Holder</u></h5>
        </div>

        <div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <label for="account_number" class="form-label">Account Number</label>
                    <input type="text" wire:model="account_number" class="form-control form-control">
                </div>
                <div class="col-md-4">
                    <label for="account_id" class="form-label">Account ID</label>
                    <input type="text" wire:model="account_id" class="form-control form-control">
                </div>
                <div class="col-md-4">
                    <button type="submit" wire:click="submit" class="btn btn-primary" >Submit</button>
                </div>
            </div>
        </div>
    
        <div class="row mb-4">
            <label class="form-label" for="full_name">1. Full Name</label>
            <input wire:model="full_name" type="text" name="full_name" class="form-control" @error('full_name') style="border: 1px solid red" @enderror >
            @error('full_name')
                <span class="alert alert-danger">Full name is required</span>
            @enderror
        </div>
    
    
       <div class="row mb-4">
            <label class="form-label" for="full_name">2. Permanent Address:</label>
        </div>
    
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="permanent_province" class="form-label">Province</label>
                <select class="form-control" wire:model.live="permanentProvince" >
                   
                    <option value="">Select Province</option>
                    @foreach ($provinces as $province)
                        <option value="{{$province->province_id}}"> {{$province['province_name']}} </option>
                    @endforeach
                    
                </select>    
                @error('permanentProvince')
        <span class="text-danger">{{ $message }}</span>
    @enderror
            </div>
            <div class="col-md-4">
                <label for="permanent_district" class="form-label">District</label>
                <select class="form-control" wire:model.live="permanentDistrict" >
                    <option value="">Select District</option>
                    @foreach ($permanentDistricts as $district)
                        <option value="{{ $district->district_id }}">{{ $district['district_name'] }}</option>
                    @endforeach
                </select>
                @error('permanentDistrict')
                <span class="text-danger">{{ $message }}</span>
            @enderror
               
            </div>
            <div class="col-md-4">
                <label wire:model="permanent_municipality"for="municipality" class="form-label">Municipality</label>
                <select class="form-control" wire:model="permanentMunicipality">
                    <option value="">Select Municipality</option>
                    @foreach ($permanentMuncipalities as $municipality)
                        <option value="{{ $municipality->id }}">{{ $municipality['municipality_name'] }} {{ $municipality['type'] }}</option>
                    @endforeach
                </select>
                @error('permanentMunicipality')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
        </div>
    
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="permanent_ward_no" class="form-label">Ward no.</label>
                <input type="text" wire:model="permanent_ward_no" class="form-control"  @error('permanent_ward_no') style="border: 1px solid red" @enderror>
                @error('permanent_ward_no')
                    <span class="alert alert-danger">Permanent Ward no. is required</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="permanent_village" class="form-label">Village/Tole</label>
                <input type="text" wire:model="permanent_village" class="form-control " @error('permanent_village') style="border: 1px solid red" @enderror>
                @error('permanent_village')
                    <span class="alert alert-danger">Permanent Ward no. is required</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="permanent_house_no" class="form-label">House no.</label>
                <input type="text" wire:model="permanent_house_no" class="form-control form-control"  @error('full_name') style="border: 1px solid red" @enderror>
                @error('permanent_house_no')
                    <span class="alert alert-danger">Permanent house is required</span>
                @enderror
            </div>
        </div>
    
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="permanent_phone_no" class="form-label">Phone no.</label>
                <input type="text" wire:model="permanent_phone_no" class="form-control"  @error('permanent_phone_no') style="border: 1px solid red" @enderror>
                @error('permanent_phone_no')
                    <span class="alert alert-danger">Permanent phone no. is required</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="permanent_mobile_no" class="form-label">Mobile No.</label>
                <input type="text" wire:model="permanent_mobile_no" class="form-control form-control"  @error('permanent_mobile_no') style="border: 1px solid red" @enderror>
                @error('permanent_mobile_no')
                <span class="alert alert-danger">Permanent mobile no. is required</span>
            @enderror
            </div>
            <div class="col-md-4">
                <label for="permanent_email" class="form-label">E-mail</label>
                <input type="text" wire:model="permanent_email" class="form-control form-control">
            </div>
        </div>
    
       <div class="row mb-4">
            <label class="form-label" for="temporary_address">3. Temporary/Current Residential Address:</label>
        </div>
    
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="temporary_province" class="form-label">Province</label>
                <select class="form-control" wire:model.live="temporaryProvince">
                    <option value="">Select Province</option>
                    @foreach ($provinces as $province)
                        <option value="{{$province->province_id}}"> {{$province['province_name']}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="temporary_district" class="form-label">District</label>
                <select class="form-control" wire:model.live="temporaryDistrict">
                    <option value="">Select District</option>
                    @foreach ($temporaryDistricts as $district)
                        <option value="{{ $district->district_id }}">{{ $district['district_name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="temporary_municipality" class="form-label">Municipality/VC</label>
                <select class="form-control" wire:model="temporaryMuncipality">
                    <option value="">Select Municipality</option>
                    @foreach ($temporaryMuncipalities as $municipality)
                        <option wire:model="permanent_municipality"value="{{ $municipality->id }}">{{ $municipality['municipality_name'] }} {{ $municipality['type'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="temporary_ward_no" class="form-label">Ward no.</label>
                <input type="text" wire:model="temporary_ward_no" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="temporary_village" class="form-label">Village/Tole</label>
                <input type="text" wire:model="temporary_village" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="temporary_house_no" class="form-label">House no.</label>
                <input type="text" wire:model="temporary_house_no" class="form-control form-control">
            </div>
        </div>
    
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="temporary_phone_no" class="form-label">Phone no.</label>
                <input type="text" wire:model="temporary_phone_no" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="temporary_mobile_no" class="form-label">Mobile No.</label>
                <input type="text" wire:model="temporary_mobile_no" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="temporary_email" class="form-label">E-mail</label>
                <input type="text" wire:model="temporary_email" class="form-control form-control">
            </div>
        </div>
    
        <div class="row mb-4">
            <label class="form-label" for="rental_address">4. Rental Address:</label>
        </div>
        <div>
            <label  for="landlords_full_name" class="form-label">Landlord's Full Name:</label>
            <input type="text" wire:model="landlords_full_name" class="form-control" @error('landlords_full_name') style="border: 1px solid red" @enderror>
            @error('landlords_full_name')
                <span class="alert alert-danger">Landlords full nameis required</span>
            @enderror
    
        </div>
    
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="rental_province" class="form-label">Province</label>
                <select class="form-control" wire:model.live="rentalProvince">
                    <option value="">Select Province</option>
                    @foreach ($provinces as $province)
                        <option value="{{$province->province_id}}"> {{$province['province_name']}} </option>
                    @endforeach
                </select>
            </div>
    
    
    
            <div class="col-md-4">
                <label for="rental_district" class="form-label">District</label>
                <select class="form-control" wire:model.live="rentalDistrict">
                    <option value="">Select District</option>
                    @foreach ($rentalDistricts as $district)
                        <option value="{{ $district->district_id }}">{{ $district['district_name'] }}</option>
                    @endforeach
                </select>
                </div>
            <div class="col-md-4">
                <label for="rental_municipality" class="form-label">Municipality/VC</label>
                <select class="form-control" wire:model="rentalMuncipality">
                    <option value="">Select Municipality</option>
                    @foreach ($rentalMuncipalities as $municipality)
                        <option wire:model="permanent_municipality"value="{{ $municipality->id }}">{{ $municipality['municipality_name'] }} {{ $municipality['type'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="rental_ward_no" class="form-label">Ward no.</label>
                <input type="text" wire:model="rental_ward_no" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="rental_village" class="form-label">Village/Tole</label>
                <input type="text" wire:model="rental_village" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="rental_house_no" class="form-label">House no.</label>
                <input type="text" wire:model="rental_house_no" class="form-control form-control">
            </div>
        </div>
    
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="rental_phone_no" class="form-label">Phone no.</label>
                <input type="text" wire:model="rental_phone_no" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="rental_mobile_no" class="form-label">Mobile No.</label>
                <input type="text" wire:model="rental_mobile_no" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="rental_email" class="form-label">E-mail</label>
                <input type="text" wire:model="rental_email" class="form-control form-control">
            </div>
        </div>
         <div class="row mb-4">
            <div class="col-md-4 mb-4">
                <label for="date_of_birth" class="form-label">Date of Birth(A.D)</label>
                <input type="date" wire:model="date_of_birth" class="form-control form-control">
            </div>
            {{-- <div class="col-md-4 mb-4">
                <label for="date_of_birth_bs" class="form-label">Date of Birth(B.S)</label>
                <input value="" type="text" wire:model="date_of_birth_bs" class="form-control form-control date-picker-bs">
            </div> --}}
            
        </div>
    
        <div class="row mb-4">
            <label class="form-label" for="citizenship_certificate">6. Citizenship Certificate</label>
        </div>
    
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="citizenship_no" class="form-label">Citizenship No.</label>
                <input type="text" wire:model="citizenship_no" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="issued_by_citizen" class="form-label">Issued By</label>
                <input type="text" wire:model="issued_by_citizen" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="issued_date_citizen" class="form-label">Issued Date</label>
                <input type="date" wire:model="issued_date_citizen" class="form-control form-control">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="nationality" class="form-label">Nationality</label>
                <input type="text" wire:model="nationality" class="form-control form-control">
            </div>
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <input type="text" wire:model="gender" class="form-control form-control">
            </div>
        </div>
       <div class="row mb-4">
            <label class="form-label" for="passport">7. Passport</label>
        </div>
    
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="passport_no" class="form-label">Passport No.</label>
                <input type="text" wire:model="passport_no" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="issued_by_passport" class="form-label">Issued By</label>
                <input type="date" wire:model="issued_by_passport" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="issued_date_passport" class="form-label">Issued Date</label>
                <input type="date" wire:model="issued_date_passport" class="form-control form-control">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="expiry_date_passport" class="form-label">Expity Date</label>
                <input type="date" wire:model="expiry_date_passport" class="form-control form-control">
            </div>
        </div>
        <div class="row mb-4">
            <label class="form-label" for="employee_identification">8. Employee Identification</label>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="id_no" class="form-label">ID No.</label>
                <input type="text" wire:model="id_no" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="issuing_office" class="form-label">Issuing Office</label>
                <input type="text" wire:model="issuing_office" class="form-control form-control">
            </div>
        </div>
        <div class="row mb-4">
            <label class="form-label">9.Detail of Family Member of Account Holder :</label>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="husband_wife" class="form-label">Husband/ Wife</label>
                <input type="text" wire:model="husband_wife" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="father" class="form-label">Father</label>
                <input type="text" wire:model="father" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="mother" class="form-label">Mother</label>
                <input type="text" wire:model="mother" class="form-control form-control">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="grandfather" class="form-label">Grandfather</label>
                <input type="text" wire:model="grandfather" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="son" class="form-label">Son</label>
                <input type="text" wire:model="son" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="daughter" class="form-label">Daughter</label>
                <input type="text" wire:model="daughter" class="form-control form-control">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="daughter_in_law" class="form-label">Daughter-in-law(Son's wife)</label>
                <input type="text" wire:model="daughter_in_law" class="form-control form-control">
            </div>
            <div class="col-md-6">
                <label for="father_in_law" class="form-label">Father-in-Law</label>
                <input type="text" wire:model="father_in_law" class="form-control form-control">
            </div>
        </div>
        <div class="row mb-4">
            <label class="form-label">10. Income Details:</label>
        </div>
        <div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <label for="projected_annual_deposit" class="form-label">Projected annual deposit</label>
                    <input type="text" wire:model="projected_annual_deposit" class="form-control form-control">
                </div>
                <div class="col-md-4">
                    <label for="projected_annual_income" class="form-label">Projected annual income</label>
                    <input type="text" wire:model="projected_annual_income" class="form-control form-control">
                </div>
                <div class="col-md-4">
                    <label for="employment_status" class="form-label">Employment Status</label>
                    <input type="text" wire:model="employment_status" class="form-control form-control">
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <label class="form-label">11. Select your sources:</label>
                <div class="form-check mt-4 mb-3">
                    <input type="checkbox" wire:model="sources" value="salary" class="form-check-input">
                    <label for="salary" class="form-check-label">Salary</label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" wire:model="sources" value="business" class="form-check-input">
                    <label for="business" class="form-check-label">Business</label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" wire:model="sources" value="source3" class="form-check-input">
                    <label for="source3" class="form-check-label">Source 3</label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" wire:model="sources" value="rental" class="form-check-input">
                    <label for="rental" class="form-check-label">Rental</label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" wire:model="sources" value="roi" class="form-check-input">
                    <label for="return_on_investment" class="form-check-label">Return on Investment</label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" wire:model="sources" value="inheritance" class="form-check-input">
                    <label for="inheritance" class="form-check-label">Inheritance</label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" wire:model="sources" value="remittance" class="form-check-input">
                    <label for="remittance" class="form-check-label">Remittance</label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" wire:model="sources" value="others" class="form-check-input">
                    <label for="others" class="form-check-label">Others</label>
                </div>
            </div>
        </div>
        
        
       
        <div class="row mb-4">
            <label class="form-label">12. Detail of Account Holder’s Occupation/Business:</label>
        </div>
        <div class="row mb-4">
            <label for="select" class="form-label">Select one</label>
            <select wire:model="occupation_business" class="form-control form-control">
                <option value="">Select</option>
                <option value="occupation">Occupation</option>
                <option value="business">Business</option>
            </select>
        </div>

        <div class="row mb-4">
           
            <div class="col-md-4">
                <label for="name_of_institution" class="form-label">Name of Institution</label>
                <input type="text" wire:model="name_of_institution" class="form-control">
            </div>
            
            
            <div class="col-md-4">
                <label for="position_designation" class="form-label">Position/ Designation</label>
                <input type="text" wire:model="position_designation" class="form-control">
            </div>
            
            
            <div class="col-md-4">
                <label for="estimated_annual_income" class="form-label">Estimated Annual Income/Remuneration</label>
                <input type="text" wire:model="estimated_annual_income" class="form-control">
            </div>
        </div>
        
        <div class="row mb-4">
           
            <div class="col-md-4">
                <label for="nature_of_occupation" class="form-label">Nature of Occupation/Business</label>
                <input type="text" wire:model="nature_of_occupation" class="form-control">
            </div>
            
            
            <div class="col-md-4">
                <label for="address_of_inst" class="form-label">Address of Inst.</label>
                <input type="text" wire:model="address_of_inst" class="form-control">
            </div>
        </div>
        
    
        <div class="row mb-4">
            <label class="form-label" for="projected_annual_transaction_amount">13. Projected Annual Transaction Amount in the Account</label>
            <input type="text" wire:model="projected_annual_transaction_amount" class="form-control">
        </div>
        <div class="row mb-4">
            <label class="form-label" for="permanent_account_number">14.Permanent Account Number(If Taken PAN No has to be Mentioned)</label>
            <input type="text" wire:model="permanent_account_number" class="form-control">
        </div>
       <div class="row mb-4">
            <label class="form-label">15. Other identification documents (Voter ID, Driving License, Birth Certificate, or Minor ID, Local Authority Certification):</label>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="number_other" class="form-label">Number</label>
                <input type="text" wire:model="number_other" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="issued_by_other" class="form-label">Issued By</label>
                <input type="text" wire:model="issued_by_other" class="form-control form-control">
            </div>
            <div class="col-md-4">
                <label for="issued_date_other" class="form-label">Issued Date</label>
                <input type="date" wire:model="issued_date_other" class="form-control form-control">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="expiry_date_other" class="form-label">Expiry Date</label>
                <input type="date" wire:model="expiry_date_other" class="form-control form-control">
            </div>
        </div> 
        <button type="submit" class="btn btn-primary" >Submit</button>
    </div>

        </form>
    </div>
    
    