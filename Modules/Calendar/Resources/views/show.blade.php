@extends('adminlte::page')
@section('content')
 @foreach($calendar_events as $calendar_event)
        <tr>
            <td><img src="{{asset('image/calendar/'.$calendar_event->image)}}"/></td>
            <td>{{ $calendar_event->id }}</td>
            <td>{{ $calendar_event->title }}</td>
            <td>{{ $calendar_event->start_date }}</td>
            <td>{{ $calendar_event->end_date }}</td>
            <td>{!! $calendar_event->description !!}</td>



            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a  class="btn btn-small btn-success" href="{{ URL::to('calendar/admin/calendar/') }}">BACK</a>
                <button id="addevent" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  +
</button>
                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
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
      <form method="post" action="{{route('events.update', ['id' => $calendar_event->id])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
            <input placeholder="{{ $calendar_event->title }}"type="text" class="form-control" name="title">
          </div>
        </div>
       
       
   
        <div class="row">
          <!-- <div class="col-md-4"></div> -->
          
          <div class="form-group col-md-12">
            <strong>Date Debut: </strong>  
        
            <input  placeholder="{{ $calendar_event->start_date }}" class="date form-control"  type="datetime-local" id="" name="start_date">   
            <strong>Date Fin : </strong>  
            
            <input placeholder="{{ $calendar_event->end_date }}"class="date form-control"  type="datetime-local" id="" name="end_date">   
         </div> 
        </div>
        <div class="row">
          <!-- <div class="col-md-4"></div> -->
          
          <div class="form-group col-md-12">
            <strong>categorie: </strong>  
        
            <select placeholder="{{ $calendar_event->categorie }}" name="categorie">
    <option value="coding">coding</option>
    <option value="hackathon">Hackathon</option>
    <option value="workshop">Workshop</option>
    <!-- <option value="audi">Audi TT</option> -->
  </select>
  <textarea placeholder="{{ $calendar_event->description }}" name="description" class="form-control" id="summarys-ckeditor"></textarea>
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

            </td>
        </tr>
        <script>
    CKEDITOR.replace( 'summarys-ckeditor' );
</script>
    @endforeach
@endsection