<?php 
if(!isset($_SESSION["user_id"])){ Core::redir("./");}
$user= UserData::getById($_SESSION["user_id"]);
if($user==null){ Core::redir("./");}
?>
<?php if(isset($_GET["opt"]) && $_GET['opt']=="all"):
$contacts = PersonData::getAll();
?>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">Pacientes</h2>
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="./?view=persons&opt=new" class="btn btn-primary">
            <i class="bi bi-plus"></i> Nuevo Paciente
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-status-top bg-primary"></div>
      <div class="card-header">
        <h3 class="card-title">Pacientes</h3>
      </div>
      <div class="card-body">
    <?php if(count($contacts)>0):?>
      <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($contacts as $con):?>
            <tr>
              <td><a href="./?view=persons&opt=open&id=<?php echo $con->id; ?>" class="text-reset">#<?php echo $con->id; ?></a></td>
              <td><?php echo $con->name." ".$con->lastname; ?></td>
              <td class="text-muted"><?php echo $con->address; ?></td>
              <td class="text-muted"><?php echo $con->phone; ?></td>
              <td>
                <div class="btn-list flex-nowrap">
                  <a href="./?view=persons&opt=odontograma&id=<?php echo $con->id; ?>" class="btn btn-secondary btn-sm"><i class="bi bi-tooth"></i> Odontograma</a>
                  <a href="./?view=persons&opt=edit&id=<?php echo $con->id; ?>" class="btn btn-warning btn-sm"><i class="bi-pencil"></i></a>
                  <a href="./?action=persons&opt=del&id=<?php echo $con->id; ?>" class="btn btn-danger btn-sm"><i class="bi-trash"></i></a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        </div>
      </div>
    <?php else:?>
      <div class="card-body">
        <p class="alert alert-warning mb-0">No hay Pacientes</p>
      </div>
    <?php endif; ?>
    </div>
  </div>
</div>
<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="new"):?>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">Nuevo Paciente</h2>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-status-top bg-success"></div>
      <div class="card-header">
        <h3 class="card-title">Nuevo Paciente</h3>
      </div>
      <div class="card-body">
        <form method="post" action="./?action=persons&opt=add">
          <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" required name="name" class="form-control" placeholder="Nombre">
          </div>
          <div class="mb-3">
            <label class="form-label">Apellidos</label>
            <input type="text" required name="lastname" class="form-control" placeholder="Apellidos">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" required name="email" class="form-control" placeholder="Email">
          </div>
          <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input type="text" required name="phone" class="form-control" placeholder="Telefono">
          </div>
          <div class="mb-3">
            <label class="form-label">Direccion</label>
            <input type="text" required name="address" class="form-control" placeholder="Direccion">
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="edit"):
$contact = PersonData::getById($_GET["id"]);
?>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">Editar Paciente</h2>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-status-top bg-info"></div>
      <div class="card-header">
        <h3 class="card-title">Editar Paciente</h3>
      </div>
      <div class="card-body">
        <form method="post" action="./?action=persons&opt=update">
          <input type="hidden" name="_id" value="<?php echo $contact->id; ?>">
          <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" required name="name" value="<?php echo ($contact->name); ?>" class="form-control" placeholder="Nombre">
          </div>
          <div class="mb-3">
            <label class="form-label">Apellidos</label>
            <input type="text" required name="lastname" value="<?php echo ($contact->lastname); ?>" class="form-control" placeholder="Apellidos">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" required name="email" value="<?php echo ($contact->email); ?>" class="form-control" placeholder="Email">
          </div>
          <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input type="text" required name="phone" value="<?php echo ($contact->phone); ?>" class="form-control" placeholder="Telefono">
          </div>
          <div class="mb-3">
            <label class="form-label">Direccion</label>
            <input type="text" required name="address" value="<?php echo ($contact->address); ?>" class="form-control" placeholder="Direccion">
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-success w-100">Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="odontograma"):?>
<?php 
$contact = PersonData::getById($_GET["id"]);
$history = DentalHistoryData::getAllByPersonId($contact->id);
$treatments = TreatmentData::getAll();
?>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">Odontograma</h2>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-status-top bg-info"></div>
      <div class="card-header">
        <h3 class="card-title">Odontograma de <?php echo $contact->name." ". $contact->lastname;?></h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Odontograma</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Tratamiento</label>
                      <select name="treatment" id="treatment_id" class="form-control">
                        <option value="">Seleccionar Tratamiento</option>
                        <?php foreach($treatments as $treatment):?>
                        <option value="<?php echo $treatment->id;?>" data-color="<?php echo $treatment->color; ?>"><?php echo $treatment->name;?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                  </div>
                </div>


<!-- aqui inicial el odontograma -->
<div class="odontograma mt-4">
    <!-- Superior -->
    <div class="odontograma-fila">
        <!-- Cuadrante 1 (18 al 11) -->
        <div class="cuadrante">
            <?php for($i=18; $i>=11; $i--): ?>
            <div class="diente-wrapper">
                <div class="diente-numero"><?php echo $i; ?></div>
                <div class="diente" data-id="<?php echo $i; ?>">
                    <div class="diente-lineas"></div>
                    <div class="cara superior" data-face="superior"></div>
                    <div class="cara izquierda" data-face="izquierda"></div>
                    <div class="cara derecha" data-face="derecha"></div>
                    <div class="cara inferior" data-face="inferior"></div>
                    <div class="cara central" data-face="central"></div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        <!-- Cuadrante 2 (21 al 28) -->
        <div class="cuadrante">
            <?php for($i=21; $i<=28; $i++): ?>
            <div class="diente-wrapper">
                <div class="diente-numero"><?php echo $i; ?></div>
                <div class="diente" data-id="<?php echo $i; ?>">
                    <div class="diente-lineas"></div>
                    <div class="cara superior" data-face="superior"></div>
                    <div class="cara izquierda" data-face="izquierda"></div>
                    <div class="cara derecha" data-face="derecha"></div>
                    <div class="cara inferior" data-face="inferior"></div>
                    <div class="cara central" data-face="central"></div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Inferior -->
    <div class="odontograma-fila mt-4">
        <!-- Cuadrante 4 (48 al 41) -->
        <div class="cuadrante">
            <?php for($i=48; $i>=41; $i--): ?>
            <div class="diente-wrapper">
                <div class="diente-numero"><?php echo $i; ?></div>
                <div class="diente" data-id="<?php echo $i; ?>">
                    <div class="diente-lineas"></div>
                    <div class="cara superior" data-face="superior"></div>
                    <div class="cara izquierda" data-face="izquierda"></div>
                    <div class="cara derecha" data-face="derecha"></div>
                    <div class="cara inferior" data-face="inferior"></div>
                    <div class="cara central" data-face="central"></div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        <!-- Cuadrante 3 (31 al 38) -->
        <div class="cuadrante">
            <?php for($i=31; $i<=38; $i++): ?>
            <div class="diente-wrapper">
                <div class="diente-numero"><?php echo $i; ?></div>
                <div class="diente" data-id="<?php echo $i; ?>">
                    <div class="diente-lineas"></div>
                    <div class="cara superior" data-face="superior"></div>
                    <div class="cara izquierda" data-face="izquierda"></div>
                    <div class="cara derecha" data-face="derecha"></div>
                    <div class="cara inferior" data-face="inferior"></div>
                    <div class="cara central" data-face="central"></div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
<!-- aqui termina el odontograma -->

<div class="row mt-4">
    <div class="col-md-12">
        <h3>Historial de Tratamientos</h3>
        <?php if(count($history)>0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Diente</th>
                    <th>Cara</th>
                    <th>Tratamiento</th>
                    <th>Fecha</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($history as $h): 
                    $t = TreatmentData::getById($h->treatment_id);
                ?>
                <tr>
                    <td><?php echo $h->dient_id; ?></td>
                    <td><?php echo ucfirst($h->face_id); ?></td>
                    <td><span class="badge" style="background-color: <?php echo $t->color; ?>; color: white;"><?php echo $t->name; ?></span></td>
                    <td><?php echo $h->created_at; ?></td>
                    <td style="width: 50px;">
                        <a href="./?action=dentalhistory&opt=del&id=<?php echo $h->id; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p class="alert alert-info">No hay historial registrado.</p>
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const person_id = "<?php echo $contact->id; ?>";
    const historyData = <?php echo json_encode($history); ?>;
    const treatments = <?php 
        $t_map = [];
        foreach($treatments as $tr) { $t_map[$tr->id] = $tr->color; }
        echo json_encode($t_map); 
    ?>;

    // Colorear el odontograma inicial
    historyData.forEach(item => {
        const diente = document.querySelector(`.diente[data-id="${item.dient_id}"]`);
        if (diente) {
            const cara = diente.querySelector(`.cara[data-face="${item.face_id}"]`);
            if (cara) {
                const color = treatments[item.treatment_id];
                applyColor(cara, item.face_id, color);
            }
        }
    });

    // Manejar clicks
    document.querySelectorAll(".cara").forEach(cara => {
        cara.addEventListener("click", function() {
            const treatment_id = document.getElementById("treatment_id").value;
            if (!treatment_id) {
                alert("Por favor selecciona un tratamiento primero.");
                return;
            }

            const face_id = this.getAttribute("data-face");
            const diente_id = this.closest(".diente").getAttribute("data-id");
            const color = document.querySelector(`#treatment_id option[value="${treatment_id}"]`).getAttribute("data-color");

            // Guardar via AJAX
            const formData = new FormData();
            formData.append("person_id", person_id);
            formData.append("dient_id", diente_id);
            formData.append("face_id", face_id);
            formData.append("treatment_id", treatment_id);

            fetch("./?action=dentalhistory&opt=add", {
                method: "POST",
                body: formData
            })
            .then(res => res.text())
            .then(data => {
                if (data === "success") {
                    applyColor(this, face_id, color);
                    // Opcional: Recargar la página para ver la tabla actualizada o añadir la fila dinámicamente
                    location.reload(); 
                } else {
                    alert("Error al guardar el historial.");
                }
            });
        });
    });

    function applyColor(element, face, color) {
        if (face === "central") {
            element.style.backgroundColor = color;
        } else {
            // Mapear el nombre de la cara a la propiedad de borde correcta
            const mapping = {
                "superior": "borderTopColor",
                "inferior": "borderBottomColor",
                "izquierda": "borderLeftColor",
                "derecha": "borderRightColor"
            };
            const property = mapping[face];
            if (property) {
                element.style[property] = color;
            }
        }
    }
});
</script>
<!-- aqui termina el odontograma -->


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  
<?php endif; ?>
