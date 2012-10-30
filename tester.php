<?php
/**
 * User: ethanhayon
 * Date: 10/27/12
 * Time: 12:11 AM
 */

include("lib/mysql.php");
include("lib/model.php");

$db = new Database();
$db->setup("localhost", "root", "", "ParkingManagementSystem");

Model::setDB($db);


class ParkingLot extends Model {
    protected static $table_name = "parkinglots"; // we can override the table name for
}

//$lot = ParkingLot::findOne("status='1'", "", "");
$lot = new ParkingLot();

print "Lot location is ". $lot->location ."<br />";
print "Is this lot new? ";
print ($lot->is_new) ? "New" : "Old";

print "<br />==============================</br>";
$lot2 = new ParkingLot();

$lot2->location = "New Location";
$lot2->status = "0";
$lot2->available = "3900";
$lot2->capacity = "10000";
$lot2->save();

$lot2->location = "Changed location";
$lot2->save();


$lot2->status = 0;
$lot2->save();

print "Lot location is ". $lot2->location ."<br />";
print "Is this lot new? ";
print ($lot2->is_new) ? "New" : "Old";
print "<br />This lot has a new id of: ". $lot2->id_parkinglot;
