<?php
public funtion post_confirm(){
	$id =Input::get('service_id');
	$servicio=Service::find($id);
	if(isset($servicio)){
		if (servicio->status_id=='6'){
			return Respose::json($array('error' => ,'2' ));
		}
		if(is_null($servicio->driver_id) && $servicio->status_id=='1'){
			$Service = Service::update($id,$arrayName = array(
						'driver_id' => Input::get('driver_id'),status_id='2' 
			))
			Driver::update(Input::get('driver_id'),array('avaible' =>'0' , 
			));
			$driverTmp=Driver::find (Input::get('driver_id'));
			Service::update($id,array(
				'car_id' =>$driverTmp->car_id 
			 ))
			$pushMessage='Tu servicio ha sido confirmado !';
			$servicio= Service::find($id);
			$push=Push::make();
			if(is_null($servicio->user->uuid)){
				return Respose::Json(array('error' => ,'0' ));
			}
				if($servicio->user->type=='1'){
					$result=$push->ios($servicio->user->uuid,$pushMessage,1,'honk.wav','Open', array('service_id' => $service_id));			}
				else {
					$result=$push->android2($servicio->user->uuid,$pushMessage,1,'defauld','Open', array('service_id' => $service_id));	

				}
				return Response::json(array('error'=>'0'));
		}
		else{
			return Response::json(array('error'=>'1'));
		}




	}
	else{
			return Response::json(array('error'=>'3'));
		}

}
?>