<?php
require  'db.php';

session_start();
$db = new ClasseDB();

/* Checando se há conexão */
if ($_SESSION && $_SESSION['inicio_sessao']) {

    /* Pegando há quantos minutos a sessão foi iniciada e o horário atual */
    $inicio = new DateTime($_SESSION['inicio_sessao']);
    $agora = new DateTime(date('Y-m-d H:i:s'));
    $id_usuario = $_SESSION['id_usuario'];
    $timestamp1 = $inicio->getTimestamp();
    $timestamp2 = $agora->getTimestamp();
  
    $diferencaMinutos = round(($timestamp2 - $timestamp1) / 60);
  
    /* Controle de sessão (20 minutos) */
    if ($diferencaMinutos < 21) {
       
        $body = file_get_contents("php://input");

        $data = json_decode($body);

        if (isset($data->funcao))
        {
            switch ($data->funcao)
            {
                case 'cadastrar':
                    try {
                        $raca = $data->raca;
                        $especie = $data->especie;
                        $nome = $data->nome;
                        $data = $data->data;
                
                        cadastrarPet($data, $especie, $raca);
                
                        $responseData = array(
                            'message' => 'Pet cadastrado com sucesso',
                            'status' => 'success'
                        );
                
                        http_response_code(200);
                
                        $jsonResponse = json_encode($responseData);
                
                        echo $jsonResponse;
                    } catch (Exception $e) {
                        $responseData = array(
                            'message' => 'Erro ao cadastrar o pet',
                            'status' => 'error'
                        );
                
                        http_response_code(500);
                
                        $jsonResponse = json_encode($responseData);
                
                        echo $jsonResponse;
                    }
                    break;
                case 'deletar':
                    try{
                        $id_pet = $data->id_pet;
                        $message = deletarPet($id_pet);
                        echo $message;    
                    } catch (Exception $e) {
                        http_response_code(500);
                        echo "Ocorreu um erro. Por favor, verifique os dados fornecidos."; 
                    }
                    break;

                case 'editar':
                    try{
                        $id = $data->id;
                        $raca = $data->raca;
                        $especie = $data->especie;
                        $nome = $data->nome;
                        $data = $data->data;
                    
                        echo editarPet($id, $nome, $data, $especie, $raca);
                    } catch (Exception $e) {
                        http_response_code(500);
                        echo "Ocorreu um erro. Por favor, verifique os dados fornecidos."; 
                    }
                    break;

                case 'logout':
                    session_unset();
                    session_destroy();
                    header("Location: login.php");
                    return  "aaaannnn";

                default:
                $responseData = array(
                    'message' => 'DEFAULT',
                    'status' => 'error'
                );
        
                // Defina o código de status HTTP para 500 (Erro interno do servidor)
                http_response_code(500);
        
                // Converte o array de resposta em JSON
                $jsonResponse = json_encode($responseData);
        
                // Envia a resposta JSON ao cliente
                echo $jsonResponse;
                    break;
            }
        }
    }

     else {
      session_unset();
      session_destroy();
    }
  }

  function cadastrarPet($nome, $dt_nascimento, $especie, $raca)
  {
    try{  
        global $db, $id_usuario;
        $sql = "INSERT INTO pet  (nome, dt_nascimento, especie, raca, id_usuario) VALUES ('".$nome."','".$dt_nascimento."' ,'".$especie."' ,'".$raca."' , ".$id_usuario.")";
        $resultado = $db->query($sql);
        echo $resultado;
    } catch (Exception $e) {
        throw new Exception(e);
    }
  }

  function editarPet($id, $nome, $dt_nascimento, $especie, $raca)
  {
    try{  
        global $db;
        $sql = "UPDATE pet SET nome = '".$nome."', dt_nascimento = '".$dt_nascimento."', especie = '".$especie."', raca = '".$raca."' WHERE id_pet=".$id;
        $resultado = $db->query($sql);
        echo $resultado;
    } catch (Exception $e) {
        throw new Exception(e);
    }
  }

  function retornarPets() 
  {
    try{
        global $db, $id_usuario;
        $sql = "SELECT * FROM pet WHERE id_usuario = ".$id_usuario;
        $resultado = $db->query($sql);
        return  $db->transformar_array($resultado);
    } catch (Exception $e) {
        throw new Exception(e);
    }
  }

  function deletarPet($pet_id)
  {
    try{
        global $db;
        $sql = "DELETE FROM pet WHERE id_pet = ".$pet_id;
        $resultado =$db->query($sql);
        echo $sql;
    } catch (Exception $e) {
        throw new Exception(e);
    }
  }


?>