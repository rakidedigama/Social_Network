@extends('layouts.dlayout')

@section('pageTitle','Borrowed Items')

@section('content')

@include('layouts.dnav', ['active' => 'borrowed_item'])

<div class="col-md-9">
	<div class="content" style="height:900px; width: auto;">
		<div class="right-side-home">
			<div class="product-list">
				<div class="row" id="rows">
					{{-- <div class="col-md-4">
							<div class="p-box-lent">
							<p class="person-name">Person Name Here</p>
							<img src="images/Iron.jpg" class="img-responsive">
							<p>Product Name</p>
						</div>--}}

				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('footer')
    <script type="text/javascript">
        $(document).ready(function(){

            function loadData(skip,limit)
            {
            	$('#rows').append('<div class="col-md-12">'+
            		'<img src="{{ url('/images/loader.gif') }}" class="img-circle center-block loader" height="50" width="50" >'+
        		'</div>');
                $.ajax({
                    url: '{{ url('/userborrowedproducts/'.Auth::user()->id) }}/'+skip+'/'+limit,
                    dataType: 'JSON',
                    cache: true,
                    success:function(data){

                    	if(data['msg'])
                    	{
                    		$('.loader').parent('div').remove();
                    	
                			$('#rows').append('<div class="col-md-12">'+
                				'<p class="text text-danger center-block">'+data['msg']+'</p>'+
            				'</div>');
                    	}
                    	else
                    	{
	                        $.each(data,function(index, value) {
	                            $('#rows').append('<div class="col-md-4">'+
	                                '<div class="p-box-lent">'+
	                                    '<p class="person-name">Lender: '+value['lent_name']+'</p>'+
	                                    '<div class="p-img-al" style=\"background-image: url(\'{{ url('/images/uploads') }}/'+value['image']+'\')\"></div>'+
	                                    '<p>'+value['name']+'</p>'+
	                                '</div>'+
	                            '</div>'); 
	                        });
	                        $('.loader').parent('div').remove();
                        }
                    },
                    error:function(){ $('.loader').parent('div').remove(); }
                }); 
            }            
            loadData(0,12);

			$(".content").mCustomScrollbar({
				scrollButtons:{
					enable:true
				},
				callbacks:{
					onScrollStart:function(){ myCallback(this,"#onScrollStart") },
					onScroll:function(){ myCallback(this,"#onScroll") },
					onTotalScroll:function(){ 
						myCallback(this,"#onTotalScroll");
						var n = $('#rows').children().length;
				     	loadData(n,3);
						},
					onTotalScrollOffset:60,
					onTotalScrollBack:function(){ myCallback(this,"#onTotalScrollBack") },
					onTotalScrollBackOffset:50,
					whileScrolling:function(){ 
						myCallback(this,"#whileScrolling"); 
						$("#mcs-top").text(this.mcs.top);
						$("#mcs-dragger-top").text(this.mcs.draggerTop);
						$("#mcs-top-pct").text(this.mcs.topPct+"%");
						$("#mcs-direction").text(this.mcs.direction);
						$("#mcs-total-scroll-offset").text("60");
						$("#mcs-total-scroll-back-offset").text("50");
					},
					alwaysTriggerOffsets:false
				}
			});
			
			function myCallback(el,id){
				if($(id).css("opacity")<1){return;}
				var span=$(id).find("span");
				clearTimeout(timeout);
				span.addClass("on");
				var timeout=setTimeout(function(){span.removeClass("on")},350);
			}
			
			$(".callbacks a").click(function(e){
				e.preventDefault();
				$(this).parent().toggleClass("off");
				if($(e.target).parent().attr("id")==="alwaysTriggerOffsets"){
					var opts=$(".content").data("mCS").opt;
					if(opts.callbacks.alwaysTriggerOffsets){
						opts.callbacks.alwaysTriggerOffsets=false;
					}else{
						opts.callbacks.alwaysTriggerOffsets=true;
					}
				}
			});
        });  
    </script>
    
@endsection
