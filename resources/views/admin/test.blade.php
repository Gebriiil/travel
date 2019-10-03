@extends('admin.main')

@section('style')

<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
<style type="text/css">
    

    .container {
  margin: 0 auto;
  padding: 0 20px;
  max-width: 900px;
  min-width: 300px;
}
.row {
  width:100%;
  overflow: none;
}
.column {
  float:left;
  width: 50%;
}
.connected-sortable {
  margin: 0 auto;
  list-style: none;
  width: 90%;
}

li.draggable-item {
  width: inherit;
  padding: 15px 20px;
  background-color: #f5f5f5;
  -webkit-transition: transform .25s ease-in-out;
  -moz-transition: transform .25s ease-in-out;
  -o-transition: transform .25s ease-in-out;
  transition: transform .25s ease-in-out;
  
  -webkit-transition: box-shadow .25s ease-in-out;
  -moz-transition: box-shadow .25s ease-in-out;
  -o-transition: box-shadow .25s ease-in-out;
  transition: box-shadow .25s ease-in-out;
  &:hover {
    cursor: pointer;
    background-color: #eaeaea;
  }
}
/* styles during drag */
li.draggable-item.ui-sortable-helper {
  background-color: #e5e5e5;
  -webkit-box-shadow: 0 0 8px rgba(53,41,41, .8);
  -moz-box-shadow: 0 0 8px rgba(53,41,41, .8);
  box-shadow: 0 0 8px rgba(53,41,41, .8);
  transform: scale(1.015);
  z-index: 100;
}
li.draggable-item.ui-sortable-placeholder {
  background-color: #ddd;
  -moz-box-shadow:    inset 0 0 10px #000000;
   -webkit-box-shadow: inset 0 0 10px #000000;
   box-shadow:         inset 0 0 10px #000000;
}






</style>

@endsection
@section('content')


<div class="container">
  <div class="row">
   
    <div class="column">
        <table class="table table-bordred  column ">
            <thead>
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                </tr>
            </thead>
            <tbody class="connected-sortable droppable-area1">
                <tr class="draggable-item">
                    <td> Item 1 </td>
                    <td> Item 1</td>
                    <td> Item 1 </td>
                </tr>


                <tr class="draggable-item">
                    <td> Item 2 </td>
                    <td> Item 2</td>
                    <td> Item 2 </td>
                </tr>


                <tr class="draggable-item">
                    <td> Item 3 </td>
                    <td> Item 3 </td>
                    <td> Item 3 </td>
                </tr>


                <tr class="draggable-item">
                    <td> Item 4 </td>
                    <td> Item 4</td>
                    <td> Item 4 </td>
                </tr>

                <tr class="draggable-item">
                    <td> Item 5 </td>
                    <td> Item 5 </td>
                    <td> Item 5 </td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="column">
      <ul class="connected-sortable droppable-area1">
        <li class="draggable-item">Item 1</li>
        <li class="draggable-item">Item 2</li>
        <li class="draggable-item">Item 3</li>
        <li class="draggable-item">Item 4</li>
        <li class="draggable-item">Item 5</li>
        <li class="draggable-item">Item 6</li>
        <li class="draggable-item">Item 7</li>
      </ul>
    </div>
    
    <div class="column">
      <ul class="connected-sortable droppable-area2">
        <li class="draggable-item">Item 8</li>
        <li class="draggable-item">Item 9</li>
        <li class="draggable-item">Item 10</li>
        <li class="draggable-item">Item 11</li>
        <li class="draggable-item">Item 12</li>
        <li class="draggable-item">Item 13</li>
        <li class="draggable-item">Item 14</li>
      </ul>
    </div>
  </div>
</div>


@endsection



@section('script')

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<script type="text/javascript">
    $( init );
    function init() 
    {
      $( ".droppable-area1, .droppable-area2" ).sortable({
          connectWith: ".connected-sortable",
          stack: '.connected-sortable ul'
        }).disableSelection();
    }
</script>

@endsection

