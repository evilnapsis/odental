<?php 
if(!isset($_SESSION["user_id"])){ Core::redir("./");}
$user= UserData::getById($_SESSION["user_id"]);
if($user==null){ Core::redir("./");}

$num_categories = count(TreatmentData::getAll());
$num_persons = count(PersonData::getAll());
$num_users = count(UserData::getAll());
?>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">
          Dashboard
        </h2>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="row row-deck row-cards">
      

      <div class="col-sm-6 col-lg-3">
        <div class="card card-sm">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-auto">
                <span class="bg-green text-white avatar">
                  <i class="bi bi-tags"></i>
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  <?php echo $num_categories; ?> Tratamientos
                </div>
                <div class="text-secondary">
                  Registrados
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3">
        <div class="card card-sm">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-auto">
                <span class="bg-yellow text-white avatar">
                  <i class="bi bi-people"></i>
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  <?php echo $num_persons; ?> Pacientes
                </div>
                <div class="text-secondary">
                  En el sistema
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3">
        <div class="card card-sm">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-auto">
                <span class="bg-red text-white avatar">
                   <i class="bi bi-person-badge"></i>
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  <?php echo $num_users; ?> Usuarios
                </div>
                <div class="text-secondary">
                   Administradores
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row mt-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Bienvenido, <?php echo htmlspecialchars($user->name); ?></h3>
          </div>
          <div class="card-body">
             <p class="text-secondary">Has iniciado sesión correctamente en el panel administrativo de <strong>ODONTOGRAMA</strong>. Utiliza los contadores superiores para tener una visión rápida de los recursos actuales.</p>
          </div>
        </div>
      </div>
    </div>






  </div>
</div>
