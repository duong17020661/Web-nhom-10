<?php session_start(); ?>
<!DOCTYPE html>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'q_a');
$id = mysqli_real_escape_string($conn, $_GET['id']);
?>
<html>

<head>
    <title>Phiếu khảo sát</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .card .row {
            margin-top: 10px;
            margin-left: 10px;
            margin-bottom: 10px;
        }

        .card .row .card-body-right .card-title {
            color: #ff0000;
            font-weight: bold;
        }

        .card-header,
        .card-header .selectpicker {
            background: linear-gradient(#99ccff, #b3ffff);
        }

        /**/
        .card-header .selectpicker {
            font-weight: bold;
        }

        .card-header .selectpicker option {
            font-weight: bold;
        }

        .card-header .selectpicker {
            width: 250px;
            height: 35px;

        }

        /*khung tìm kiếm*/
        .has-search .form-control {
            padding-left: 2.375rem;
            width: 250px;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }

        /*màu nền của card-body của phần danh sách câu hỏi*/
        #question #question-body {
            background-color: #f2f2f2;
        }

        /**/
        .list-question .title {
            font-weight: bold;
            color: #ff0000;
        }

        .list-question {
            font-size: 12px;
        }

        .list-question #question-item {
            max-height: 100px;
        }

        /*nút tạo câu hỏi*/
        #taocauhoi {
            border-radius: 4px;
            background-color: #4d79ff;

            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="shadow p-3 mb-5 bg-white rounded" style="margin-bottom:70px;">
            <!-- Main -->
            <!--Phần danh sách câu hỏi-->
            <div class="card" id="question">
                <!--phần head-->
                <nav class="navbar" style="background-color:#00ffff">
                    <div>
                        <h4 class="my-0 mr-md-auto font-weight-normal">Tạo phiếu khảo sát</h4>
                    </div>
                </nav>
                <!--phần body-->
                <div class="card-body" id="question-body" style="background-color: #f2f2f2;">
                    <div class="row justify-content-between">
                        <div>
                            <div style="float:left">
                                <!-- <button id="taocauhoi" class="btn btn-primary" data-toggle="modal"
                                    data-target="#myModal1">Câu hỏi trắc nhiệm</button>
                                <button id="taocauhoi" class="btn btn-primary" data-toggle="modal"
                                    data-target="#myModal2">Câu hỏi đúng sai</button>
                                <button id="taocauhoi" class="btn btn-primary" data-toggle="modal"
                                    data-target="#myModal3">Câu hỏi nhiều đáp án</button> 
								
                                <input type="number" class="form-control" placeholder="Số câu hỏi"
                                onblur="checknumber(this);socauhoi(this);"><br>-->

                                <form method="post" action="xuly_khaosat.php">
                                    <h1>Chủ đề khảo sát</h1>
                                    <input type='text' class='form-control' name='survey' placeholder='Chủ đề'>
                                    <h3>Câu hỏi thường</h3>
                                    <div class="cauhoi"></div>
                                    <div class="cauhoi"></div>
                                    <div class="cauhoi"></div>
                                    <div class="cauhoi"></div>
                                    <div class="cauhoi"></div>

                                    <a href=# onclick="add()">Thêm câu hỏi</a>
                                    <h3>Câu hỏi nhiều đáp án</h3>
                                    <div class="cauhoi_cb"></div>
                                    <div class="cauhoi_cb"></div>
                                    <div class="cauhoi_cb"></div>
                                    <div class="cauhoi_cb"></div>
                                    <div class="cauhoi_cb"></div>

                                    <a href=# onclick="add_cb()"/>Thêm câu hỏi</a>

                                    <h3 id="a">Câu hỏi một đáp án</h3>
                                    <div class="cauhoi_rb"></div>
                                    <div class="cauhoi_rb"></div>
                                    <div class="cauhoi_rb"></div>
                                    <div class="cauhoi_rb"></div>
                                    <div class="cauhoi_rb"></div>

                                    <a href=#a onclick="add_rb()"/>Thêm câu hỏi</a>
                                    <br><br><br>
                                    <input type="submit" onclick="location.href='Phieukhaosat.php';" name="submit " class="btn btn-primary btn-lg" value="Hoàn thành"/>
                                </form>
                                    

                                

                                <!-- <div class="modal fade" id="myModal1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Câu hỏi trắc nhiệm</h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <textarea class="form-control" rows="5"
                                                    placeholder="Viết câu hỏi"></textarea><br>
                                                <input type="text" class="form-control" placeholder="Số đáp án"
                                                    style="width: 25%" onchange="checknumber(this);sodapan(this);"><br>
                                                <div id="dapan1"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary btn-lg"
                                                    data-dismiss="modal">Xong</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="modal fade" id="myModal2">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Câu hỏi đúng sai</h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <textarea class="form-control" rows="5"
                                                    placeholder="Viết câu hỏi"></textarea><br>
                                                <input type="radio" name="check" value="dung"> Đúng &nbsp&nbsp&nbsp&nbsp
                                                <input type="radio" name="check" value="sai"> Sai
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary btn-lg"
                                                    data-dismiss="modal">Xong</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <!-- Footer -->
                <a href="Trangchu.html#menu" style="border-radius: 75%;position:fixed;right:10%"><img src="btt.png"
                    height="40px" width="auto" /></a>
                    <footer class="pt-4 my-md-5 pt-md-5 border-top">
                        <div class="row">
                            <div class="col-12 col-md">
                                <img class="mb-2" src="footer.png" alt="" width="24" height="24">
                                <small class="d-block mb-3 text-muted">&copy; 2017-2019</small>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    </body>
    <script type="text/javascript">
        function go(){
            location.href="Phieukhaosat.php";
        }
     var j=0;
     /* ----------------Normal-------------*/
     function add(){
      var cauhoi = "<input type='text' name=cauhoi_n[] class='form-control' placeholder='Viết câu hỏi'><br>";
      var x = document.getElementsByClassName("cauhoi");
      x[j].innerHTML = cauhoi;
      j++;
  }
  /* ----------------Check box-------------*/
  var k=0;
  function add_cb(){
    if(k==0){
      var cauhoi = "<input type='text' class='form-control' name='cauhoi_cb0' placeholder='Viết câu hỏi'><br><div class='dapan_cb0'></div><div class='dapan_cb0'></div><div class='dapan_cb0'></div><div class='dapan_cb0'></div><a href=# onclick='add_dapan_cb0()'>Thêm đáp án</a>";
      var y = document.getElementsByClassName("cauhoi_cb");
      y[k].innerHTML = cauhoi;
      k++;
  }
  else if(k==1){
    var cauhoi = "<input type='text' class='form-control' name='cauhoi_cb1' placeholder='Viết câu hỏi'><br><div class='dapan_cb1'></div><div class='dapan_cb1'></div><div class='dapan_cb1'></div><div class='dapan_cb1'></div><a href=# onclick='add_dapan_cb1()'>Thêm đáp án</a>";
    var y = document.getElementsByClassName("cauhoi_cb");
    y[k].innerHTML = cauhoi;
    k++;
}
else if(k==2){
    var cauhoi = "<input type='text' class='form-control' name='cauhoi_cb2' placeholder='Viết câu hỏi'><br><div class='dapan_cb2'></div><div class='dapan_cb2'></div><div class='dapan_cb2'></div><div class='dapan_cb2'></div><a href=# onclick='add_dapan_cb2()'>Thêm đáp án</a>";
    var y = document.getElementsByClassName("cauhoi_cb");
    y[k].innerHTML = cauhoi;
    k++;
}

}
var k_cb0=0;
function add_dapan_cb0(){
  var dapan = "<input type='text' class='form-control' width='20%' name='dapan_cb0[]' placeholder='Đáp án'>";
  var y_cb = document.getElementsByClassName("dapan_cb0");
  y_cb[k_cb0].innerHTML = dapan;
  k_cb0++;
}
var k_cb1=0;
function add_dapan_cb1(){
    var dapan = "<input type='text' class='form-control' width='20%' name='dapan_cb1[]' placeholder='Đáp án'>";
    var y_cb = document.getElementsByClassName("dapan_cb1");
    y_cb[k_cb1].innerHTML = dapan;
    k_cb1++;
}
var k_cb2=0;
function add_dapan_cb2(){
    var dapan = "<input type='text' class='form-control' width='20%' name='dapan_cb2[]' placeholder='Đáp án'>";
    var y_cb = document.getElementsByClassName("dapan_cb2");
    y_cb[k_cb2].innerHTML = dapan;
    k_cb2++;
}
/* ----------------Radio box-------------*/
var l=0;
  function add_rb(){
    if(l==0){
      var cauhoi = "<input type='text' class='form-control' name='cauhoi_rb0' placeholder='Viết câu hỏi'><br><div class='dapan_rb0'></div><div class='dapan_rb0'></div><div class='dapan_rb0'></div><div class='dapan_rb0'></div><a href=#a onclick='add_dapan_rb0()'>Thêm đáp án</a>";
      var z = document.getElementsByClassName("cauhoi_rb");
      z[l].innerHTML = cauhoi;
      l++;
  }
  else if(l==1){
    var cauhoi = "<input type='text' class='form-control' name='cauhoi_rb1' placeholder='Viết câu hỏi'><br><div class='dapan_rb1'></div><div class='dapan_rb1'></div><div class='dapan_rb1'></div><div class='dapan_rb1'></div><a href=#a onclick='add_dapan_rb1()'>Thêm đáp án</a>";
    var z = document.getElementsByClassName("cauhoi_rb");
    z[l].innerHTML = cauhoi;
    l++;
}
else if(l==2){
    var cauhoi = "<input type='text' class='form-control' name='cauhoi_rb2' placeholder='Viết câu hỏi'><br><div class='dapan_rb2'></div><div class='dapan_rb2'></div><div class='dapan_rb2'></div><div class='dapan_rb2'></div><a href=#a onclick='add_dapan_rb2()'>Thêm đáp án</a>";
    var z = document.getElementsByClassName("cauhoi_rb");
    z[l].innerHTML = cauhoi;
    l++;
}

}
var l_rb0=0;
function add_dapan_rb0(){
  var dapan = "<input type='text' class='form-control' width='20%' name='dapan_rb0[]' placeholder='Đáp án'>";
  var z_rb = document.getElementsByClassName("dapan_rb0");
  z_rb[l_rb0].innerHTML = dapan;
  l_rb0++;
}
var l_rb1=0;
function add_dapan_rb1(){
  var dapan = "<input type='text' class='form-control' width='20%' name='dapan_rb1[]' placeholder='Đáp án'>";
  var z_rb = document.getElementsByClassName("dapan_rb1");
  z_rb[l_rb1].innerHTML = dapan;
  l_rb1++;
}
var l_rb2=0;
function add_dapan_rb2(){
  var dapan = "<input type='text' class='form-control' width='20%' name='dapan_rb2[]' placeholder='Đáp án'>";
  var z_rb = document.getElementsByClassName("dapan_rb2");
  z_rb[l_rb2].innerHTML = dapan;
  l_rb2++;
}

/*-----END-----*/

function checknumber(inp) {
    if (inp.value == "") inp.value = 1;
    if (inp.value > 10) {
        alert("Số đáp án tối đa là 10");
        inp.value = 10;
    }
}
function sodapan(sodapan) {
    var i = 0;
    var num = sodapan.value;
    var dapan = "<input type='text' class='form-control' style='width:75%' placeholder='Đáp án'/><br>";
    var code = "";
    for (i = 0; i < num; i++) {
        code += (dapan);
    }
    document.getElementById("dapan<?php echo i?>").innerHTML = code;
}
function socauhoi(socauhoi) {
    var i = 1;
    var num = socauhoi.value;
    var cauhoi = "</label><textarea class='form-control' rows='5' cols='80' placeholder='Viết câu hỏi'></textarea><br>";
    var socau = "<label>Câu hỏi số </label>"
    var sodapan ="<input type='number' class='form-control' placeholder='Số đáp án' style='width: 25%'' onchange='checknumber(this);sodapan(this);'><br> <div id='dapan<?php echo i ?>'></div>";
    var submit ="<button type='button' class='btn btn-primary btn-lg'>Hoàn thành</button>";
    var code = "";
    for (i = 1; i <= num; i++) {

        code += (socau+" "+i+cauhoi+sodapan);
    }
    document.getElementById("cauhoi").innerHTML = code+submit;
}
</script>

</html>
