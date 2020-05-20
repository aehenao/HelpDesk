<?php

namespace App\apiTeamViewer;

class Conexion
{

  function __construct()
  {
    // code...
  }

  public function data()
  {
    $apiPing = "https://webapi.teamviewer.com/api/v1/ping";
    $apiSessions = "https://webapi.teamviewer.com/api/v1/sessions";
    $apiGroups = "https://webapi.teamviewer.com/api/v1/groups";

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $apiSessions,
      CURLOPT_RETURNTRANSFER => true,
      // CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "full_list=true",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "Authorization: Bearer 9013597-A81M7XzRuPejuqNORO5b"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if (!$err)
    {
      var_dump($response);
    }

    return $response;
  }
}

?>
