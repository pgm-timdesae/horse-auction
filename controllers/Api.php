<?php

class ApiController {

    public function get_auctions ($page = 0) {
        //change content-type of the ooutput
        header('Content-Type: application/json; charset=utf-8');

        $auctions =  Auction::getAll();

        //echo json to the output
        echo json_encode($auctions);
        exit;
    }

}