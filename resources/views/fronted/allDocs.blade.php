@include('fronted/include/header')
<div class="sa-enroll-details">
    <div class="container">

        <div class="sa-application">
            <div class=" d-flex align-items-center res-search-md justify-content-between">
            <h3 class="sa-color2 mb-4">Free Legal {{"Documentation"}} From Top Rated Lawyers</h3>
                <form method="GET">
                    <div class="filter-group mutual-sa-search d-flex">
                        <input type="text" name="name" id="name_input">

                        <button type="button" onclick="getData(this)" class="btn btn-outline-search ml-1"><img src="https://appworkdemo.com/legalbench/public/fronted/images/svg/feather_search-active.svg " class=""></button>
                    </div>
                </form>
            </div>
        </div>


        <div class="row" id="databox">
            <div class="col-md-12 ">
                <div class="row">

                    <div class="col-md-7 ">


                    </div>

                </div>
                <div class="row sr-border mt-4 " >
                    <?php foreach ($advicecategory as $data) {
                    ?>
                        <div class="col-md-12">
                            <ul class="footer-ul sa-footer-mb">
                                <li><a href="{{URL::to('/') }}/legal-services/documents/{{$data->slug}}"><i class="fa fa-arrow-right"></i> {{ucfirst($data->service_name)}}</a></li>
                            </ul>
                        </div>
                    <?php } ?>
                    <div class="col-md-6">
                        <ul class="footer-ul sa-footer-mb">

                        </ul>
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
    <script>
        function getData(val) {
            var inputname = $('#name_input').val();
            $.ajax({
                url: "{{ URL::to('/')}}/find-docs",
                type: "post",
                data: {
                    inputname: inputname,
                    _token: "<?php echo csrf_token(); ?>"
                },
                success: function(response) {
                    if (response !== '') {
                        var res = JSON.toString(response);
                        $('#databox').html(response);
                    } else {
                        location.reload();
                    }
                }
            });

        }
    </script>
    @include('fronted/include/footer')