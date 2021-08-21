<?php 
require 'layout/header.php';
require 'vendor/Conversation.php';

if(!isset($_SESSION['pseudo'])) header('Location: index.php');

$users = USER::fetchUsersExclusingOne($_SESSION['id']);

if(isset($_POST['send_message'])){
    if(isset($_GET['messageto'])){	

        $id_user_dest =  $_GET['messageto'];
        $id_user_exp = $_SESSION['id'];
        $message = $_POST['message'];
        $result = Conversation::setConvers($id_user_exp,$id_user_dest,$message);
        if(!$result){
            echo "<script>alert('Erreur en envoyant le message')</script>";
        }
    }
}

if(isset($_GET['messageto'])){	
    $getConvers =  $result = Conversation::getConvers($_SESSION['id'],$_GET['messageto']);    
}

?>



<div class="container-fluid p-3">
<div class="row ">
    <div class="col-sm-3 pb-2"> 
        <h3>Mes contacts</h3>
        <div class="list-group">
            <div class="row ">
                <div class="">
                <?php foreach($users as $item):
                     $getInfoUserOnline = Online::getInfoUserOnline($item->id);
                     $dateDeconnection = new DateTime($getInfoUserOnline->date_time_connection);
                ?> 
                    <a href="chatapp.php?messageto=<?=$item->id?>" class="list-group-item list-group-item-action <?php if(isset($_GET['messageto']) && $item->id == $_GET['messageto']) {echo  'active';}else{echo '';} ?>"> <?=$item->pseudo?>
                    <?php if($getInfoUserOnline->statut_connection == 1): ?>
                     <span class="float-end text-warning">En ligne</span>
                     <?php else :?>
                    <span class="float-end  text-danger">Hors Ligne depuis <?=$dateDeconnection->format('h:i') ?></span>
                    <?php endif ;?>
                </a>
                <?php endforeach; ?>
                </div>
            </div>
          
        </div>
    </div>
    <div class="col-lg-8 col-sm-12">
        <?php if(isset($_GET['messageto'])): ?>
            
        <div class="w-100  p-3 border overflow-auto" style="height:370px;">
            <div class="row" > 
            <?php foreach($getConvers as $item): 
                    $dateConversation = new DateTime($item->date_conversation);    
            ?>
                
                <?php if($item->id_user_exp == $_SESSION['id']):?>
                    <div class="col-12"><p class="float-end bg-info p-2 rounded shadow"><?=$item->message?> <br><span class="text-muted text-small"><?=$dateConversation->format('h:i')?></span><button class="btn border-none"><i class="fa fa-trash fs-12"></i></button></p></div>
                <?php  else: ?>
                <div class="col-12"><p class="float-start  bg-default border p-2 rounded shadow"><?=$item->message?><br><span class="text-muted text-small"><?=$dateConversation->format('h:i')?></span></p></div>
                <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>
        
        <div class="col-12">
            <form action="" method="post" ectype="multipart/form-data" class="w-100">
                <div class="form-group">
                  <textarea class="form-control" name="message" id="" rows="3" placeholder="Ecrire votre message"></textarea>
                  <br>
                  <button type="submit" class="btn btn-primary" name="send_message">Envoyer</button>
                </div>
            </form>
        </div>
        <?php else:?>
            <div class="card text-white bg-default">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h4 class="card-title text-center text-primary">Choisissez quelqu'un pour tchater!</h4>
              </div>
            </div>
        <?php endif; ?>
    </div>
</div>



<?php require 'layout/footer.php' ?>