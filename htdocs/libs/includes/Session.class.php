<?

use Session as GlobalSession;

class Session{
    public $user;

    public static function start(){
            session_start();
    }
    public static function unset(){
        session_unset();   
     }
    public static function destroy(){
        session_destroy();        
    }
    public static function set($key,$value){

        $_SESSION[$key]=$value;
    }
    public static function del($key){
        unset($_SESSION[$key]);
    }
    public static function isset($key){
        if(
        isset($_SESSION[$key])){
            return true;

        }
        else{
            return false;
        }
    }
    public static function get($key,$default=false){
        if(Session::isset($key)){
            //echo "Session has set";
            return $_SESSION[$key];
        }else{
            return $default;
        }
        
    }
    public static  function loadtemplate($name){
        #print("including ".__DIR__."/../_templates/$name.php");
        #print(__FILE__);
        include $_SERVER["DOCUMENT_ROOT"].get_config('base_path')."_templates/$name.php";
    }
    public static function renderpage(){
        load_template("_master");
    }
    public static function currentscript(
    ){
        return (basename($_SERVER['SCRIPT_NAME'],'.php'));
    }
    public static function isauthenticated(){
        return true;
    }
}



?>