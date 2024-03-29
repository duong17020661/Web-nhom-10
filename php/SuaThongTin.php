<!DOCTYPE html>
<html>

<head>
    <title>Sửa thông tin</title>
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
    <div class="container" id="myForm">
        <!--Phần danh sách câu hỏi-->
        <div class="card">
            <!--phần head-->
            <nav class="navbar" style="background-color:#00ffff">
                <div style="float: left">
                    <h4 class="my-0 mr-md-auto font-weight-normal">Cập nhật thông tin cá nhân</h4>
                </div>
                <div style="float: right">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
            </nav>
            <!--phần body-->
            <div class="card-body" id="question-body" style="background-color: #f2f2f2">
                <form>
                    <div class="form-group row">
                      <label for="staticUser" class="col-sm-3 col-form-label">Tên đăng nhập</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="17020663">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputhoten" class="col-sm-3 col-form-label">Họ và tên</label>
                        <div class="col-sm-9">
                          <input type="hoten" class="form-control" id="inputhoten" placeholder="Mai Thế Đại">
                        </div>
                      </div>
                    <div class="form-group row">
                      <label for="inputemail" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputemail" placeholder="daibengi19@gmail.com">
                      </div>
                    </div>
                  </form>
                <button type="button" onclick="capnhat()" class="btn btn-primary btn-lg" style="margin-left:81%">Cập nhật</button>
            </div>
        </div>
    </div>
    <script>
        function capnhat() {
            document.getElementById("myForm").style.display = "block";
        }
    </script>
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

</html>