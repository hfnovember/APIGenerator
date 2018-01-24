<?php


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     TestDB
//  FILE:         API/delete/index.php
//  TABLE:        userlevels
//  DATETIME:     2018-01-24 07:17:51pm
//  DESCRIPTION:  N/A

/**********************************************************************************/
			


                
/*
        ~~~~~~ API Endpoint Instructions ~~~~~~
        
        This endpoint is public and requires no authorization.
        
        Sample call for API/Userlevels/Delete:

            API/Userlevels/Delete?UserLevelID...

        /----------------------------------------------------------------/

        User Types/Levels who can access this endpoint:
         Administrator (1), Manager(2), Public(4), User(3)

        Call Parameters List:
        
		UserLevelID (int)

        /----------------------------------------------------------------/


        This endpoint responds with JSON data in the following ways.

        Response Format:

        1) Response OK

            --> "Status": "OK"
            --> "Title": "Item deleted successfully."
            --> "Message": "Item retrieved successfully."

        2) Response ERROR
        
            --> "Status": "Error"
            --> "Title": "Item deletion failed."
            --> "Message": "Failed to delete item."

                (Invalid parameters)

            --> "Status": "Error"
            --> "Title": "Invalid Parameters"
            --> "Message": "Invalid parameters. Expected Parameters: UserLevelID (int)."

                (Technical error)

            --> "Status": "Error"
            --> "Title": "Technical Error"
            --> "Message": "A technical error has occured. Please consult the system's administrator."

                (Invalid identification)

            --> "Status": "Error"
            --> "Title": "Authorization Error"
            --> "Message": "You are not authorized to access this procedure. If you think you should be able to do so, please consult your system's administrator."

    */
                
                
                
    
    //The onRequest() function is called once all security constraints are passed and all parameters have been verified.
    //Important Notice: This function has been automatically generated based on your database.
    //Editing this function is OK, but not recommended.                              
    function onRequest() {
        $JSON_DELETE_ERROR = array(STATUS => STATUS_ERROR, TITLE => DELETE_ERROR_TITLE, MESSAGE => DELETE_ERROR_MESSAGE);
        $JSON_DELETE_SUCCESS = array(STATUS => STATUS_ERROR, TITLE => DELETE_SUCCESS_TITLE, MESSAGE => DELETE_SUCCESS_MESSAGE);    
           
        include_once("../../../Scripts/Entity Classes/PHP/Userlevels.php");
        $objectID = $_POST["UserLevelID"];
        $result = Userlevels::delete($objectID);
        if ($result) die(json_encode($JSON_DELETE_SUCCESS));
        else die (json_encode($JSON_DELETE_ERROR));
       
    }
    
    /*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! DO NOT EDIT CODE BELOW THIS POINT !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
    //Editing the code below will compromise the reliability and security of your API.
    
    
    //Locals:
    const ENDPOINT_NAME = "API/Userlevels/Delete";
                
    //Statuses:
    const STATUS_ERROR = "Error";
    const STATUS_OK = "OK";

    //Titles/Messages:
    const STATUS = "Status";
    const TITLE = "Title";
    const MESSAGE = "Message";
    const DATA = "Data";
    const INVALID_PARAMS_TITLE = "Invalid Parameters";
    const INVALID_PARAMS_MESSAGE = "Invalid parameters. Expected Parameters: UserLevelID (int).";
    const TECHNICAL_ERROR_TITLE = "Technical Error";
    const TECHNICAL_ERROR_MESSAGE = "A technical error has occured. Please consult the system's administrator.";
    const AUTHORIZATION_ERROR_TITLE = "Authorization Error";
    const AUTHORIZATION_ERROR_MESSAGE = "You are not authorized to access this procedure. If you think you should be able to do so, please consult your system's administrator.";
    const DELETE_SUCCESS_TITLE = "Item deleted.";
    const DELETE_SUCCESS_MESSAGE = "Item deleted successfully.";
    const DELETE_ERROR_TITLE = "Item deletion failed.";
    const DELETE_ERROR_MESSAGE = "Failed to delete item.";
    

    //JSON returns:
    $JSON_INVALID_PARAMS = array(STATUS => STATUS_ERROR, TITLE => INVALID_PARAMS_TITLE, MESSAGE => INVALID_PARAMS_MESSAGE);
    $JSON_TECHNICAL_ERROR = array(STATUS => STATUS_ERROR, TITLE => TECHNICAL_ERROR_TITLE, MESSAGE => TECHNICAL_ERROR_MESSAGE);
    $JSON_AUTHORIZATION_ERROR = array(STATUS => STATUS_ERROR, TITLE => AUTHORIZATION_ERROR_TITLE, MESSAGE => AUTHORIZATION_ERROR_MESSAGE);
    

	//-- PARAMETER CHECKS

	if (!isset($_POST["UserLevelID"]) || $_POST["UserLevelID"] == "") die(json_encode($JSON_INVALID_PARAMS));
	include_once("../../../Scripts/DBLogin.php");

	onRequest(); 

?>