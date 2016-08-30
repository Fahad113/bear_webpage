@extends('layouts.app')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
<style>
        .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
            background-color: #ac2925;
          }  
    </style>

@section('content')
        <div class="alert alert-dismissible alert-danger">
            <div style=" float: left;width: 20%;"><h4>Insert New Record In Bear Table</h4> </div><button class="btn btn-danger glyphicon glyphicon-plus">Insert</button>
            
        </div>
<div class=" container">
  
            <table style="margin-top: 5%; " class="table table-hover" >
                        <tr>
                            <th >ID</th>
                            <th >Name</th>
                            <th >Type</th>
                            <th >	Danger_level</th>
                            <th>Edit / Delete</th>
                        </tr>
                    <?php foreach ($users as $user){?>
                        <tr>
                            <td><?php echo $user->id;?></td>
                            <td><?php echo $user->name; ?></td>
                            <td> <?php echo $user->type; ?></td>
                            <td> <?php echo $user->danger_level;  ?></td>
                            <td><button class="btn btn-danger glyphicon glyphicon-refresh">Edit</button> &nbsp;&nbsp;<button class="btn btn-danger glyphicon glyphicon-remove">Remove</button>

                        </tr>
                    <?php } ?>
                    
             </table>
    
</div>
@endsection
