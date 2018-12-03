<?php
//require 'nusoap/lib/nusoap.php';
class eventServer
{
	public $menuOptions;
	public $type = "";
	
	public function setSwitch($type)
	{
		switch ($type)
		{
			case 'Starter':
				$menuOptions;
				break;
			case 'Main':
				$menuOptions;
				break;
			case 'Dessert':
				$menuOptions;
				break;
			default:
				$menuOptions;
				break;
		}
	}
	
	
    protected $events = array(
        1 => array("name" => "Excellent PHP",
            "date" => 1454994000,
            "location" => "Amsterdam"
        ),
        2 => array("name" => "Marvellous PHP Conference",
            "date" => 1454112000,
            "location" => "Toronto"
		),
        3 => array("name" => "Fantastic Community Meetup",
            "date" => 1454894800,
            "location" => "Johannesburg"
		),
		4 => array("name" => "Fantastic Community Meetup",
            "date" => 1454894800,
            "location" => "Johannesburg"
        )
    );
	

    /**
     * Get all the events we know about
     *
     * @return array The collection of events
     */
    public function getEvents() {
        return $this->events;
    }

    /**
     * Fetch the detail for a single event
     *
     * @param int $event_id The identifier of the event
     *
     * @return array The event data
     */
    public function getEventById($event_id) {
        if(isset($this->events[$event_id])) {
            return $this->events[$event_id];
        } else {
            throw new Exception("Event not found");
        }
    }

    public function getEventByIDLoc($event_id, $loc) {
    $arr = array();
        if(isset($this->events[$event_id])) {
            $arr = $this->events[$event_id];

            if($arr['location']==$loc )
             return $this->events[$event_id];
        } else {
            throw new Exception("Event not found");
        }
    }

    public function getEventByLoc($loc) {
    $arr = array();
    $arr = $this->events;
       //return $arr[1];

     foreach($arr as $arrRow){
      // if(in_array($loc, $arrRow)){
      if($arrRow['location']==$loc)
           return $arrRow;

     }

       /*
        if(isset($this->events[$event_id])) {
            $arr = $this->events[$event_id];

            if($arr['location']==$loc )
             return $this->events[$event_id];
        } else {
            throw new Exception("Event not found");
        } */
    }

}
?>
