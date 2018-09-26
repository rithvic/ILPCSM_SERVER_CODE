<?php
final class singleton
{

	private $value="success";
    /**
     * Call this method to get singleton
     *
     * @return UserFactory
     */
    public static function Instance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new UserFactory();
        }
        return $inst;
    }
	
	function getvalue(){
		return $this->$value;
		}

    /**
     * Private ctor so nobody else can instantiate it
     *
     */
    private function __construct()
    {

    }
}
?>