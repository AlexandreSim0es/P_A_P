
    // recupera a pontuação do localStorage, ou define como 0 caso não exista
    var pontuacao = localStorage.getItem("pontuacao") ? parseInt(localStorage.getItem("pontuacao")) : 0;

    function submit() {
      var choices = document.getElementsByName("opcao");
      var chosen = null;
      for (var i = 0; i < choices.length; i++) {
        if (choices[i].checked) {
          chosen = choices[i].parentElement.innerText.trim();
          break;
        }
      }

      if (chosen) {
        if (chosen === "<?php echo $jg_certo['name']; ?>") {
          pontuacao += 10; // incrementa a pontuação
          localStorage.setItem("pontuacao", pontuacao); // armazena a pontuação no localStorage
          alert("Você escolheu a opção certa: " + chosen + "\nSua pontuação é: " + pontuacao);
          window.location.reload();
        } else {
          alert("Você escolheu a opção errada: " + chosen);
        }
      }
    }

