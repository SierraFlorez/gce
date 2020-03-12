<?php

namespace App\Http\Controllers;

use App\Contacto_emergencia;
use App\User;
// Extiende modelo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPExcel_IOFactory;
use Validator;

class UsuariosController extends Controller
{

    public function registrarse()
    {
        if (Auth::User()) {
            return view('home.inicio');
        } else {
            return view('usuarios.registrarse');
        }
    }

    // Función para cambiar contraseña
    public function cambiar_password($data)
    {

        $data2 = json_decode($data, true);
        $usuario = User::find($data2["id"]);
        if ($usuario != null) {
            $usuario->password = bcrypt($data2['contraseña']);
            $usuario->save();
            return json_encode($usuario);
        } else {
            $msg = "No se pudo cambiar la contraseña";
            return $msg;
        }
    }
    // Trae a la lista de usuarios a la datatable
    public function index()
    {
        $usuarios = User::select('id', 'nombres', 'apellidos', 'documento', 'estado')->get();
        return view('usuarios.index', compact('usuarios'));
    }
    // Guarda la información del registro
    public function guardar($data)
    {
        $dato = json_decode($data, true);

        $usuario['nombres'] = $dato["Nombres"];
        $usuario['apellidos'] = $dato["Apellidos"];
        $usuario['documento'] = $dato["Documento"];
        $usuario['estado'] = '1';
        $usuario['telefono'] = $dato["Telefono"];
        $usuario['email'] = $dato["Correo"];
        $usuario['eps'] = $dato["Eps"];
        $usuario['sangre'] = $dato["Sangre"];
        $usuario['rh'] = $dato["Rh"];
        $usuario['rol_id'] = 2;
        $usuario['tipo_documento'] = $dato["TipoDocumento"];
        $usuario['password'] = '$2y$10$vhKmPbvJOEwosRqFUIyV2eu7.gjOI7KVFJlJRxpbmqdHtPQuKdKp6';

        $validador = $this->validatorSave($usuario);

        if ($validador->fails()) {
            return (0);
        } else {
            $contacto['documento'] = $dato["contactoDocumento"];
            $contacto['nombre'] = $dato["contactoNombre"];
            $contacto['email'] = $dato["contactoEmail"];
            $contacto['telefono'] = $dato["contactoTelefono"];

            $validadorContacto = $this->validatorContacto($contacto);
            if ($validadorContacto->fails()) {
                return (0);
            } else {

                $creado = User::create($usuario);
               
                $contacto['id_user'] = User::where('documento', $usuario['documento'])->value('id');
                $contactog = Contacto_emergencia::create($contacto);
                return ($creado);
            }
        }
    }
    // Retorna la vista de registrar
    public function registrar()
    {
        return view('usuarios.registrar');
    }
    // Trae toda la información del usuario para el modal detalle
    public function detalle($id)
    {
        $usuario = User::find($id);
        return ($usuario);
    }
    // Actualiza la información del usuario
    public function update($data)
    {
        $dato = json_decode($data, true);
        $user = User::find($dato['Id']);
        $usuario['id'] = $dato["Id"];
        $usuario['nombres'] = $dato["Nombres"];
        $usuario['apellidos'] = $dato["Apellidos"];
        $usuario['documento'] = $dato["Documento"];
        $usuario['email'] = $dato["Correo"];
        $usuario['eps'] = $dato["Eps"];
        $usuario['sangre'] = $dato["Sangre"];
        $usuario['rh'] = $dato["Rh"];
        $usuario['telefono'] = $dato["Telefono"];
        $usuario['tipo_documento'] = $dato["TipoDocumento"];
        $validador = $this->validatorUpdate($usuario);
        if ($validador->fails()) {
            return (0);
        } else {
            $user->update($usuario);
            return (1);
        }
    }
    // Verifica la actualización
    public function validatorUpdate($request)
    {
        return Validator::make($request, [
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'documento' => 'required|max:15|unique:users,documento,' . $request['id'],
            'email' => 'required|email|max:255|unique:users,email,' . $request['id'],
            'telefono' => 'required|max:255',
        ]);
    }
    // Verifica la información de guardado
    public function validatorSave($request)
    {
        return Validator::make($request, [
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'tipo_documento' => 'required|max:255',
            'eps' => 'required|max:255',
            'estado' => 'required|max:255',
            'sangre' => 'required|max:255',
            'rh' => 'required|max:255',
            'documento' => 'required|max:15|unique:users,documento',
            'email' => 'required|email|max:255|unique:users,email',
            'telefono' => 'required|max:255',
        ]);
    }
    // Cambia el estado a activo
    public function activar($id)
    {
        $usuario = User::find($id);
        $usuario->estado = '1';
        $usuario->save();
        return ($usuario);
    }
    // Cambia el estado a inactivo
    public function inactivar($id)
    {
        $usuario = User::find($id);
        $usuario->estado = '0';
        $usuario->save();
        return ($usuario);
    }
    // Modal de contacto con su información
    public function detalleContacto($id)
    {
        $contacto = Contacto_emergencia::find($id);
        return ($contacto);
    }
    // Actualiza la información del usuario
    public function updateContacto($data)
    {
        $dato = json_decode($data, true);
        $contact = Contacto_emergencia::find($dato['Id']);
        $contacto['id'] = $dato["Id"];
        $contacto['nombre'] = $dato["Nombres"];
        $contacto['documento'] = $dato["Documento"];
        $contacto['email'] = $dato["Correo"];
        $contacto['telefono'] = $dato["Telefono"];

        $ok = $this->validatorContacto($contacto);
        if ($ok->fails()) {
            return (0);
        } else {
            $contact->update($contacto);
            return (1);
        }
    }
    // Validador del contacto
    public function validatorContacto($contacto)
    {
        return Validator::make($contacto, [
            'nombre' => 'required|max:255',
            'documento' => 'required|max:15',
            'email' => 'required|email|max:255',
            'telefono' => 'required|max:255',
        ]);
    }
    public function guardarContacto($data)
    {
        $dato = json_decode($data, true);
        $contacto['nombre'] = $dato["Nombres"];
        $contacto['documento'] = $dato["Documento"];
        $contacto['telefono'] = $dato["Telefono"];
        $contacto['email'] = $dato["Correo"];
        $contacto['id_user'] = $dato["Iduser"];
        $validador = $this->validatorContacto($contacto);
        if ($validador->fails()) {
            return (0);
        } else {

            Contacto_emergencia::create($contacto);
            return (1);
        }
    }
    // Carga masiva
    public function cargaMasiva(Request $request)
    {
        $file = $request->file('carga');
        $ubicacionTemporal = $file->path();
        $objPHPExcel = PHPExcel_IOFactory::load($ubicacionTemporal);
        $objPHPExcel->setActiveSheetIndex(0);
        $filas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
        for ($i = 4; $i <= $filas; $i++) {
            $usuarios[$i]['nombres'] = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
            $usuarios[$i]['apellidos'] = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
            $usuarios[$i]['telefono'] = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
            $usuarios[$i]['documento'] = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
            $usuarios[$i]['tipo_documento'] = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
            $usuarios[$i]['eps'] = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
            $usuarios[$i]['email'] = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
            $usuarios[$i]['sangre'] = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
            $usuarios[$i]['rh'] = $objPHPExcel->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();
            $usuarios[$i]['estado'] = '1';
            $usuarios[$i]['rol_id'] = 2;
            $usuarios[$i]['password'] = '$2y$10$vhKmPbvJOEwosRqFUIyV2eu7.gjOI7KVFJlJRxpbmqdHtPQuKdKp6';
        }

        for ($i2 = 4; $i2 <= $filas; $i2++) {

            $contactos[$i2]['documentoUser'] = $objPHPExcel->getActiveSheet()->getCell('L' . $i2)->getCalculatedValue();
            $contactos[$i2]['documento'] = $objPHPExcel->getActiveSheet()->getCell('M' . $i2)->getCalculatedValue();
            $contactos[$i2]['nombre'] = $objPHPExcel->getActiveSheet()->getCell('N' . $i2)->getCalculatedValue();
            $contactos[$i2]['telefono'] = $objPHPExcel->getActiveSheet()->getCell('O' . $i2)->getCalculatedValue();
            $contactos[$i2]['email'] = $objPHPExcel->getActiveSheet()->getCell('P' . $i2)->getCalculatedValue();
        }
        foreach ($usuarios as $usuario) {
            foreach ($contactos as $contacto) {
                if ($contacto['documentoUser'] == $usuario['documento']) {
                    $documentoUsuario = User::where('documento', $usuario['documento'])->value('documento');
                    if ($usuario['documento'] != $documentoUsuario) {
                        User::create($usuario);
                    }
                    $idUsuario = User::where('documento', $contacto['documentoUser'])->value('id');
                    // dd($idUsuario);
                    $contacto['id_user'] = $idUsuario;
                    // dd($contacto);
                    Contacto_emergencia::create($contacto);
                } else {
                    $documentosUsuarios = User::select('id', 'documento')->get();
                    foreach ($documentosUsuarios as $documentoUsuario) {
                        if ($contacto['documentoUser'] == $documentoUsuario['documento']) {
                            $contacto['id_user'] = $documentoUsuario['id'];
                            Contacto_emergencia::create($contacto);
                        }
                    }
                }
            }
            return view('usuarios.cargaMasiva');
        }
    }
}
// foreach ($usuarios as $usuario) {
//     $numeroContactos=0;
//     for ($i2 = 4; $i2 <= $filas; $i2++) {
//         $contactos[$i2]['documento'] = $objPHPExcel->getActiveSheet()->getCell('M' . $i2)->getCalculatedValue();
//         $contactos[$i2]['nombre'] = $objPHPExcel->getActiveSheet()->getCell('N' . $i2)->getCalculatedValue();
//         $contactos[$i2]['telefono'] = $objPHPExcel->getActiveSheet()->getCell('O' . $i2)->getCalculatedValue();
//         $contactos[$i2]['email'] = $objPHPExcel->getActiveSheet()->getCell('P' . $i2)->getCalculatedValue();
//         $numeroContactos++;
//     }
//     if ($numeroContactos >= 1) {
// if ($usuario['documento'] != User::where('documento', $usuario['documento'])->value('documento')) {
//     User::create($usuario);
// }
//         foreach ($contactos as $contacto) {

//             $contacto['id_user'] = User::where('documento', $usuario['documento'])->value('id');

//             Contacto_emergencia::create($contacto);
//         }
//     }
// }
