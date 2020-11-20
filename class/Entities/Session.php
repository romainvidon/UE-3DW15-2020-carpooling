<?php

namespace App\Entities;

class Session {

    public function __construct(){
        session_start();
    }

    public function setFlash($message, $type = 'danger'): void{
        $_SESSION['flash'] = array(
            'message' => $message,
            'type' => $type
        );
    }

    public function flash(){
        
        if(isset($_SESSION['flash'])){ ?>

            <div class="row mt-4" id="alert">
                <div class="col-12">
                    <div class="alert alert-<?php echo $_SESSION['flash']['type']; ?> alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['flash']['message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                </div>
            </div>
            

            <?php unset($_SESSION['flash']);
        }
    }

}