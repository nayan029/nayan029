<!-- <div class="container">
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
          
            <tr>
        </tbody>
    </table>
</div> -->
<!DOCTYPE html>
<html lang="en">

<head>
	<title>{{$sitesetting->title}} | {{$title}}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{URL::to('/')}}/uploads/logo/{{$sitesetting->logo}}" type="image/png" sizes="16x16">
	<link rel="stylesheet" href="{{asset('fronted/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('fronted/css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('fronted/css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('fronted/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('fronted/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('fronted/css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('fronted/css/toastr.min.css')}}" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<header>
		<div class="container">
        </div>
</header>
<div class="mt-5 header-title">
  <div class="inner">
    <div class="container">
      <div class="sa-application">
       
        <div class="row">
          <div class="col-md-9">
            <h2 class="sa-color1 d-flex justify-content-between">   
             @if(isset($allContent->title))  
             {{$allContent->title}}
             @endif
            </h2>

            <p class="fs-20 pt-3 pb-0 mb-0"></p>
          </div>
          
      </div>
    </div>
  </div>
</div>


<div class="sa-enroll-details" id="databox">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row sr-border2 sr-res-card mb-5">
          <div class="col-md-12 mt-1">
            <div class="">
              <p class="ls-1"></p>

            </div>
            @if(isset($allContent->image))  
             <img class="d-flex justify-content-center" src="{{URL::to('/')}}/uploads/document_image/{{$allContent->image}}" alt="image" height="50%" width="50%"> 
             @endif
             
             @if(isset($allContent->description))  
             {!!$allContent->description  !!}
             @endif

            <div class="mb-4 sr-l-space">
              <div class="row">
                <div class="col-md-6 mb-3">

                </div>
                <div class="col-md-6 mb-3">

                </div>
                <div class="col-md-6 mb-3">

                </div>
                <div class="col-md-6 mb-3">

                </div>


              </div>

            </div>



          </div>
        </div>

      </div>
     

      <div class="row mb-5">
        <div class="col-md-12">
          <div>
          </div>
         
        </div>
      </div>
    </div>
  </div>