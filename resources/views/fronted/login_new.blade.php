<!DOCTYPE html>
<html lang="en">

<head>
    <title>Legal Bench |Login</title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo URL::to('/'); ?>/fronted/images/favicon.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="{{asset('fronted/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fronted/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('fronted/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('fronted/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('fronted/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fronted/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('fronted/css/toastr.min.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
    .signin-section .col1 .mid{
        height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding-bottom: 30px;
    width: 450px;
    text-align: center;
    margin: auto;
    }
    .signin-section .col1 .mid .btn-gradient{
        margin-left: auto;
        margin-right: auto;
    }
    .sa-small-logocenter .sa-small-logo {
    height: 60px;
    object-fit: contain;
}

.sa-small-logocenter a {
    display: block;
}
.sa-small-logocenter {
    position: absolute;
    left: 0px;
    top: 20px;
    z-index: 9;
}
.iconn {
    height: 80px;
    width: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px;
    border-radius: 50%;
    background: linear-gradient(
90deg
, #caa973 0%, rgba(249, 181, 61, 0.29) 99.99%, rgba(250, 179, 52, 0) 100%, #FAB334 100%);
}
</style>
<body>
    <section class="signin-section">
        <div class="themis-figurine-stands">
            <img src="{{asset('fronted/images/themis-figurine-stands-white-wooden-table-stack-old-books-scales-law-lawyer-business-concept-image 1.png')}}" class="themis-figurine">
        </div>
        <div class="themis-figurine-stands2">
            <img src="{{asset('fronted/images/corporate-businessmen.jpg')}}" class="themis-figurine">
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="sa-small-logocenter">
                            <a href="<?php echo URL::to('/'); ?>/"><img src="{{asset('fronted/images/small-logo.png')}}" class="small-logo sa-small-logo"></a>
                        </div>
                <div class="col-md-6 col1">
                    <div class="mid">
                        <div class="iconn">
                            <img src="{{asset('fronted/images/law.png')}}">
                        </div>
                        <h3>Get your justice </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="{{URL::to('/')}}/lawyer/login" class="btn btn-gradient mt-2" style="max-width: 230px;">Sign In As Lawyer</a>
                    </div>
                   
                </div>
                <div class="col-md-6 col1">
                    <div class="mid">
                        <div class="iconn">
                            <img src="{{asset('fronted/images/user-icon.png')}}">
                        </div>
                        <h3>Get your justice </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="{{URL::to('/')}}/login" class="btn btn-gradient mt-2" style="max-width: 230px;">Sign In As User</a>
                    </div>
                  
                </div>
            </div>
        </div>
    </section>

</body>
<script src="{{asset('fronted/js/jquery.min.js')}}"></script>
<script src="{{asset('fronted/js/popper.min.js')}}"></script>
<script src="{{asset('fronted/js/bootstrap.min.js')}}"></script>
<script src="{{asset('fronted/js/select2.min.js')}}"></script>
<script src="{{asset('fronted/js/owl.carousel.js')}}"></script>
<script src="{{asset('fronted/js/custom.js')}}"></script>
<script src="{{asset('fronted/js/toastr.min.js')}}"></script>
<script>
    $(".select2").select2({
        minimumResultsForSearch: -1
    });
</script>
</script>
@if(Session::has('success'))
<script>
    toastr.success('<?php echo Session::get('success') ?>', '', {
        timeOut: 5000
    });
</script>
@endif

@if(Session::has('error'))
<script>
    toastr.error('<?php echo Session::get('error') ?>', '', {
        timeOut: 5000
    });
</script>
@endif


</html>