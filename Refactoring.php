<?php
public funtion post_confirm(){
	$id =Input::get('service_id');
	$servicio=Service::find($id);
	if($servicio !=NULL){
		if (servicio->status_id=='6'){
			return Respose::json($array('error' => ,'2' ));
		}
		if($servicio->driver_id==NULL && $servicio->status_id=='1'){
			
		}




	}
}
?>