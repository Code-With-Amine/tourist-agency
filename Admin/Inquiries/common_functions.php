<?php
function showMessage($err){
    switch($err){
        case 0:
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Successfully Deleted
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            break;
        case 1:
            echo '<div class="alert alert-dangers alert-dismissible fade show" role="alert">
                         Somthing went wrong try again later
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            break;
    }
}

function Updatestatus($db, $table, $state, $id){
    $sqlSate = $db->prepare("UPDATE $table SET status = ? WHERE id = ?");
    $sqlSate->execute([$state, $id]);
}

?>