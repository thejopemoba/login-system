<script type="text/javascript">
// sistema de preencher dados a partir do cep 
    function limpa_formulario_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('rua').value = ("");
        document.getElementById('bairro').value = ("");
        document.getElementById('cidade').value = ("");
        document.getElementById('uf').value = ("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            // atualizando os campos com os valores.
            document.getElementById('rua').value = (conteudo.logradouro);
            document.getElementById('bairro').value = (conteudo.bairro);
            document.getElementById('cidade').value = (conteudo.localidade);
            document.getElementById('uf').value = (conteudo.uf);

        } else {
            // caso o CEP não seja encontrado
            limpa_formulario_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                var script = document.createElement('script');
                script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
                script.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        meu_callback(this.responseText);
                    }
                };
                document.body.appendChild(script);

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } else {
                // cep é inválido.
                limpa_formulario_cep();
                alert("Formato de CEP inválido.");
            }
        } else {
            // cep sem valor, limpa formulário.
            limpa_formulario_cep();
        }
    };

    let msgCriacao = "Parabéns, você foi cadastrado com sucesso!"

</script>
</head>

<!-- formulário de cadastro -->
<body>
    <h3>Cadastro</h3><br>
    <form action="salvar-cadastro.php" method="POST"> 
        <input type="hidden" name="acao" value ="cadastrar">

        <div class="mb-3">
            <label>Nome Completo</label>
            <input type="text" name="nome" class="form-control">
        </div>

        <div class="mb-3">
            <label>Usuário</label>
            <input type="text" name="usuario" class="form-control">
        </div>

        <div class="mb-3">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control">
        </div>

        <div class="mb-3">
            <label>Data de Nascimento</label>
            <input type="date" name="data-nascimento" class="form-control">
        </div>

        <div class="mb-3">
            <label>CEP</label><br>
            <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" />
        </div>

        <div class="mb-3">
            <label>Rua</label>
            <input type="text" name ="rua" id="rua" class="form-control">
        </div>

        <div class="mb-3">
            <label>Bairro</label>
            <input type="text" name ="bairro" id="bairro" class="form-control">
        </div>

        <div class="mb-3">
            <label>Cidade</label>
            <input type="text" name ="cidade" id="cidade" class="form-control">
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <input type="text" name ="uf" id="uf" class="form-control">
        </div>

        <div class="mb-3">
        <button type="submit" class="btn btn-primary" onclick="alert(msgCriacao);">Salvar</button>
        </div>
        
    </form>
</body>