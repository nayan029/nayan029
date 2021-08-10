<?php if (isset($selectdata)) { ?>
    <!-- <h5 class="sa-color2 mb-4">Free test Legal Advice from Top Lawyers in India</h5> -->
<?php } else { ?>
    <!-- <h5 class="sa-color2 mb-4">Free Divorce Legal Advice from Top Lawyers in India</h5> -->

<?php  } ?>
<div class="row mt-2 " id="">
    <?php
    $c =  count($selectdata);
    if ($c > 0) {
        foreach ($selectdata as $value) {
    ?>
            <div class="col-md-12" id="">
                <div class="mitem3">
                    <div class="sr-card">
                        <a href="#">
                            <h5 class="sr-title2 d-flex align-items-center">
                                {{$value->question}}</h5>
                        </a>
                    </div>
                    <p class="mb-20"><?php echo $value->question_details; ?>
                    </p>
                    <div class="ml-auto">
                        <a href="<?php echo URL::to('/') ?>/legal-advice-details/{{$value->id}}" class="btn btn-outline-primary">Read More</a>
                    </div>
                </div>
            </div>
        <?php }
    } else {
        ?>
        <div class="col-md-12 ">
            <div class="mitem3">
                <div class="sr-card">
                    <a href="#">
                        <h5 class="sr-title2 d-flex align-items-center">
                            Custody of female child after another marriage of either of the partie</h5>
                    </a>
                </div>
                <p class="mb-20">I want to marry a person who is a mother of a girl child and got divorce from her previous marriage in the court on mutual terms. The girl child, who …
                </p>
                <div class="ml-auto">
                    <a href="#" class="btn btn-outline-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="mitem3 mb-3">
                <div class="sr-card">
                    <a href="#">
                        <h5 class="sr-title2 d-flex align-items-center">
                            Custody of female child after another marriage of either of the partie</h5>
                    </a>
                </div>
                <p class="mb-20">I want to marry a person who is a mother of a girl child and got divorce from her previous marriage in the court on mutual terms. The girl child, who …
                </p>
                <div class="ml-auto">
                    <a href="" class="btn btn-outline-primary">Read More</a>
                </div>
            </div>
        </div>
    <?php }  ?>