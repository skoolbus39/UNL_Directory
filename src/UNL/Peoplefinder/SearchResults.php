<?php
class UNL_Peoplefinder_SearchResults extends ArrayIterator
{
    public $options = array('affiliation' => '',
                            'results'     => array());

    function __construct($options = array())
    {
        $this->options = $options + $this->options;

        parent::__construct($this->options['results']);
    }

    /**
     * Convert a group of results into results by affiliation
     * 
     * @param Traversable $results Array of peoplefinder records
     * 
     * @return associative array
     */
    public static function groupByAffiliation($results)
    {
        $by_affiliation = array();

        foreach ($results as $record) {
            if (isset($record->eduPersonAffiliation)) {
                foreach ($record->eduPersonAffiliation as $affiliation) {
                    if (!isset($by_affiliation[$affiliation])) {
                        $by_affiliation[$affiliation] = array();
                    }
                    $by_affiliation[$affiliation][] = $record;
                }
            }
        }
        return $by_affiliation;
    }
}