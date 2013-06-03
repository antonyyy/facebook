<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title>Facebook</title>
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

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '334187050043111', // App ID
    //channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
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
						//$('#flag').hide();
						$('.flag').append("Can't submit, you must LIKE Facebook page");
						
						$('#submit').hide();				
				
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
  </head>
  
  <body><div id="fb-root"></div>



<h1>ADD Image URL and Message</h1> 
  @if(Session::has('message'))
 <p style="color:green;">{{ Session::get('message') }}</p>
  @endif


 {{ Form::open_for_files('new/create', 'POST') }}
<p>

{{ Form::label('url','Image URL') }} <br/>
{{ Form::text('url') }}
</p>
<p>
{{ Form::label('msg','Message') }} <br/>
{{ Form::textarea('msg') }}
</p>
<p>
{{ Form::hidden('first_name',Input::get('first_name')) }}
</p>
<p>
{{ Form::hidden('last_name',Input::get('last_name')) }}
</p>
<p>
{{ Form::hidden('gender',Input::get('gender')) }}
</p>

<p> {{Form::submit('Submit',array('id'=>'submit')) }} </p>

{{Form::close() }}

<p class="flag" style="color:red;"></p>
 <p>{{ HTML::link('/', 'Back to Homepage') }} </p>
</body>
</html>

