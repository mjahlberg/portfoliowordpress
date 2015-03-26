<?php
/*
 Template Name: social
 This page template displays the content and after that - a contact form.
 */

get_header();?>
<link rel="stylesheet" href="http://daneden.me/animate/animate.css"/>

<div id="posts" style="text-align: center;">
    <h1>
      <div style="color: white; text-align: center; " class="instagram">
      Follow me on Instragram along with
      </div>
    </h1>
  <a href="https://instagram.com/charlottemckinney/" class="button send-button" style="background-color: #44A4C7;"><i class="fa fa-instagram" style="font-size: 22px; padding-right: 5px;"></i><span>Follow me on Instagram</span></a>
</div>

<div id="instafeed" style="text-align: center;"></div>



<?php get_footer();

?>
<script src="<?php echo get_template_directory_uri(); ?>/js/social.js"></script>

<script>
 //Instagram API - Retrieve ID from username, then use ID to retrieve follower count
 var clientID = 'b8ae3c3360824dfe97586571c5ba9b11';
 var accessToken = '1466232857.b8ae3c3.bd20e51e608a47ebbf181e9a52026943';
 $.ajax({
  url: 'https://api.instagram.com/v1/users/search?q='+instagram+'',
  dataType: 'jsonp',
  type: 'GET',
  data: {client_id: clientID},
  success: function(data) {
   var ID = data.data[0].id;
   $.ajax({
    url: "https://api.instagram.com/v1/users/"+ID,
    dataType: 'jsonp',
    type: 'GET',
    data: {access_token: accessToken},
    success: function(data) {
     var followers = data.data.counts.followed_by;
     var cm = followers.toLocaleString();
     $('#posts .instagram').append(cm + " other people");
    }
   });
  }
 });

 var instaFeed = new Instafeed({
  get: 'user',
  userId: 3217772,
  accessToken: '1435784761.1677ed0.4f1ac9955e5b4a24929541d6ed8445f2',
  target: 'instafeed',
  sortBy: 'most-recent',
  limit: 32,
  resolution: 'standard_resolution',
  after: function () {
   var images = $("#instafeed").find('a');
   $.each(images, function(index, image) {
    var delay = (index * 75) + 'ms';
    $(image).css('-webkit-animation-delay', delay);
    $(image).css('-moz-animation-delay', delay);
    $(image).css('-ms-animation-delay', delay);
    $(image).css('-o-animation-delay', delay);
    $(image).css('animation-delay', delay);
    $(image).addClass('animated flipInX');
   });
  },
  template: '<a class="fancybox" href="{{link}}"><img src="{{image}}" /><div class="info"><p><i class="icon-comment"></i>{{caption}}</p><br><ul><li><i class="fa fa-heart-o"></i><span>{{likes}} likes</span></li><li><i class="fa fa-comment-o"></i><span>{{comments}} comments</span></li></ul></div></a>'
 }).run();

 $.fn.extend({
  matchHeight: function(data){
   var maxHeight = 0;
   $(this).each(function() {
    maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
   });
   $(this).height(maxHeight);
  }
 });



</script>
