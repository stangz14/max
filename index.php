<?php 
    session_status();
?>
<?php 
  echo "<link rel='stylesheet' type='text/css' href='index.css' />"; 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page title</title>
    <link rel="stylesheet" href="./index.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Taviraj:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="webname-box">
            <a class="webname" >webname</a>
        </div>
    </nav>
    <div class="name-box">
        <div class="name-user-box">
            <p class="name-user">Mr.saharat wichian</p>
            </div>
        <div class="name-img-box">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS01vgSHSUj4NIe0kMb19xGqbwPD91FHvFq6g&usqp=CAU" alt="img" class="img-profile">
         </div>
    </div>
    <div class="middle">
        <div class="user-text">
        <p style="font-size: 32px; margin-bottom: 5px;">ประวัติส่วนตัว</p>
            <ul>
                <li>
                    <P class="user-type">อายุ</P> <p>16 ปี</p>
                </li>
                <li>
                    <P class="user-type">เพศ</P> <p>ชาย</p>
                </li>
                <li>
                    <P class="user-type">กรุ๊ปเลือด</P> <p>B</p>
                </li>
                <li>
                    <P class="user-type">เลขบัตรประชาชน</P> <p>195980021213</p>
                </li>
                <li>
                    <P class="user-type">โรคประจำตัว</P> <p>ไม่มี</p>
                </li>
                <li>
                    <P class="user-type">ยาที่แพ้</P> <p>ไม่มี</p>
                </li>
                <li>
                    <P class="user-type">ที่อยู๋</P> <p>14 หมู๋6 ตำบลตาเนาะแมเราะ อำเภอเบตง</p>
                </li>
                <li>
                    <P class="user-type">เบอร์ติดต่อฉุกเฉิน</P> <p>0612630515</p>
                </li>

            </ul>
        </div>
        <div class="call-cen">
            <div class="call-text">
                <p>หากต้องการแจ้งกู้ภัย </p>
            </div>
            <div class="buton-p">
                <form action="sendinfo.php" method="POST">
                    <?php if (isset($_SESSION['success'])) { ?>
                            <div>
                                <?php 
                                echo $_SESSION['success']; 
                                unset($_SESSION['success']);
                                ?>
                            </div>
                    <?php } ?>
                    
                    <button class="button-call" type="submit" name="submit" onclick="getPreciseLocation()" >Click Me!</button>
                </form>
            </div>
        </div>
    </div>
    <script>
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
        //    sendla(position);
           sendlo(position);
           
       }
       function sendlo(position){
            var nn ="https://www.google.co.th/maps/place/"+ position.coords.latitude + ","  + position.coords.longitude ;
                $.ajax({
                            url: "sendinfo.php?longitude="+nn,type: 'get',
                            success: function (data) {
                                alert(data);
                            // success
                            }

                            });
        }
        // function sendla(position){
        //     var na = position.coords.latitude;
        //         $.ajax({
        //                     url: "sendinfo.php?latitude="+na,type: 'get',
        //                     success: function (data) {
        //                         alert(data);
        //                     // success
        //                     }

        //                     });
        // }
    //    window.location.href = "sendinfo.php?latitude=" + position.coords.latitude;
       </script>
<!--  window.location.href="sendinfo.php?gps=" +position; -->
<style>
    *{
    margin: 0px;
    font-family: 'Taviraj', serif;
}

nav{
    background: #63B6FF;
    height: 48px;
    display: flex;
    align-items: center;
}
    
.webname-box{
    margin-left: 1rem;
    display: flex;
    align-items: center;
    
}
.webname{
    font-size: 24px;
}

.name-box{
    /* background-color: aqua; */
    margin-top:0.5rem;
    margin-right: 3.5rem;
    margin-left: 3.5rem;
    display: flex;
    justify-content: space-between;
}
.name-user-box{
    margin-top: 1rem;
}
.name-user{
    font-size: 32px;
}

.name-img-box{
    margin-right: 6rem;
}
.img-profile{
    height: 160px;
    width: 160px;
    border-radius: 16px;
}
.middle{
    /* background-color: aqua; */
    margin: 1rem 3.5rem;
    display: flex;
    justify-content: space-between;
    height: 48vh;
}

.user-text{
    width: 70%;
    font-size: 16px;
    /* background-color: antiquewhite; */
}

.call-cen{
    display: grid;
    margin: 0px auto;


}
.call-text{
    display: flex;
    align-items: flex-end;
    margin: 0px auto;
    font-size: x-large;
}

.buton-p{
    display: flex;
    align-items: end;
}

.button-call{
    margin: 0px auto;
    border: none;
    padding: 5px 10px;
    background-color: #FFEF5B; /* Green */
    font-size: 36px;
    border-radius: 5px;
    bottom: 0%;
    cursor: pointer;
}

/* .button-call:hover{
    background-color: black;
} */


li{
    margin-bottom: 5px;
    display: flex;
}


.user-type{
    margin-right: 5px;
}
</style>
</body>
</html>
