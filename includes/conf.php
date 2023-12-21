

<?php session_start();

if(!isset($_SESSION['login'])){
    header("location:../../index.php");
}
include("db.php");

function get_header(){
    include('nav.php');
}

function get_side(){
    include('sidebar.php');
}

function get_footer(){
    include('footer.php');
}

function agent(){
    if(isset($_SESSION['role']) && $_SESSION['role']!=1 ){
        header("location:../agent/agent.php");
    }
}

?>