<?php

namespace App\Controller;

/**
 * Definimos aqui que nossa classe precisa incluir uma classe de outro subnamespace
 * do projeto, no caso a classe PessoaModel do subnamespace Model
 */
use App\Model\UsuarioModel;


/**
 * Classes Controller são responsáveis por processar as requisições do usuário.
 * Isso significa que toda vez que um usuário chama uma rota, um método (função)
 * de uma classe Controller é chamado.
 * O método poderá devolver uma View (fazendo um include), acessar uma Model (para
 * buscar algo no banco de dados), redirecionar o usuário de rota, ou mesmo,
 * chamar outra Controller.
 */
class UsuarioController extends Controller
{


    /**
     * Os métodos index serão usados para devolver uma View.
     * Para saber mais sobre métodos estáticos, leia: https://www.php.net/manual/pt_BR/language.oop5.static.php
     */
    public static function index()
    {      
        $model = new UsuarioModel(); // Instância da Model
        $model->getAllRows(); // Obtendo todos os registros, abastecendo a propriedade $rows da model.

        /**
         * O método render foi idealizado para encapsular o include de views de como que
         * se o endereço de uma view por passado de forma equivocada nós possamos tratar
         * o arquivo não encontrado e mostrar uma mensagem mais amigável ao usuário.
         * Veja que o método recebe dois parâmetros: 1) caminho da view dentro da pasta modules
         * e 2) o model da view da entidade em questão, este segundo arguimento é opcional.
         */
        parent::render('Usuario/ListarUsuario', $model);
    }


    /**
     * Devolve uma View contendo um formulário para o usuário.
     */
    public static function form()
    {
        $model = new UsuarioModel();

        if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
            $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
            // Para saber mais sobre Typecast, leia: https://tiago.blog.br/type-cast-ou-conversao-de-tipos-do-php-isso-pode-te-ajudar-muito/
        
        parent::render('Usuario/FormUsuario', $model);
    }


    /**
     * Preenche um Model para que seja enviado ao banco de dados para salvar.
     */
    public static function save()
    {
       // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
       // pelo usuário no formulário (note o envio via POST)
       $model = new UsuarioModel();

       $model->id =  $_POST['id'];
       $model->usuario = $_POST['usuario'];
       $model->nome = $_POST['nome'];
       $model->email = $_POST['email'];
       
       $model->save(); // chamando o método save da model.

       header("Location: /usuario"); // redirecionando o usuário para outra rota.
    }


    /**
     * Método para tratar a rota delete. 
     */
    public static function delete()
    {
        $model = new UsuarioModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /usuario"); // redirecionando o usuário para outra rota.
    }
}