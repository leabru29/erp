<div class="modal fade" id="modal_editar_usuario" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar dados do usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal needs-validation" id="form_editar_usuario" method="POST" novalidate>
                @csrf
                @method('PUT')
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
