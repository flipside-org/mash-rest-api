<?php

require 'MashApiConnection.php';

/**
 * Mash API endpoints.
 * 
 * @author Daniel da Silva (daniel.silva@flipside.org)
 * @copyright Flipside 2014
 * @package MASH Rest API
 * @version 1.0
 * @access public
 */
class MashApi {
  /**
   * Instance of MashApiConnection.
   * @var MashApiConnection
   */
  public $connection = NULL;
	
  /**
   * Constructor function.
   * 
   * @param $bearer_token
   * @param $url
   *   The mash server url if not default.
   */
	function __construct($bearer_token, $url = null) {
	  $this->connection = MashApiConnection::build($bearer_token, $url);
	}
  
  /**
   * API endpoint.
   * Tests if the connection is working.
   * 
   * @param string $method
   *   The method to test: GET, POST, PUT, DELETE.
   *   Default to GET.
   * 
   * Returns data about the application making the request.
   */
  public function test($method = 'GET') {
    return $this->connection->doRequest('', $method);
  }
  
  /**
   * API endpoint.
   * Creates a participant in MASH.
   * 
   * @param array $payload
   *  Request parameters as specified in the documentation.
   * 
   * Created and returns a new participant.
   */
  public function createParticipant($payload) {
    return $this->connection->doRequest('/participants', 'POST', $payload);
  }
  
  /**
   * API endpoint.
   * Gets participants from MASH.
   * 
   * @param array $payload
   *  Request parameters as specified in the documentation.
   * 
   * Gets a list of respondents.
   */
  public function getParticipants($payload) {    
    return $this->connection->doRequest('/participants', 'GET', $payload);
  }
}