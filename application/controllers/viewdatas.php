<?php
class Viewdatas_Controller extends Base_Controller {

    
      public $restful=true;
	  public function get_index()
			{	
					return View::make('viewdatas.index')->with('viewdatas',Entries::all());
					
				

			}

   

}