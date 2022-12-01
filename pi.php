<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">

getPreciseLocation()


function getPreciseLocation(){
           if(navigator.geolocation){
               navigator.geolocation.getCurrentPosition(showExactPosition)
           }else{
               x.innerHTML = "Geolocation is not supported"
           }
           
        }
        function showExactPosition(position){
            console.log("Latitude: "+position.coords.latitude+
           " br Longitude: "+position.coords.longitude);
        //    writeln(position.coords.latitude);
           send(position)
           
       }
       function send(position){
            var nn = position.coords.longitude;
                $.ajax({
                            url: "url2.php?value="+nn,type: 'get',
                            // success: function (data) {
                            //     alert(data);
                            // // success
                            // }

                            });
        }



// var nn = parseInt(position);
//                 $.ajax({
//                             url: "sendinfo.php?value="+nn,type: 'get',
//                             success: function (data) {
//                                 alert(data);
//                             // success
//                             }

//                             });
</script>


<?PHP
$test = $_GET['value'];
echo $test;

?>