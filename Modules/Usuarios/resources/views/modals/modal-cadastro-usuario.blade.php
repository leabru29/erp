<div class="modal fade" id="modal_cadastro_usuario" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastro de usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal needs-validation" id="formCadastroUsuario" method="POST"
                action="{{ route('api.usuarios.store') }}" novalidate>
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control shadow" id="nome" name="nome"
                                    placeholder="Informe o nome do usuário">
                                <div id="nome_invalido"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control shadow" id="email" name="email"
                                    placeholder="Informe o e-mail do usuário">
                                <div id="email_invalido"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control shadow" id="telefone" name="telefone"
                                    placeholder="Informe o telefone do usuário">
                                <div id="telefone_invalido"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control shadow" id="cpf" name="cpf"
                                    placeholder="Informe o cpf do usuário">
                                <div id="cpf_invalido"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="cargo">Cargo</label>
                                <input type="text" class="form-control shadow" id="cargo" name="cargo"
                                    placeholder="Informe o cargo do usuário">
                                <div id="cargo_invalido"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="cargo">Status do usuário</label>
                                <select class="form-control shadow" id="ativo" name="ativo">
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                                <div id="ativo_invalido"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="cargo">Nível de acesso do usuário</label>
                                <select class="form-control shadow" id="nivel_acesso" name="nivel_acesso">
                                    <option value="usuario">Usuário</option>
                                    <option value="gerente">Gerente</option>
                                    <option value="admin">Admin</option>
                                </select>
                                <div id="nivel_acesso_invalido"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control shadow" id="senha" name="senha"
                                    placeholder="Informe o senha do usuário">
                                <div id="senha_invalido"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="senha_confirmation">Confirma a senha</label>
                                <input type="password" class="form-control shadow" id="senha_confirmation"
                                    name="senha_confirmation" placeholder="Confirme a senha do usuário">
                                <div id="senha_confirmation_invalido"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
