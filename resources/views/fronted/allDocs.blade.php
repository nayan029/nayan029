@include('fronted/include/header')
<div class="sa-enroll-details">
    <div class="container">

        <div class="sa-application">
            <div class=" d-flex align-items-center res-search-md justify-content-between">
                <h3 class="sa-color2 mb-4">Free Legal {{"Documentation"}} From Top Rated Lawyers</h3>
                <form method="GET">
                    <div class="filter-group mutual-sa-search d-flex">
                        <input placeholder="Search" type="text" name="name" id="search" autocomplete="off">

                        <button type="button" class="btn btn-outline-search ml-1"><img src="https://appworkdemo.com/legalbench/public/fronted/images/svg/feather_search-active.svg " class=""></button>
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
                <div class="row sr-border mt-4 ">
                    @php $i= 1; @endphp

                    @foreach ($advicecategory as $data)
                    <div class="col-md-12">
                        <ul class="footer-ul sa-footer-mb">
                            <li><a href="{{URL::to('/') }}/legal-services/documents/{{$data->slug}}">{{$i."."}} {{ucfirst($data->service_name)}}</a></li>
                        </ul>
                    </div>
                    @php $i++; @endphp

                    @endforeach
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
    @include('fronted/include/footer')

    <script>
        // function getData(val) {
        //     var inputname = $('#name_input').val();
        //     $.ajax({
        //         url: "{{ URL::to('/')}}/find-docs",
        //         type: "post",
        //         data: {
        //             inputname: inputname,
        //             _token: "<?php echo csrf_token(); ?>"
        //         },
        //         success: function(response) {
        //             if (response !== '') {
        //                 var res = JSON.toString(response);
        //                 $('#databox').html(response);
        //             } else {
        //                 location.reload();
        //             }
        //         }
        //     });

        // }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var route = "{{ url('/search/find-docs/') }}";
        $('#search').typeahead({
            source: function(query, process) {
                return $.get(route, {
                    query: query
                }, function(data) {
                    $('#databox').html(data);
                    // return process(data);
                });
            }
        });
    </script>