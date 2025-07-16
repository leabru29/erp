@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')
    <div class="mb-3">
        <button id="btnNovoUsuario" class="btn btn-primary shadow">
            <i class="fas fa-user-plus"></i> Novo Usuário
        </button>
    </div>
    <div class="card shadow p-4">
        <div class="card-header">
            <h3 class="card-title text-center">Lista de Usuários</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap table-bordered" id="tabelaUsuarios">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Perfil</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    @include('usuarios::modals.modal-cadastro-usuario')
    @include('usuarios::modals.modal-editar-usuario')
@stop

@section('js')
    <script>
        $(document).ready(function() {
            let url = "{{ route('api.usuarios.index') }}";
            var table = $('#tabelaUsuarios').DataTable({
                processing: false,
                serverSide: true,
                language: {
                    url: "{{ asset('vendor/datatables/portuguese.json') }}"
                },
                responsive: true,
                autoWidth: false,
                order: [
                    [0, 'asc']
                ],
                lengthMenu: [5, 10, 20, 100],
                pageLength: 5,
                ajax: {
                    url: url,
                    type: 'GET'
                },
                columns: [{
                        data: 'nome',
                        name: 'nome'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'nivel_acesso',
                        name: 'nivel_acesso'
                    },
                    {
                        data: 'ativo',
                        name: 'ativo',
                        render: function(data, type, row) {
                            return data ? '<span class="badge badge-success shadow">Ativo</span>' :
                                '<span class="badge badge-danger shadow">Inativo</span>';
                        }
                    },
                    {
                        data: 'acoes',
                        name: 'acoes',
                        render: function(data, type, row) {
                            return `<button type="button" id="btn_editar" data-id="${row.id}" class="btn btn-primary btn-sm shadow mx-1"><i class="fas fa-edit"></i></button><button type="button" id="btn_excluir" data-id="${row.id}" class="btn btn-danger btn-sm shadow"><i class="fas fa-trash"></i></button>`;
                        }
                    },
                ]
            });
        });

        $(document).on('show.bs.modal', '#modal_cadastro_usuario', function() {
            $('#formCadastroUsuario')[0].reset();
            $('#formCadastroUsuario').find('.is-invalid').removeClass('is-invalid');
            $('#formCadastroUsuario').find('.is-valid').removeClass('is-valid');
            $('#formCadastroUsuario').find('.invalid-feedback').text('');
            $('#formCadastroUsuario').find('.valid-feedback').text('');
            $('#formCadastroUsuario').find('button[type="submit"]').prop('disabled', false);
            $('#formCadastroUsuario').find('button[type="submit"]').html('Salvar');
        });

        $(document).on('click', '#btnNovoUsuario', function() {
            $('#modal_cadastro_usuario').modal('show');
            var SPMaskBehavior = function(val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('#telefone').mask(SPMaskBehavior, spOptions);
            $('#cpf').mask('000.000.000-00', {
                reverse: false
            });
        });

        $(document).on('submit', '#formCadastroUsuario', function(e) {
            e.preventDefault();
            registrarDados($(this), $('#modal_cadastro_usuario'), $('#tabelaUsuarios'));
        });

        $(document).on('click', '#btn_editar', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let url = "{{ route('api.usuarios.update', ':id') }}";
            url = url.replace(':id', id);
            const form = $('#form_editar_usuario');
            const modal = $('#modal_editar_usuario');
            form.attr('action', url);
            $(modal).on('show.bs.modal', function() {
                form[0].reset();
                form.find('.is-invalid').removeClass('is-invalid');
                form.find('.is-valid').removeClass('is-valid');
                form.find('.invalid-feedback').text('');
                form.find('.valid-feedback').text('');
                form.find('button[type="submit"]').prop('disabled', false);
                form.find('button[type="submit"]').html('Salvar');
                $.get(url, function(data) {
                    $.each(data, function(key, value) {
                        $(form).find('[name="' + key + '"]').val(value);
                    });
                });
            });
            $(modal).modal('show');
        });

        $(document).on('submit', '#form_editar_usuario', function(e) {
            e.preventDefault();
            registrarDados($(this), $('#modal_editar_usuario'), $('#tabelaUsuarios'));
        });

        $(document).on('click', '#btn_excluir', function(e) {
            e.preventDefault();

            let id = $(this).data('id');
            let url = "{{ route('api.usuarios.destroy', ':id') }}";
            url = url.replace(':id', id);

            Swal.fire({
                title: "Deseja realmente excluir este registro?",
                text: "Esta ação não poderá ser revertida!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim, quero excluir!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Excluído!",
                                text: "O usuário foi excluído com sucesso.",
                                icon: "success"
                            });

                            // Atualiza a tabela
                            $('#tabelaUsuarios').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Erro!",
                                text: "Não foi possível excluir o usuário.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });
    </script>
@stop
