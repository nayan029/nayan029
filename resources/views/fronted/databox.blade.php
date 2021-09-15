<div class="sa-enroll-details">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row sr-border2 sr-res-card mb-5">
          <div class="col-md-12 mt-1">
            <div class="">
              <p class="ls-1"></p>
              @if(isset($user_data) && $user_data!=='NULL')
              @foreach($user_data as $data)
              <a href="{{ URL::to('legal-enquiry') }}/{{ $data->id }}"><i class="fa fa-arrow-right"></i> {{ $data->description }}</a> <br />
              @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>