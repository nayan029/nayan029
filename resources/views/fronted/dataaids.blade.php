<div class="col-md-12 ">
    <div class="row sr-border mt-4 ">
        @foreach($user_data as $data)
        <div class="col-md-12">
            <ul class="footer-ul sa-footer-mb">
                <li><a href="<?php echo URL::to('/'); ?>/legal-services/{{$data->slug}}"><i class="fa fa-arrow-right"></i> {{ucfirst($data->service_name)}}</a></li>

            </ul>
        </div>
        @endforeach
    </div>

</div>