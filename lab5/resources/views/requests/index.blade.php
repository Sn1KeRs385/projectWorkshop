@extends('layout')

@section('content')
    <div class="container mt-4">
        <h3>Сервисы</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Сервис</th>
                    <th>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDb">
                            Добавить запись
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($result as $request)
                    <tr>
                        <td scope="row"><?= $request->id ?></td>
                        <td scope="row"><?= $request->client->name ?></td>
                        <td scope="row"><?= $request->service->name ?></td>
                        <td scope="row">
                            <i class="fas fa-edit" style="cursor: pointer" data-id="<?= $request->id ?>"></i>
                            <i class="fas fa-times" style="cursor: pointer" data-id="<?= $request->id ?>"></i>
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
                            <label>Сервис</label>
                            <input type="text" class="form-control" id="serviceId">
                            <label>Клиент</label>
                            <input type="text" class="form-control" id="clientId">
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
                serviceId = $("#serviceId").val();
                clientId = $("#clientId").val();
                $.post("/requests", {serviceId: serviceId, clientId: clientId});
            });

            $(".fa-edit").click(function () {
                id = $(this).data("id");
                serviceId = $(this).parent().prev().text();
                clientId = $(this).parent().prev().prev().text();
                $.put("/requests/" + id, {id: id, serviceId: serviceId, clientId: clientId});
            });

            $(".fa-times").click(function () {
                id = $(this).data("id");
                $.delete("/requests/" + id, {id: id});
            });

        });
    </script>
@endsection

