<?php
class Adoptante {
    public $ID_Adoptante;
    public $P_Nombre;
    public $S_Nombre;
    public $P_Apellido;
    public $S_Apellido;
    public $Correo;
    public $Direccion;
    public $Telefono;
}

class AdoptantesViewModel {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function createAdoptante($adoptanteData) {
        try {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $this->apiUrl . '/users/adoptantes/create');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($adoptanteData));

            $response = curl_exec($curl);

            if ($response === false) {
                throw new Exception(curl_error($curl));
            }

            $adoptanteData = json_decode($response, true);
            curl_close($curl);

            if (isset($adoptanteData['success']) && $adoptanteData['success'] === true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            return false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $apiUrl = 'https://kipilubackendrepository-2.onrender.com/api';

    $adoptantesViewModel = new AdoptantesViewModel($apiUrl);

    $adoptanteData = array(
        'ID_Adoptante' => $_POST["ID_Adoptante"],
        'P_Nombre' => $_POST["P_Nombre"],
        'S_Nombre' => $_POST["S_Nombre"],
        'P_Apellido' => $_POST["P_Apellido"],
        'S_Apellido' => $_POST["S_Apellido"],
        'Correo' => $_POST["Correo"],
        'Direccion' => $_POST["Direccion"],
        'Telefono' => $_POST["Telefono"]
    );

    $resultado = $adoptantesViewModel->createAdoptante($adoptanteData);

    if ($resultado) {
        $formData = array(
            'Adoptante' => $_POST["ID_Adoptante"],
            'Animal' => $_POST["ID_Animal"]
        );

        $curlFormulario = curl_init();
        curl_setopt($curlFormulario, CURLOPT_URL, $apiUrl . '/formularios/create');
        curl_setopt($curlFormulario, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlFormulario, CURLOPT_POST, true);
        curl_setopt($curlFormulario, CURLOPT_POSTFIELDS, http_build_query($formData));

        $responseFormulario = curl_exec($curlFormulario);

        if ($responseFormulario === false) {
            echo 'ERROR al crear el formulario: ' . curl_error($curlFormulario); 
        } else {
            $formularioData = json_decode($responseFormulario, true);
            curl_close($curlFormulario);

            if (isset($formularioData['success']) && $formularioData['success'] === true) {
                $animalId = $_POST["ID_Animal"];

                $curlCambiarEstado = curl_init();
                curl_setopt($curlCambiarEstado, CURLOPT_URL, $apiUrl . '/animales/cambiarEstado/' . $animalId);
                curl_setopt($curlCambiarEstado, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curlCambiarEstado, CURLOPT_CUSTOMREQUEST, 'PUT');

                $responseCambiarEstado = curl_exec($curlCambiarEstado);

                if ($responseCambiarEstado === false) {
                    echo 'ERROR al cambiar el estado del animal: ' . curl_error($curlCambiarEstado);
                } else {
                    $cambiarEstadoData = json_decode($responseCambiarEstado, true);
                    curl_close($curlCambiarEstado);

                    if (isset($cambiarEstadoData['success']) && $cambiarEstadoData['success'] === true) {
                        echo json_encode(array("success" => true));
                    } else {
                        echo json_encode(array("success" => false, "message" => "Error al cambiar el estado del animal."));
                    }
                }
            } else {
                echo json_encode(array("success" => false, "message" => $formularioData['message']));
            }
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Error al crear el adoptante."));
    }
}
?>
