@include('fronted/include/header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="header-title">
  <div class="inner">
    <div class="container">

      <div class="sa-application" style="
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    align-items: center;">
        <h2 class="sa-color1">{{$dataLegalQuery->title}}</h2>
        <a download="{{$dataLegalQuery->document}}" class="btn btn-primary" target="_blank" href="{{URL::to('/')}}/uploads/document/{{$dataLegalQuery->document}}"><i class="fas fa-download"></i> Download</a>

      </div>

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
            <div class="hindum-arriage-act">
              <!-- <i class="fa fa-arrow-right"></i> -->
              <div class="ck-txt">{!!$dataLegalQuery->description!!}</div>
              <!-- <a download="{{$dataLegalQuery->document}}" target="_blank" href="{{URL::to('/')}}/uploads/document/{{$dataLegalQuery->document}}"><i class="fas fa-download"></i></a> -->
            </div>

          </div>
        </div>

      </div>

    </div>


  </div>
</div>

@include('fronted/include/footer')