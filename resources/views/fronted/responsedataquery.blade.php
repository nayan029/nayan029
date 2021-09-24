
    @foreach ($user_data as $data)
    <div class="col-md-12">
        <ul class="footer-ul sa-footer-mb">
            <li><a href="<?php echo URL::to('/legalQueryDesc'); ?>?id=<?= $data->id ?>"><i class="fa fa-arrow-right"></i> {{ucfirst($data->title)}}</a></li>

        </ul>
    </div>
    @endforeach
    