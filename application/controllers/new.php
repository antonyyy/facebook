<?php

class New_Controller extends Base_Controller {
public $restful=true;
public function get_new()
{
return View::make('new.new');
}

public function post_create()
{
	$facebook = new Facebook(array(
  'appId'  => '334187050043111',
  'secret' => 'ef2aee944ebff35ac0b7629825ffc189',
));

//iz modela
Entries::create(array(
'url'=>Input::get('url'),
'msg'=>Input::get('msg'),
'first_name'=>Input::get('first_name'),
'last_name'=>Input::get('last_name'),
'gender'=>Input::get('gender'),
));

return Redirect::to('viewdatas')->with('message','Data successfully created');
}
}