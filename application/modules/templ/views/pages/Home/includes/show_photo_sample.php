<div class="container my-4">

    
<div class="row">
		

    <?php
    
    
    for($i = 1;$i <10;$i++){
        ?>
            
            
            

  
  <div class="col-lg-3 col-md-2 mb-4">

    <!--Modal: Name-->
    <div class="modal fade" id="modal<?php  echo $i;   ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">

        <!--Content-->
        <div class="modal-content">

          <!--Body-->
          <div class="modal-body mb-0 p-0">

            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
              <!--<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/gsNY7TV4r1M"
                allowfullscreen></iframe>--><?php  echo $i;   ?><img class="embed-responsive-item" src="https://mdbootstrap.com/img/screens/yt/screen-video-6.jpg" alt="video"
        data-toggle="modal" data-target="#modal<?php  echo $i;   ?>">
            </div>

          </div>

          <!--Footer-->
          <div class="modal-footer d-block d-md-flex justify-content-center">
            

            <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>

          </div>

        </div>
        <!--/.Content-->

      </div>
    </div>
    <!--Modal: Name-->

    <a><img class="img-fluid z-depth-1" src="https://mdbootstrap.com/img/screens/yt/screen-video-6.jpg" alt="video"
        data-toggle="modal" data-target="#modal<?php  echo $i;   ?>"></a>

  </div>
  <!-- Grid column -->


            
            <?php
    }
    
    
    ?>
    
    </div>

<!-- Grid row -->

  </div>