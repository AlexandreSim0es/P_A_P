<?php 
    include(__DIR__.'\..\php_login/conexao_db.php');
    
    function getGame($connection, $id) {
        $jogo = $connection->prepare("SELECT name, cover FROM game where id = ?");
        $jogo->bind_param('i', $id);
        $jogo->execute();
        $result = $jogo ->get_result();

        $data = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data["name"] = $row["name"];
            $data["cover"] = $row["cover"];
        }
        $jogo ->close();
        return $data;
    }

    function countGames($connection) {
        $s = $connection->prepare("SELECT count(*) as counter FROM game;");
        $s->execute();
        $result = $s ->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $s ->close();
            return $row['counter'];
        }
    }
        
    $nJogos = 5;

    $indexes = range(1, countGames($con));
    shuffle($indexes);

    $jogos = array();
    
    for($i = 0 ; $i < $nJogos; $i++) {
        $jogos[$i] = getGame($con, $indexes[$i]);
    }
    
    $escolha = rand(0 , $nJogos - 1);
    $jg_certo = $jogos[$escolha];

    $con->close();

?>

<script>

    var op_errada = 0; 

    function submit() {
        var choices = document.getElementsByName("opcao");
        var chosen = null;
        for (var i = 0; i < choices.length; i++) {
            if (choices[i].checked) {
                chosen = choices[i].parentElement.innerText.trim();
                break;
            }
        }

        if (!chosen) { 
            alert("Escolha uma das opções!");
            exit();
        }

        if (chosen === "<?php echo $jg_certo['name']; ?>") {

            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'php_jogo/pontos.php', true);
            xhr.send();

            alert("Você escolheu a opção certa: " + chosen);

            document.getElementById('jogo-container').style.display = 'block'; 

            window.location.reload();
            
        } else {
            op_errada++; 

            alert("Você escolheu a opção errada: " + chosen);

            if (op_errada === 2) {
                alert("Você escolheu a opção errada duas vezes. Você perdeu o jogo!");
                window.location.href = "pg_secundarias/pg_sec_jg_perdido.php";

                localStorage.clear();
            }
        }
    }

</script>











  


