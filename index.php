<?php 
require 'layout/header.php';

if(isset($_POST['sign_up'])){
  if(isset($_POST['pseudo'],$_POST['email'],$_POST['password']) && $_POST['pseudo']!= null && $_POST['email']!= null && $_POST['password'] != null){
    $user = new User();
    $returnValue = $user->createUser($_POST['pseudo'],$_POST['email'],$_POST['password']);
    if($returnValue == true){
      $_SESSION['message-sign-up'] = Message::setMessage('success','Compte Créé');
    }
  }else{
    $_SESSION['message-sign-up'] = Message::setMessage('danger','Veuillez Remplire les champs vide');
  }
  

}

if(isset($_POST['sign_in'])){
  if(isset($_POST['pseudo'],$_POST['password'])  && $_POST['pseudo']!= null && $_POST['password'] != null){
    $user = new User();
    $userInfo = $user->authUser($_POST['pseudo'],$_POST['password']);
    if($userInfo != null){
      $_SESSION['id']  = $userInfo->id;
      $_SESSION['pseudo']  = $userInfo->pseudo;
      try {
        ONLINE::setUserOnline($userInfo->id);
        header('Location: chatapp.php');
      } catch (Exception $e) {
        die("Set User Online Error: ".$e->getMessage());
    }
      
    }else{
      $_SESSION['message-sign-in'] = Message::setMessage('danger','Informations incorrectes');
    }
  
  }else{
    $_SESSION['message-sign-in'] = Message::setMessage('danger','Veuillez Remplire les champs vide');
  }
}

?>



    <div class="container p-5">
        <div class="row">
          
          <div class="col-sm-4 p-2  rounded shadow">
              <div class="sign-in">
              <h4 class="text-center">Veuillez-vous connecté!</h4>
              <?php if(isset($_SESSION['message-sign-in'])){echo $_SESSION['message-sign-in'];} unset($_SESSION['message-sign-in']);?>
                <form action="" method="post" class=" p-2">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" name="pseudo" id="inputGroupFile02"type="file" class="form-control" id="inputGroupFile02">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <input  type="password" class="form-control" name="password" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" class="form-control" id="inputGroupFile02">
                    </div>
                    <button class="btn btn-primary" type="submit" name="sign_in">Connection</button>
                </form>
                <p class="pt-2 text-primary text-decoration-underline" id="createAccountButton">Creer un compte</p>
              </div>
            
            

            <div class="sign-up" style="display: none;">
            <h4 class="text-center">Veuillez-vous Incrire!</h4>
            <?php if(isset($_SESSION['message-sign-up'])){echo $_SESSION['message-sign-up'];} unset($_SESSION['message-sign-up']);?>
                <form action="" method="post" class=" p-2">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" name="pseudo" id="inputGroupFile02"type="file" class="form-control" id="inputGroupFile02">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="inputGroupFile02"type="file" class="form-control" id="inputGroupFile02">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <input  type="password" class="form-control" name="password" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" class="form-control" id="inputGroupFile02">
                    </div>
                    <button class="btn btn-primary" type="submit" name="sign_up">Creer Compte</button>
                </form>
                <p class="pt-2 text-primary text-decoration-underline" id="connectButton">Se Connecter</p>
              </div>
          </div>



          <div class="col-sm-8">
            <h3 class="float-end">Welcome to <strong>My Chat App</strong> </h3>
          </div>
        </div>
        <?php require 'layout/footer.php' ?>