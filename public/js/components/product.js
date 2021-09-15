$("#gst,#price").blur(function(){

  var gst=$('#gst').val();

var price=$('#price').val();
var total_gst=price*gst/100;
$('#gst_calc').val(total_gst);
});

