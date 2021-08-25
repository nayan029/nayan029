@include('fronted/include/header')

<div class="header-title">
  <div class="inner">
    <div class="container">
      <div class="sa-application">
            <h2 class="sa-color1">{{$dataLegalQuery->title}}</h2>

      </div>
    </div>
  </div>
</div>


<div class="sa-enroll-details">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ">
        <div class="row sr-border2 sr-res-card">
          <div class="col-md-12 mt-1">
            <div class="">
              <p class="ls-1"><h2>Description</h2>

<p>{{strip_tags($dataLegalQuery->description)}}</p>

            </div>





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
      
    </div>


  </div>
</div>

@include('fronted/include/footer')