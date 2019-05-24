@extends('layout')

@section('content')
    <div class="container mt-4">
        <h3>Сервисы</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDb">
                            Добавить запись
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($result as $service)
                    <tr>
                        <td scope="row"><?= $service->id ?></td>
                        <td scope="row"><?= $service->name ?></td>
                        <td scope="row">
                            <i class="fas fa-edit" style="cursor: pointer" data-id="<?= $service->id ?>"></i>
                            <i class="fas fa-times" style="cursor: pointer" data-id="<?= $service->id ?>"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="addDb" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Добавить запись</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <label>Имя</label>
                            <input type="text" class="form-control" id="serviceName">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-primary add" data-dismiss="modal">ОК</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            $(".add").click(function () {
                clientName = $("#serviceName").val();
                $.post("/services", {name: clientName});
            });

            $(".fa-edit").click(function () {
                id = $(this).data("id");
                name = $(this).parent().prev().text();
                $.put("/services/" + id, {id: id, name: name});
            });

            $(".fa-times").click(function () {
                id = $(this).data("id");
                $.delete("/services/" + id, {id: id});
            });

        });
    </script>
@endsection

