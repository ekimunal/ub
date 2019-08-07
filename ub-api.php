<?

define(API_URL,"https://www.potterapi.com/v1/");
define(API_KEY,"$2a$10$PmCjrdLq1dMRwLQpxj5gNOmD91mO.plqaa2HsoTAzNPN6kZOe1xT");

//get_characters()>>All Characters|get_characters("Ravenclaw")>>Ravenclaw Only
function get_characters($house) {
  $curl = curl_init();
  if($house)
  $data_array = array('key' => API_KEY, 'house' => $house);
	else
  $data_array = array('key' => API_KEY);
		
  curl_setopt_array($curl, array(
    CURLOPT_URL => API_URL."/Characters",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($data_array),
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json"
    ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    return false;
  } else {
    return json_decode($response);
	//or print them with echo to screen if cant make it in time
  }
  return true;
}
