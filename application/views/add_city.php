<?php $this->load->view('header');?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Add New City (Use For Services Provides)</h1>
                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                 <div class="row">
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                                            
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo base_url();?>index.php/City_management/insert_city" method="post" class="horizontal-form">
                                                    <div class="form-body">
                                                      
                                                        <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">City Name</label><span class="required">*</span>
                                                                      <input type="text" name="city_name" id="city_id" class="form-control">
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Select State</label><span class="required">*</span>
                                                                      <select id="state_id" name="state_name" class="form-control select2" required>
                                           <option value="" selected="selected" >Select State</option>
  									 
  							 <?php  foreach($state as $count): ?>
							  
        <option value="<?php echo $count->state; ?>"><?php echo $count->state; ?>
								                         </option>
 													  <?php endforeach; ?> 

                                            </optgroup>
                                        </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            	 <!-- <div class="col-md-6">
																 <div class="form-group">
                                                                 <button type="button" class="btn green" id="get_location">
                                                            <i class="fa fa-map-marker"></i>Get Cordinate</button>
                                                            </div>
															</div> -->
                                                            <!--/span-->
															
															
                                                            <!--/span-->
                                                             <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Lattitude</label>
                                                                      <input type="text" name="lattitude" id="lattitude" class="form-control"  >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
															  <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Longitude</label>
                                                                      <input type="text" id="longitude" name="longitude" class="form-control"  >
                                                                    
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            </div>
														
                                        		
                                                                   
                                                        <!--/row-->
                                                     
                                                    </div>
                                                    <div class="form-actions right">
                                                     
                                                        <button type="submit" class="btn yellow">
                                                            <i class="fa fa-check"></i>Add City</button>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                        </div>
                    </div>
                    </div>
                    
                 
            <!--end-->
                    </div>
                    </div>
                    </div>
                        
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- BEGIN FOOTER -->
               
       
        <!-- END THEME LAYOUT SCRIPTS -->
		<style>
		#map {
			width: 100%;
			height: 400px;
		}
	</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
	$(document).ready(function(){
		/*$("#get_location").click(function(){
		 var city = $('#city_name').val();

		 });*/
		$("#get_location").click(function(){
			var geocoder =  new google.maps.Geocoder();
			var city_name = $('#city_id').val();
			var state_name = $('#state_id').val();
			//var city = city_name + ", " + state_name;
			geocoder.geocode( { 'address': city_name}, function(results, status)
			 {
				if (status == google.maps.GeocoderStatus.OK) {
					//alert("location : " + results[0].geometry.location.lat() + " " +results[0].geometry.location.lng());
					$('#lattitude').val(results[0].geometry.location.lat());
					$('#longitude').val(results[0].geometry.location.lng());

					var map_lat = results[0].geometry.location.lat();
					var map_lng = results[0].geometry.location.lng();

					var myLatLng = {lat: map_lat, lng: map_lng};

					var map = new google.maps.Map(document.getElementById('map'),
					 {
						zoom: 12,
						center: myLatLng
					});

					var marker = new google.maps.Marker({
						position: myLatLng,
						map: map,
						title: 'Hello World!'
					});

				} else {
					alert("Something got wrong " + status);
				}
			});
		});
	});
</script>
<script>
	function initMap() {
		var myLatLng = {lat: 21.7644725, lng: 72.15193040000008};

		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 12,
			center: myLatLng
		});

		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: 'Hello world!'
		});
	}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq4BleY2JJx0ITL-112jPctqiMI9TF6kc&callback=initMap"
		type="text/javascript"></script>
  <?php $this->load->view('footer');?>