
 <?php include "./assets/inc/functions.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/dist/css/login.css">
</head>
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class= " login login_form"> 
                    <h4 style="text-align: center;"><?php echo getSetting();?></h4>
                    <div class="login__field">
                        <input type="hidden" name="action" value="login">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" name="email" class="login__input" placeholder="User name / Email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" name="password" class="login__input" placeholder="Password">
                    </div>
                    <button class="button login__submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>
                <div class="social-login">
          
                    <div class="social-icons">
                        <a href="#" class="social-login__icon fab fa-instagram"></a>
                        <a href="#" class="social-login__icon fab fa-facebook"></a>
                        <a href="#" class="social-login__icon fab fa-twitter"></a>
                    </div>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script>
        // swal ( "Oops" ,  "Something went wrong!" ,  "error" )
        $(document).ready(function(){
            $(".login_form").submit(function(e){
                e.preventDefault()
                var d = $(this ).serialize()
                // console.log(d)
                $.ajax({
                    url:"<?php echo baseUrl('admin_ajax.php')?>",
                    type:"POST",
                    data:d,
                    success:function(result, status, xhr){

                        result= JSON.parse(result);
                        if(result.status===404){
                               to
                                swal ( `${result.status}` ,  `${result.msg}` ,  "error" )
                        }
                        if(result.status===200){
                                swal ( `${result.msg}` ,  `${result.user.toUpperCase()}` ,  "success" )
                                window.location.href="<?php echo baseUrl('dashboard.php')?>"
                        }
                    }
                })
            })
        })
     </script>
</body>
</html>