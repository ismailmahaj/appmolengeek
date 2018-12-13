@extends('adminlte::page')
@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{url('calendar/admin/calendar')}}" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="row">
          <!-- <div class="col-md-4"></div> -->
          <div class="form-group col-md-12">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" name="title">
          </div>
        </div>
       
       
   
        <div class="row">
          <!-- <div class="col-md-4"></div> -->
          
          <div class="form-group col-md-12">
            <strong>Date Debut: </strong>  
        
            <input class="date form-control"  type="datetime-local" id="" name="start_date">   
            <strong>Date Fin : </strong>  
            
            <input class="date form-control"  type="datetime-local" id="" name="end_date">   
         </div>
        </div>
        <div class="row">
          <!-- <div class="col-md-4"></div> -->
          
          <div class="form-group col-md-12">
            <strong>categorie: </strong>  
        
            <select name="categorie">
    <option value="coding">coding</option>
    <option value="hackathon">Hackathon</option>
    <option value="workshop">Workshop</option>
  </select> 
    <select name="etage">
    <option value="rezdechaussé">rez de chaussé</option>
    <option value="1eretage">1er etage</option>
    <option value="2emetage">2 eme etage</option>
  </select>
 
    <select name="salle">
    <option value="rezdechaussé">réunion</option>
  </select>


  <textarea  name="description" class="form-control" id="summary-ckeditor"></textarea>
  <input type="file" name="image" >
         </div>
        </div>
         
        <!-- <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div> -->
<!-- Fonts -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
   
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<div class="container" id="app">
<calendar-component> 
  
<vue-cal style="height: 250px;border: 1px solid #eee"></vue-cal>

</calendar-component>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Calendrier Molengeek</div>

<div class="panel-body">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<button id="addevent" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  +
</button>
<style>
    #addevent{
        background:#3c8dbc;
        color:white;
        width:70px;
        height:70px;
        border-radius:50%;
        border:none;
        font-size:2em;
        float:right !important;
        margin-right:80px;
    }
</style>
<div id="app">
</div>
        @yield('content')
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>

{!! $calendar->calendar() !!}
{!! $calendar->script() !!}
    @yield('script')
 

@endsection