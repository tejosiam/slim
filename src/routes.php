<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get("/clients/", function (Request $request, Response $response){
    $sql = "SELECT * FROM client";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if($result != false){
    	return $response->withJson(["status" => "ok", "returnCode" => "00" ,"data" => $result], 200);

    }else{
    	return $response->withJson(["status" => "ok", "returnCode" => "01" ,"data" => $result], 200);
    }
});

$app->get("/clients/{id}", function (Request $request, Response $response, $args){
    $id = $args["id"];
    $sql = "SELECT * FROM client WHERE client_id=:id OR email=:id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([":id" => $id]);
    $result = $stmt->fetch();
    if($result != false){
    	return $response->withJson(["status" => "ok", "returnCode" => "00" ,"data" => $result], 200);

    }else{
    	return $response->withJson(["status" => "ok", "returnCode" => "01" ,"data" => $result], 200);
    }
});


$app->get("/clients/search/", function (Request $request, Response $response, $args){

    // $keyword = $request->getQueryParam("keyword");


if(isset($_GET['client_type'])){
			// $client_type_get = $_GET['client_type'];
			$client_type_get = $_GET['client_type'];
			if($client_type_get == 'all'){

				$client_type = "client_type LIKE '%private%' or client_type LIKE '%corporate%'";
			}else{
				$client_type = "client_type LIKE '%".$client_type_get."%'";
			}
			
		}else{
			$client_type = "client_type LIKE '%private%'";

		}

// client_status
// signup_url
// services_type
// industry
// geolocation_city
// geolocation_country
// countries_interested_in


  //   if(isset($_GET['client_type'])){
		// 	$client_type = $_GET['client_type'];
			
		// } else {
		// 	$sql = "SELECT * FROM client";
		// }

$sql = "SELECT * FROM client WHERE $client_type";

    $stmt = $this->db->prepare($sql);

    $stmt->execute();
    $result = $stmt->fetchAll();
    if($result != false){
    	return $response->withJson(["status" => "ok", "returnCode" => "00" ,"data" => $result], 200);

    }else{
    	return $response->withJson(["status" => "ok", "returnCode" => "01" ,"data" => $result], 200);
    }
});

$app->post("/clients/", function (Request $request, Response $response){

    $client_data = $request->getParsedBody();

    $sql = "INSERT INTO client (client_id, firstname, lastname) VALUE (:client_id, :firstname, :lastname)";
    $stmt = $this->db->prepare($sql);

    $data = [
        ":client_id" => $client_data["client_id"],
        ":firstname" => $client_data["firstname"],
        ":lastname" => $client_data["lastname"]
    ];

    if($stmt->execute($data))
       return $response->withJson(["status" => "ok", "returnCode" => "00" , "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "returnCode" => "01" , "data" => "0"], 200);
});

$app->put("/clients/{id}", function (Request $request, Response $response, $args){
    $id = $args["id"];
    $client_data = $request->getParsedBody();
    $sql = "UPDATE client SET firstname=:firstname, lastname=:lastname WHERE client_id=:id";
    $stmt = $this->db->prepare($sql);
    
    $data = [
        ":id" => $id,
        ":firstname" => $client_data["firstname"],
        ":lastname" => $client_data["lastname"]
    ];

    if($stmt->execute($data))
       return $response->withJson(["status" => "ok", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

$app->delete("/clients/{id}", function (Request $request, Response $response, $args){
    $id = $args["id"];
    $sql = "DELETE FROM client WHERE client_id=:id";
    $stmt = $this->db->prepare($sql);
    
    $data = [
        ":id" => $id
    ];

    if($stmt->execute($data))
       return $response->withJson(["status" => "ok", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});