<?php
class UNL_Officefinder_Department extends UNL_Officefinder_Record
{
    public $id;
    public $name;
    public $org_unit;
    public $building;
    public $room;
    public $city;
    public $state;
    public $postal_code;
    public $address;
    public $phone;
    public $fax;
    public $email;
    public $website;
    public $acronym;
    public $alternate;

    /**
     * Construct a new listing
     * 
     * @param $options = array([id])
     */
    function __construct($options = array())
    {
        if (isset($options['id'])) {
            $record = self::getByID($options['id']);
            UNL_Officefinder::setObjectFromArray($this, $record->toArray());
        }
    }

    function getTable()
    {
        return 'departments';
    }

    /**
     * Retrieve a department
     * 
     * @param int $id
     * 
     * @return UNL_Officefinder_Department
     */
    public static function getByID($id)
    {
        if ($record = UNL_Officefinder_Record::getRecordByID('departments', $id)) {
            $object = new self();
            UNL_Officefinder::setObjectFromArray($object, $record);
            return $object;
        }
        return false;
    }
}