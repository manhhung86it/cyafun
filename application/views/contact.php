<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

<script>
var myCenter=new google.maps.LatLng(-33.85781,-208.80318);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:8,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class="container contact-container">
    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>
    <div class="feature-header">
        <div id="googleMap" style="width: 100%; min-height:300px;"></div>
               
    </div>
        <div class="col-sm-6 feature-content-left contact-hidden">
        <div class="contact-hidden-title"><?php echo $contact['title'] ?></div>
        <div class="contact-hidden-content"><?php echo $contact['content'] ?></div>
        </div>
    <div class="feature-content">
        <div class="row">
            <div class="col-sm-6 feature-content-left">
                <div class="contact-left-header">CONTACT US</div>
                <div class="contact-left-form">


                    <form role="form" method="post" action="" id="form-contact" class="span8" enctype="multipart/form-data">
                        <div class="">
                            <div class="span6">
                                <div class="form-group input-update input-contact">
                                    <label for="name">Name * :</label>
                                    <div class="input-group">
                                        <i class="fa fa-user"></i><input type="text" class="form-control input-register" name="name" id="name" placeholder="Enter Name" required>
                                    </div>
                                    <?php if (!empty($data_error['name'])): ?>
                                        <label for="name" class="error"><?php echo $data_error['name'] ?></label>
                                    <?php endif; ?>
                                    <div id="name_validate">
                                    </div>
                                </div>
                                <div class="form-group input-update input-contact">
                                    <label for="email">Email * :</label>
                                    <div class="input-group">
                                        <i class="fa fa-envelope-square"></i><input type="email" class="form-control input-register required email" id="email" name="email" placeholder="Enter Email" required>
                                    </div>
                                    <?php if (!empty($data_error['email'])): ?>
                                        <label for="email" class="error"><?php echo $data_error['email'] ?></label>
                                    <?php endif; ?>
                                    <div id="email_validate">
                                    </div>
                                </div>
                                <div class="form-group input-update input-contact">
                                    <label for="phone">Phone:</label>
                                    <div class="input-group">
                                        <i class="fa fa-mobile"></i> <input type="text" class="form-control input-lg" name="phone" id="phone" placeholder="Enter Phone">

                                    </div>
                                    <?php if (!empty($data_error['phone'])): ?>
                                        <label for="title" class="error"><?php echo $data_error['phone'] ?></label>
                                    <?php endif; ?>
                                    <div id="phone_validate">
                                    </div>
                                </div>
                                <div class="form-group input-update input-contact">
                                    <label for="content">Message * :</label>
                                    <div class="input-group">
                                        <textarea id="content" name="content" class="form-control update-textarea textarea-no-styles" rows="3" style="min-height: 200px;">
                                        </textarea>
                                    </div>
                                    <?php if (!empty($data_error['content'])): ?>
                                        <label for="content" class="error"><?php echo $data_error['content'] ?></label>
                                    <?php endif; ?>
                                    <div id="content_validate">
                                    </div>
                                </div>
                            </div>
                            <div class="register-submit contact-register-submit" >
                                <input type="submit" name="submit" id="submit" value="SUBMIT">
                            </div>
                        </div>
                    </form>




                </div>
            </div>
            <div class="col-sm-6 feature-content-right">
                <div class="contact-right-header"><?php echo $contact['title'] ?></div>
                <div class="contact-right-content"><?php echo $contact['content'] ?></div>
                <div class="contact-link">
                    <div class="contact-link-header">
                        Social Links
                    </div>
                    <div class="contact-link-cotent">
                        <ul class="sharing-links">
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url(); ?>index.php" target="_blank" title="Share on Facebook" class="link-facebook">Share Facebook</a>
                            </li>
                            <li>
                                <a href="http://www.twitter.com/share?url=<?php echo base_url(); ?>index.php" target="_blank" title="Share on Twitter" class="link-twitter">Share on Twitter</a>
                            </li>

                            <li><a href="https://plus.google.com/share?url=<?php echo base_url(); ?>index.php" class="link-email-friend" title="Email to a Friend">Email to a Friend</a></li>                       
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>