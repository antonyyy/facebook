 @if(Session::has('message'))
 <p style="color:green;">{{ Session::get('message') }}</p>
  @endif
  
  {{HTML::link('/','Back to Homepage')  }}
<ul>
@foreach($viewdatas as $data)
<li>Name: {{ $data->first_name }}
 {{ $data->last_name }}</li>
<li>Gender: {{ $data->gender }}</li>
<li>Message: {{ $data->msg }}</li>
<li>Image: <a href="{{ $data->url }}" ><img src="{{ $data->url }}" width="250px"/></a></li>
<p>___________</p>
@endforeach
</ul>
