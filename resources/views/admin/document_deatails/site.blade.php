@include('fronted/include/header')
<div class="header-title">
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
@include('fronted/include/footer')