<!doctype html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 6000000,
      values: [ 0, 6000000 ],
      slide: function( event, ui ) {
        $( "#amount_start" ).val(  ui.values[ 0 ] );

        $( "#amount_end" ).val( ui.values[ 1 ] );
      }
    });
    // $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
    //   " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  } );
  </script>
</head>
<body>
 
<p>
  <label for="amount">Price range:</label>

  <div id="slider-range"></div>
  <br>
  <input size="3" type="text" id="amount_start" name="start_price" value="200000" >  <!-- //min price  -->
  <input size="3" type="text" id="amount_end" name="end_price" value="3500000">  <!-- // max price -->
</p>
 

 
<button onclick="send()">Click me</button>

 <div id="showDiv"><div id="showPrice"></div></div>
 <script>
   function send() {
    var start = $('#amount_start').val();
    var end  =  $('#amount_end').val();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
      type: 'get',
      url: '{{route("home.items","laptops")}}',
      data: "start="+start + "& end=" +end,
      success: function (response){
        $('#updateDiv').html(response);
      }
    });
  }
 </script>

</body>
</html>