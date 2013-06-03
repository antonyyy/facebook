<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<!-- CSS media query on a link element -->
<link rel="stylesheet" media="(max-width: 800px)" href="example.css" />
 
<!-- CSS media query within a style sheet -->
<style>
@media screen and (max-width: 600px) {
  h1 {
     background: blue;
	 font-size:20px;
  }
}
</style>
<style>
@media screen and (max-width: 480px) {
  h1 {
    background: #ccc;
	font-size:15px;
  }
}
</style>

    <title>Facebook</title>
    <!--
	<style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style> 
	-->

  </head>
  <body><div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '334187050043111', // App ID
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  
  ///////
   FB.getLoginStatus(function(response) {
              if (response.authResponse) {
                // logged in and connected user, someone you know
                 var user_id = response.authResponse.userID;
                  var page_id = "475266099219399";
                  var fql_query = "SELECT uid FROM page_fan WHERE page_id = "+page_id+"and uid="+user_id;
                  var the_query = FB.Data.query(fql_query);

                  the_query.wait(function(rows) {

                      if (rows.length == 1 && rows[0].uid == user_id) {
                          //user likes the page
                          //do your stuff here
						  //alert('like');
                      } else {
                       // alert('NOT __like');
						// user doesn't like our page yet                             
                      }
                  });
              } else {
                // no user session available, someone not known, not logged into fb                  
              }
          });
  ////////
  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

</script>

<fb:like href="https://www.facebook.com/Testlaravel" send="false" width="450" show_faces="true"></fb:like>
  

  
  @if(Session::has('message'))
 <p style="color:green;">{{ Session::get('message') }}</p>
  @endif
  <p></p>
  @if($user)
	    <p>{{ HTML::link($logoutUrl, 'Logout from Facebook') }} </p>
		
	<p>ID: {{ $user_profile['id'] }} </p>
		<p>FIRST: {{ $user_profile['first_name'] }} </p>
		<p>LAST: {{ $user_profile['last_name'] }} </p>
		<p>GENDER: {{ $user_profile['gender'] }} </p>
	
   <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">
	  
	   <h2><a href="new?first_name={{$user_profile['first_name']}}&last_name={{$user_profile['last_name']}}&gender={{$user_profile['gender']}}"><span>Add image and personal text</span></a>  </h2>
	     @else
 		  <p>	 {{ HTML::link($loginUrl, 'Login with Facebook') }}  </p>
		@endif
		
<h1>{{ HTML::link('viewdatas', 'Click to see data of all users') }}</h1>



  </body>
</html>