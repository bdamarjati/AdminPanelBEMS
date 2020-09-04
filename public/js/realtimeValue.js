$(document).ready(function() {
  var request = function() {
    var id = {!! auth()->user() !!};
    console.log(id);

    $.ajax({
      url: 'api/getData/'+id,
      success: function(data) {
        console.log(data);
        $data = data['temperature'];
        getDate();
        if(time>10)
        {
          $d = 0;
        }else{
          $d = parseFloat($data).toFixed(2);
        }
        if($d == 0)
        {
          $( "#temp-value" ).first().html( "<span id=temp-value> Waiting.. </span>" );
          $( ".card" ).css('background','white');
          $( ".card" ).css('color','black');
          $( ".card" ).css('-webkit-text-stroke-color','white');
        }
        else if($d > 37.5)
        {
          $( "#guts" ).data( "temp", { first : $d } );
          $( "#temp-value" ).first().html( "<span id=temp-value style='color: white; -webkit-text-stroke-color: black;'>" + $( "#guts" ).data( "temp" ).first + "° </span><br> <span>Celcius</span>" );
          $( ".card" ).css('background','#670101');
          $( ".card" ).css('color','black');
          $( ".card" ).css('-webkit-text-stroke-color','white');
        }else{
          $( "#guts" ).data( "temp", { first : $d } );
          $( "#temp-value" ).first().html( "<span id=temp-value style='color: white; -webkit-text-stroke-color: black'>" +  $( "#guts" ).data( "temp" ).first + "° </span><br> <span>Celcius</span>" );
          $( ".card" ).css('background','#2eab2e');
          $( ".card" ).css('color','white');
          $( ".card" ).css('-webkit-text-stroke-color','black');
        }
      },
    });
  };
  setInterval(request, 1000);
});


function getDate(){
  $.ajax({
    url: 'api/getDate',
    method: 'get',
    async: false,
    success: function(data) {
      time = data;
    },
  });
}
