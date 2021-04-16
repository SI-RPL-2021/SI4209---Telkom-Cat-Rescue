<?php include 'layout/header.php'; ?>

<div class="flex-fill d-flex flex-column justify-content-center">
   <div class="container-tight py-6">
     <div class="text-center mb-4">
       <a href="."><img src="./static/logo.svg" height="36" alt=""></a>
     </div>
     <form class="card card-md" action="proses/login.php" method="POST" autocomplete="off">
       <div class="card-body">
         <h2 class="card-title text-center mb-4">Masuk untuk akses akun</h2>
         
         <?php 
            if(isset($_SESSION['alert'])){
               echo $_SESSION['alert'];
               unset($_SESSION['alert']);
            }
         ?>

         <div class="mb-3">
           <label class="form-label">Email</label>
           <input type="email" autocomplete="off" name="email" class="form-control" placeholder="Masukkan email" required="">
         </div>
         <div class="mb-2">
           <label class="form-label">
             Password
           </label>
           <div class="input-group input-group-flat">
             <input type="password" class="form-control" placeholder="Masukkan password"  placeholder="Password"  autocomplete="off" required="" name="password">
           </div>
         </div>
         <div class="form-footer">
           <button type="submit" class="btn btn-primary w-100">Login</button>
         </div>
       </div>
     </form>
   </div>
 </div>

<?php include 'layout/footer.php'; ?>