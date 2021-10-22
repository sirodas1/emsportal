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
                        @if ($patient->allergies->isNotEmpty())
                            @foreach ($patient->allergies as $allergy)
                            <li class="list-group-item py-1">{{$allergy->name}} <span class="text-secondary"> - {{$allergy->type}}</span></li>
                            @endforeach
                        @else
                            <li class="list-group-item py-1 border-outline-secondary text-secondary">No Existing Allergies or Phobia.</li>
                        @endif
                    </ul>
                </div>  
            </div>
        </div>
    </div>
    <div class="row my-3 mb-5">
        <div class="col-md-10 my-2">
            <div class="card p-0 w-100">
                <div class="card-header bg-success text-light">Patient's Hospitals</div>
                <div class="card-body">
                    @if ($patient->folders->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-sm">
                                <thead class="bg-success text-light">
                                    <th>Hospital Name</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($patient->folders as $folder)
                                    @if ($folder->locked)
                                        <tr class="cursor-pointer my-1">
                                        <td>{{$folder->hospital->name}} @if($folder->locked) - <span class="text-danger">LOCKED</span> @endif</td>
                                        <td class="py-0">
                                            <div class="row justify-content-end mr-2 my-1">
                                            <form id="form-{{$folder->id}}" action="{{route('patients.open-locked-folder', ['id' => $folder->id])}}" method="post">
                                                @csrf
                                                <div class="input-group">
                                                <input type="text" class="form-control my-0" pattern="[0-9]{4}" placeholder="Eg. 1234" name="pin" title="Pin Must Be Numeric">
                                                <button class="btn btn-outline-danger" type="submit" form="form-{{$folder->id}}"><i class="far fa-folder-open"></i></button>
                                                </div>
                                            </form>
                                            </div>
                                        </td>
                                        </tr> 
                                    @else
                                        <tr class="cursor-pointer my-1">
                                        <td>{{$folder->hospital->name}}</td>
                                        <td><a href="{{route('patients.folder', ['id' => $folder->id])}}" class="fa fa-folder-open"></a></td>
                                        </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="row justify-content-center my-5">
                            <span class="text-secondary h5">No Hospitals Have Any Folders on you.</span>
                        </div>
                    @endif
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection