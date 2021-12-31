<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fito - @yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png')}}">
	<link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css')}}">
    

    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
	<link href="../../cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
	<link href="{{ asset('vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">

    <link href="{{ asset('vendor/lightgallery/css/lightgallery.min.css')}}" rel="stylesheet">



    <!--- Datatable ---->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!--- sweet alert --->

    <link href="{{asset('vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">

	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	

    @yield('css')
</head>
<body>

   
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

      
		
		@include('backend.layout.partails.header')
		
		 <!--**********************************
            Sidebar start
        ***********************************-->

       @include('backend.layout.partails.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
        <div class="container-fluid">

        <!-- <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
					</ol>
                </div> -->
        @yield('content')
        
    </div>         
    </div>			
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
			@include('backend.layout.partails.footer')
        <!--**********************************
            Footer end
        ***********************************-->

	


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


 <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <script src="{{asset('vendor/global/global.min.js')}}"></script>
	<script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	<script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
	<script src="{{asset('js/deznav-init.js')}}"></script>
	<script src="{{asset('vendor/owl-carousel/owl.carousel.js')}}"></script>
		

    <script src="{{asset('vendor/lightgallery/js/lightgallery-all.min.js')}}"></script>

	
	<!-- Chart piety plugin files -->
    <script src="{{asset('vendor/peity/jquery.peity.min.js')}}"></script>
	
	<!-- Apex Chart -->
	<script src="{{asset('vendor/apexchart/apexchart.js')}}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{asset('js/dashboard/dashboard-1.js')}}"></script>


      <!-- Datatable -->

      <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

      <!--- sweet alert -->

      
    <script src="{{asset('vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{asset('js/plugins-init/sweetalert.init.js')}}"></script>

	<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

{{-- 
    <script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('js/plugins-init/select2-init.js')}}"></script> --}}

	<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>
    
	<script>
		function featuredmenus()
		{
		
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.featured-menus').owlCarousel({
				loop:false,
				margin:30,
				nav:true,
				autoplaySpeed: 3000,
				navSpeed: 3000,
				paginationSpeed: 3000,
				slideSpeed: 3000,
				smartSpeed: 3000,
				autoplay: false,
				dots: false,
				navText: ['<i class="fa fa-caret-left"></i>', '<i class="fa fa-caret-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},	
					767:{
						items:1
					},			
					991:{
						items:2
					},
					1200:{
						items:2
					},
					1600:{
						items:3
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				featuredmenus();
			}, 1000); 
		});
		
	</script>

    @yield('js')
    
	
</body>

</html>