@extends('layouts.app')

@section('content')
  <div class="col-md-8">
     
              <!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
    Users table
  </h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"
        ><a href="#!" class="text-success"
          ><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a
      ></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">S/N</th>
            <th class="text-center">user</th>
            <th class="text-center">class</th>
            <th class="text-center">section</th>
            <th class="text-center">Adm no</th>
            <th class="text-center">Parent</th>
            <th class="text-center">Dorm</th>
            <th class="text-center">Dorm Room</th>
            <th class="text-center">Session</th>
            <th class="text-center">House</th>
            <th class="text-center">Age</th>
            <th class="text-center">Year Admitted</th>
            <th class="text-center">Grade</th>
            <th class="text-center">Grade Date</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="pt-3-half" contenteditable="true">{{$studentrecord->id}}</td> 
            <td class="pt-3-half" contenteditable="true">{{$studentrecord->user->name}}</td>
            <td class="pt-3-half" contenteditable="true">{{$studentrecord->class->name}}</td>
            <td class="pt-3-half" contenteditable="true">{{$studentrecord->section->name}}</td>
            <td class="pt-3-half" contenteditable="true">{{$studentrecord->adm_no}}</td>
            <td class="pt-3-half" contenteditable="true">{{$studentrecord->parent->name}}</td> 
            <td class="pt-3-half" contenteditable="true">{{$studentrecord->dorm->name}}</td>
            <td class="pt-3-half" contenteditable="true">{{$studentrecord->dorm_room_no}}</td>
            <td class="pt-3-half" contenteditable="true">{{$studentrecord->session}}</td>   
            <td class="pt-3-half" contenteditable="true">{{$studentrecord->house}}</td>
            <td class="pt-3-half" contenteditable="true">{{$studentrecord->age}}</td>
            <td class="pt-3-half" contenteditable="true">{{$studentrecord->year_admitted}} </td>
            <td class="pt-3-half" contenteditable="true">{{$studentrecord->grad}}</td>
            <td class="pt-3-half" contenteditable="true">{{$studentrecord->grad_date}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Editable table -->
         
@endsection