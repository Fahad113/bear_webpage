@extends('layouts.app')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bear Record</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

    <style>
        .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
            background-color:#d4d4d4;
            
          }  
       #btn-rutate {
            display: block;
            margin: 20px;
          }

        #btn-rutate{
          transition-duration: 1s;
          transition-property: transform;
        }

        #btn-rutate:hover {

             transform: rotate(360deg);
        }
      
    </style>

@section('content')
        <div class=" container" >
            <button type="button" class="btn btn-danger btn-lg" data-toggle="modal"  style="background:linear-gradient(white,#ac2925);margin-top: -1%; float: right;" data-target="#myModal">Insert Bear Record</button>

             <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header" style=" background-color: #ac2925; color: white; font-size: 23px;  ">
                              <button type="button" class="close" data-dismiss="modal"><span class=" glyphicon glyphicon-remove"></span></button>
                          <h4 class="modal-title">Insert Bear Record</h4>
                        </div>
                          <div class="modal-body" style=" background-image: url(images/dd.jpg); backface-visibility: 20px;">
                              
                            {!! Form::Open(array ('url' => '/submit')) !!}
                            {{ Form::label('title','Name:')}}
                            {{ Form::text('name',null,array('class' => 'form-control'))}}
                            {{ Form::label('title','Type:')}}
                            {{ Form::text('type',null,array('class' => 'form-control'))}}
                            {{ Form::label('title','Danger Level:')}}
                            {{ Form::text('level',null,array('class' => 'form-control'))}}
                            <br>
                            {{ Form::submit('Submit Record',array('class' => 'btn btn-primary ')) }}
                            {!! Form::Close()!!}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                  </div>
            <div id="btn-rutate" style=" height: 309px; width: 276px; float: left; margin-left: -10%; background-image: url('images/bear.jpg'); margin-top: 12%;">
                
            </div>
            <div style=" height: 60%; width: 80%; float: right;">
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                     @endif
                    <table style="margin-top: 3%; " class="table table-hover" >
                                <tr>
                                    <th class=" col-sm-2">ID</th>
                                    <th class=" col-sm-3">name</th>
                                    <th class=" col-sm-2" >Type</th>
                                    <th class=" col-sm-2">Danger Level</th>
                                    <th class=" col-sm-3">Edit / Delete</th>
                                </tr>
                            <?php foreach ($bear as $user){?>
                                <tr id="show">
                                    <td><?php echo $user->id;?></td>
                                    <td><?php echo $user->name; ?></td>
                                    <td> <?php echo $user->type; ?></td>
                                    <td> <?php echo $user->danger_level;  ?></td>
                                    <td><button class="btn btn-success btn-ml glyphicon glyphicon-refresh"></button> &nbsp;&nbsp;<a href="<?php echo 'delete/'.$user->id;  ?>" class="btn btn-danger glyphicon glyphicon-remove" onclick="if(!confirm('Are you sure to delete this record?')){return false;};"></a>

                                </tr>
                            <?php } ?>
                                
                     </table>
                   
            </div>
               <div style=" float: right">{!! $bear->render() !!}</div>
         
          
        </div>
@endsection



