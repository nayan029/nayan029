@include('fronted/include/header')
<div class="sa-enroll-details">
    <div class="container">
        <div class="sa-application">
            <div class="d-flex align-items-center res-search-md justify-content-between">
                <h3 class="sa-color2 mb-4">Search Results @if(isset($name))"{{$name}}" @endif</h3>
                <!-- <h3>
                    @if(isset($category_id))
                    @if($category_id==2)
                    @if(isset($query_data)){{$query_data[0]['title']}} @endif / @if(isset($category_id)) @if($category_id == 1) Legal Services @elseif($category_id == 2) Legal Query @endif @endif

                    @elseif($category_id == 1)
                    @if(isset($query_data)){{$query_data[0]['service_name']}} @endif / @if(isset($category_id)) @if($category_id == 1) Legal Services @elseif($category_id == 2) Legal Query @endif @endif


                    @endif
                    @endif -->
                </h3>

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
                    <div class="col-md-12">
                        <ul class="footer-ul sa-footer-mb">
                           
                            @if(isset($query_data))

                            @foreach($query_data as $data)

                            @if($data['legal_query_type_id'])
                            <li><a href="{{ URL::to('/legalQueryDesc') }}?id={{$data['id']}}">{{$i."."}} @if(isset($query_data))
                                    @php
                                    print_r($data['title']);
                                    @endphp
                                    @endif
                                    @if($data['legal_query_type_id']==1)
                                    <b style="color:#eca835;">-Research Paper</b>
                                    @endif
                                    @if($data['legal_query_type_id']==2)
                                    <b style="color:#eca835;"> -Notes </b>
                                    @endif
                                    @if($data['legal_query_type_id']==3)
                                    <b style="color:#eca835;">  -Bare Acts </b>
                                    @endif

                                </a></li>

                            @endif
                            @php $i++; @endphp
                            @endforeach

                            @endif

                            @if(isset($query_datatwo))
                            @foreach($query_datatwo as $data)
                            <li><a href="{{ URL::to('/') }}/legal-services/@php print_r($data['slug']); @endphp">{{$i."."}} @if(isset($query_datatwo))
                                    @php
                                    print_r($data['service_name']);
                                    @endphp
                                    @endif

                                    @if($data['category_id']==1)
                                    <b style="color:#eca835;">  -Legal AID </b>
                                    @endif
                                    @if($data['category_id']==2)
                                    <b style="color:#eca835;"> -Documentation </b>
                                    @endif

                                </a></li>

                            @endforeach
                            @endif
                            @if(empty($query_data) && empty($query_datatwo))
                            {{"No data found"}}
                            @endif


                        </ul>
                    </div>

                    <div class="col-md-6">
                        <ul class="footer-ul sa-footer-mb">

                        </ul>
                    </div>
                </div>



            </div>

        </div>




        <div class="row mb-5">
            <div class="col-md-12">
                <div>
                    <!-- <h2 class="sr-t">50,000 People Choose  Every Day</h2> -->
                </div>

            </div>
        </div>
    </div>
</div>
@include('fronted/include/footer')
<script>

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
    var route = "{{ url('/search/find-aid/') }}";
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