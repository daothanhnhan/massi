<link rel="stylesheet" href="/plugin/jquery-ui/jquery-ui.min.css">

<div class="gb-filterprices-sidebar-shophow widget-sidebar">

    <aside class="widget">

        <h3 class="widget-title-sidebar-shophow">Lọc theo giá</h3>

        <div class="widget-content">

            <div class="uni-filter-price">
            <form action="/price/0" method="post">
                <div id="slider-range"></div>

                <div class="label-filter-price"><input type="text" id="amount" name="price" readonly></div>

                <button class="btn-filter-prince">SEARCH</button>



                <div class="clearfix"></div>
            </form>
            </div>

        </div>

    </aside>

</div>

<script src="/plugin/jquery-ui/jquery-ui.min.js"></script>



<script>

    $(document).ready(function () {

        $( function() {

            $( "#slider-range" ).slider({

                range: true,

                min: 0,

                max: 5000000,

                values: [ 200000, 1500000 ],

                slide: function( event, ui ) {

                    $( "#amount" ).val( "đ" + ui.values[ 0 ] + " - đ" + ui.values[ 1 ] );

                }

            });

            $( "#amount" ).val( "đ" + $( "#slider-range" ).slider( "values", 0 ) +

                " - đ" + $( "#slider-range" ).slider( "values", 1 ) );

        } );

    });

</script>