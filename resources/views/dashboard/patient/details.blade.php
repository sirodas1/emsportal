@extends('layouts.app')

@section('title', 'EMS-Patients')
@section('page-back', route('home'))
@section('back-check', true)

@section('content')
<div class="col">
    <div class="row">
        <div class="col-md-8 my-2">
            <div class="card p-0 w-100">
                <div class="card-header bg-success text-light">Patient Profile</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <img src="{{$patient->profile_pic ?? asset('img/placeholders/profile.png')}}" class="img img-fluid rounded">
                        </div>
                        <div class="col-9">
                            <div class="row mb-4">
                                <div class="col">
                                    <span class="h5 text-secondary">National Card ID:</span>&emsp;
                                    <span class="h5 text-success">{{$patient->national_card_id}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="text-secondary">Name:</span>&emsp;
                                    <span class="text-success">{{$patient->lastname.' '.$patient->firstname. ' ' . ($patient->othernames ?? '')}}</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-secondary">Age:</span>&emsp;
                                    <span class="text-success">{{$patient->age}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="text-secondary">Phone No.:</span>&emsp;
                                    <span class="text-success">{{$patient->phone_number}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="text-secondary">Next of Kin:</span>&emsp;
                                    <span class="text-success">{{$patient->next_of_kin}}</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-secondary">Phone No.:</span>&emsp;
                                    <span class="text-success">{{$patient->nok_phone_number}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="col-md-4 my-2">
            <div class="card p-0 w-100">
                <div class="card-header bg-success text-light">Patient Allergies & Phobia</div>
                <div class="card-body">
                    <ul class="list-group text-success">
                        <li class="list-group-item py-1">Pollen <span class="text-secondary"> - Allergy</span></li>
                        <li class="list-group-item py-1">Acrophobia <span class="text-secondary"> - Phobia</span></li>
                        <li class="list-group-item py-1">Insect venom <span class="text-secondary"> - Allergy</span></li>
                        <li class="list-group-item py-1">Hemophobia <span class="text-secondary"> - Phobia</span></li>
                        <li class="list-group-item py-1">Milk <span class="text-secondary"> - Allergy</span></li>
                        <li class="list-group-item py-1">Hydrophobia <span class="text-secondary"> - Phobia</span></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div>
</div>
</div>
<div class="row justify-content-center mx-0 my-3 mb-5">
<div class="col-md-5 my-2">
    <div class="card p-0 w-100">
        <div class="card-header bg-success text-light">Patient Existing Conditions</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-sm  table-bordered">
                    <thead class="bg-success text-light">
                        <th scope="col" nowrap="nowrap">Diagnoses</th>
                        <th scope="col" nowrap="nowrap">Symptoms &emsp;&emsp;</th>
                        <th scope="col" nowrap="nowrap">Health Status</th>
                        <th scope="col" nowrap="nowrap">Date of Infection</th>
                    </thead>
                    <tbody>
                        <tr scope="row">
                            <td>Covid</td>
                            <td>Coughing, Tiredness, Headache</td>
                            <td>Diagnosed</td>
                            <td>03-09-2021</td>
                        </tr>
                        <tr scope="row">
                            <td>Aluminium Hydroxide</td>
                            <td>Coughing, Tiredness, Running stool</td>
                            <td>Cured</td>
                            <td>03-09-2021</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
</div>
<div class="col-md-5 my-2">
    <div class="card p-0 w-100">
        <div class="card-header bg-success text-light">Patient Medications</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-sm table-bordered">
                    <thead class="bg-success text-light">
                        <th scope="col" nowrap="nowrap">Drug</th>
                        <th scope="col" nowrap="nowrap">Dosage&emsp;&emsp;&emsp;</th>
                        <th scope="col" nowrap="nowrap">Consumption Status</th>
                        <th scope="col" nowrap="nowrap">Start Date</th>
                        <th scope="col" nowrap="nowrap">End Date</th>
                    </thead>
                    <tbody>
                        <tr scope="row">
                            <td>Paracetamol</td>
                            <td>3 Times a Day</td>
                            <td>In-Process</td>
                            <td>03-09-2021</td>
                            <td>18-09-2021</td>
                        </tr>
                        <tr scope="row">
                            <td>Aluminium Hydroxide</td>
                            <td>2 Times a Day</td>
                            <td>In-Process</td>
                            <td>03-09-2021</td>
                            <td>18-09-2021</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
</div>
@endsection